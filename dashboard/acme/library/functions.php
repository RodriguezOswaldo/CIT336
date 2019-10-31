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
?>