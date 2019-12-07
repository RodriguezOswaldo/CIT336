<?php
/*
Reviews Controller 
*/
 // Create or access a Session 
 session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';

require_once '../model/products-model.php';

require_once '../model/uploads-model.php';

require_once '../model/reviews-model.php';

//Get the custom functions 
require_once '../library/functions.php';

 // Get the array of categories
 $categories = getCategories();
 // Get the array of categories ID
 $categoriesID = getCategoriesID();
 // Create an array to save the names for indexes in order to create the select option
 $navList = commonNavigation($categories);
 //Build the CatList
 $catList = buildID($categoriesID, $navList, $categories);


//Action Collections
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}
switch ($action) {
    case 'add-new-review':
        // Filter and store the data
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $clientId = $_SESSION['clientData']['clientId'];
        break;
    case 'submit-review':   
        # code... 
        break;
    case 'review-update':
        # code... 
        break;
    case 'display-review-updated':
        # code...
        break;
    case 'delete-review':
        # code... 
        break;
    default:
        if (isset($_SESSION['loggedin'])) {
            include "../view/admin.php";
            exit;
        } else {
            include "../view/home.php";
            exit;
        }
        break;
}


?>