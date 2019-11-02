<?php
    /*
     * Custom Functions Library
     */ 

     //Validate Email Address
     function checkEmail($clientEmail){
        $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
        return $valEmail;
        }
        
    // Check the Password for a minimum of 8 character,
    // at least one 1 capital letter, at least 1 number
    // at least 1 special character
    
     function checkPassword($clientPassword){
        $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
        return preg_match($pattern, $clientPassword);
       }


       //Common Navigation bar
    function commonNavigation() {
       
        $categories = getCategories();
        /**************************
         ****Array of categories***
         **************************/
        // var_dump($categories);
        // 	exit;
        $navList = '<ul>';
        $navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
        foreach ($categories as $category) {
         $navList .= "<li><a href='/acme/index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
        }
        $navList .= '</ul>';
        return $navList;
    }

    function buildID($categoriesID,$navList,$categories){
        $indexCatIDtryarray = 0;
        $catNames = array();
        foreach ($categories as $category) {
         $navList .= "<li><a href='../index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
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

    
?>