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
        $pattern = '(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$'; 
        return preg_match($pattern, $clientPassword);
     }

?>