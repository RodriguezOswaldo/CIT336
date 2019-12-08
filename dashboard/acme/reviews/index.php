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
        $addReviewResult = addReview($invId, $clientId, $reviewText);
                
        if ($addReviewResult < 1){
            $message  = "<p>Please add a review. Please try again.</p>";
            header("location: /acme/products?action=view-product&id=$invId");
            exit;
        }else{
            $message = "<p>your review was added successfully.</p>";
            header("location: /acme/products?action=view-product&id=$invId");
            exit;
        }
        break;
    case 'edit-review-view':   
        # code... 
        break;
    case 'submit-review-updated':
        # code... 
        break;
    case 'display-review-updated':
        # code...
        break;
    case 'delete-review':
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
        $review = getReviewById($reviewId);
        if (empty($review)) {
                $message = "Sorry, review could not be found";
                header('location: /acme/accounts');
                exit;
        }
        
        $deleteReviewResult = deleteReview($reviewId);
                
        if ($deleteReviewResult < 1) {
                $message = "<p>Sorry, but your review wasn't deleted. Please try again.</p>";
                include ($_SERVER['DOCUMENT_ROOT'].'/view/review-delete.php');
                exit;
        } else{
                $message = "<p>your review was deleted successfully.</p>";
                header('location: /accounts');
                exit;
        } 
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