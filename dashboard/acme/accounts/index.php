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

   switch ($action){
    case 'registration':
        include '../view/registration.php';
        break;
    case 'login':
        include '../view/login.php';
        break;
    case 'update':
        include '../view/client-update.php';
        break; 
    case 'register':
        //echo 'You are in the register case statement.';
        // Filter and store the data
        $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
        $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);
        $existingEmail = checkExistingEmail($clientEmail);

            // Check for existing email address in the table
        if($existingEmail){
            $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }
        // Check for missing data
        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)){
            $message = '<p class="message">Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit; 
        }
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT); 
        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        if($regOutcome === 1){
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $message = '<p class="message">Thanks for registering '.$clientFirstname.'. Please use your email and password to login.</p>';
            include '../view/login.php';
            exit;
        } else {
                    $message = '<p class="message">Sorry $clientFirstname, but the registration failed. Please try again.</p>';
                    include '../view/registration.php';
                    exit;
        }
        break;
        
        case 'Login':
        $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        $passwordCheck = checkPassword($clientPassword);
        // Check for missing data
        if(empty($clientEmail) || empty($passwordCheck)){
            $message = '<p class="message">Please provide information for all empty form fields.</p>';
            include '../view/login.php';
            exit; 
        }
        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit; 
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        /*echo $_SESSION['loggedin'];
        exit;*/
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        include '../view/admin.php';
        exit;
        break;
    case 'Logout':
        unset($_SESSION['loggedin']);
        unset($_SESSION['clientData']);
        include '../view/home.php';
        exit;

    default:
        //$_SESSION['loggedin'] = FALSE;
       include '../view/admin.php';
    }
?>