<?php
/*
Accounts Controller 
*/
 // Create or access a Session 
 session_start();
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

$navList = commonNavigation($categories);
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

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
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
        //Double checking the email and password before storing it to the database
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        ///Checking for an existing email address.
        $existingEmail = checkExistingEmail($clientEmail);

        // Check for existing email address in the table
        if($existingEmail){
         $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
         include '../view/login.php';
         exit;
        }

        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
            $message = '<p style="color:yellow; background:black;">Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
        exit; 
    }

    //Checking for 
    //Protecting the password using a password_hash method 
    $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
    // Send the data to the model
    $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);

    // Check and report the result
    if($regOutcome === 1){
        //ceate Cookie!
        setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');    
    $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
    include '../view/login.php';
    exit;
        } else {
    $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
    include '../view/registration.php';
    exit;
        }
    break;
    
    case 'Login':
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        //Double checking the email and password before storing it to the database
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        if(empty($clientEmail) || empty($checkPassword)){
            $message = '<p style="color:red">Please provide information for all empty form fields.</p>';
            include '../view/login.php';
        }
    break;

}
?>