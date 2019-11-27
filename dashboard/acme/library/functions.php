<?php
    /*
     * Custom Functions Library
     */ 
    //function will build a display of products within an unordered list.
    function buildProductsDisplay($products){
        $pd = '<ul id="prod-display">';
        foreach ($products as $product) {
         $pd .= '<li>';
         $pd .= "<img src='$product[invThumbnail]' alt='Image of $product[invName] on Acme.com'>";
         $pd .= '<hr>';
         $pd .= "<h2>$product[invName]</h2>";
         $pd .= "<span>$product[invPrice]</span>";
         $pd .= '</li>';
        }
        $pd .= '</ul>';
        return $pd;
       }

    function checkEmail($clientEmail){
        $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
        return $valEmail;
       }
       // Check the password for a minimum of 8 characters,
        // at least one 1 capital letter, at least 1 number and
        // at least 1 special character
       function checkPassword($clientPassword){
        $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
        return preg_match($pattern, $clientPassword);
       }


       //Common Navigation bar
    function commonNavigation($categories) {
       
        $categories = getCategories();
        /**************************
         ****Array of categories***
         **************************/
        // var_dump($categories);
        // 	exit;
        $navList = '<ul>';
        $navList .= "<li><a href='../acme/index.php' title='View the Acme home page'>Home</a></li>";
        foreach ($categories as $category) {
         $navList .=  "<li><a href='../acme/products/?action=category&categoryName=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
        }
        $navList .= '</ul>';
        return $navList;
    }

    function buildID($categoriesID,$navList,$categories){
        $indexCatIDtryarray = 0;
        $catNames = array();
        foreach ($categories as $category) {
         $navList .= "<li><a href='../    index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
            //save the names in the array
           $catNames[$indexCatIDtryarray] = urlencode($category['categoryName']);
            //increment the index
            $indexCatIDtryarray = $indexCatIDtryarray + 1;
        }
        $navList .= '</ul>';
         //echo $navList;
         //exit;
         // reset the index
         $indexCatIDtryarray = 0;
         $catList = '<select name="categoryId" id="categoryId" class="message3">';
         $catList .= '<option value="Choose a category">Choose a category</option>';
         foreach ($categoriesID as $categoryID) {
             $catList .= '<option value="'.urlencode($categoryID['categoryId']).'" class="big">'.$catNames[$indexCatIDtryarray].'</option>';
             //use the array to write the name according the index, in the sql they use the same class of organization
             $indexCatIDtryarray = $indexCatIDtryarray + 1;
         }
         $catList .= '</select>';
         //echo $catList;
         //exit;
          return $catList;
     }

    // Build the categories select list 
    function buildCategoryList($categories){ 
        //$categoriesID = getCategoriesID();
     $catNames = getarrayscat();
      
    // Create an array to save the names for indexes in order to create the select option
    $indexCatIDtryarray = 0;
    $catList = '<select name="categoryId" id="categoryList">';
     $catList .= '<option value="empty">Choose a Category</option>';
     foreach ($categories as $categoryID) {
         $catList.= '<option value="'.urlencode($categoryID['categoryId']).'"';
         if (isset($categoryId)) {
             if(urlencode($categoryID['categoryId']) === $categoryId) {
                 $catList .= ' selected ';
             }
         }
         $catList.= '>'.$catNames[$indexCatIDtryarray].'</option>';
         //use the array to write the name according the index, in the sql they use the same class of organization
         $indexCatIDtryarray = $indexCatIDtryarray + 1;
     }
     $catList .= '</select>';
        return $catList; 
    }


    
?>