<?php
/*
Accounts Controller 
*/
// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
//Get the accounts model
require_once '../model/accounts-model.php';
//Get the custom functions 
require_once '../library/functions.php';

// Get the array of categories
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
/****************************************************************
 *Displaying the navigation list stored in the navList variable *
 ****************************************************************/
// echo $navList;
// exit;

//Displaying home.php once the index.php is reached.
$action = filter_input(INPUT_POST, 'action');
if($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}
switch($action){
        case 'login':
            include '../view/login.php';
            break;
        case 'register':
                // echo 'You are in the register case statement.';
                // exit;
    
            // Filter, sanitize and store the data
            $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
            $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
            $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
            $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
            $clientEmail = checkEmail($clientEmail);
            $clientPassword = checkPassword($clientPassword);
            // Check for missing data
            if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit; 
        }

        // Send the data to the model
            $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

            // Check and report the result
            if($regOutcome === 1){
            $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            include '../view/login.php';
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }
        break;

}
?>