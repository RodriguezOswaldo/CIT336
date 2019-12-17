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
        // echo 'you made it';
        // exit;
        // Filter and store the data
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $clientId = $_SESSION['clientData']['clientId'];
        // $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $categoryName = filter_input(INPUT_GET, 'categoryName', FILTER_SANITIZE_STRING);
        // $cont = $invId;
        $products = getProductInfo($invId);
        $prodDisplay = buildProductsView($products);
        $prodInfo = getImages();
        $imprimeImage = buildImageDisplay($prodInfo);
        $newReview = getReviewsByInvId($invId);
        $reviewArray = GetReview($newReview);
        // echo getReviewById($reviewId);
        
        if(empty($reviewText)){
            echo '<p class="message5">The review cannot be empty.</p>';
            include '../view/product-view.php';
            exit;
        }
        //Sending data to the model
        $addReviewResult = addReview($invId, $clientId, $reviewText);
        //Sending a Message to the user letting him now whether the review was added or not.
        if($addReviewResult === 1){
            $imprimir= "<p class='message5'>Your review was added successfully.</p>";
            $newReview = getReviewsByInvId($invId);
            $reviewArray = GetReview($newReview);
           include '../view/product-view.php';
       } else {
            $imprimir = "<p class='message5'> Error: Your review was not sent.</p>";
            include '../view/product-view.php';
            exit;
       } 
        // exit;
        // echo gettype($getReviewsByItem);
        // exit;
        // $getReviewArray = functionGetReview($getReviewsByItem);
        // echo 'hello';
        // exit;

        // if (empty($products)) {
        //             echo "<p class='message5'>Sorry, no product was found.</p>";
        //             include '../view/home.php';
        //             exit;
        //         }
                
        break;
    case 'edit-review-view':  
         //if user hasn't logged in display log in view
        if (isset($_SESSION['loggedin'])) {
            
        } else {
            $_SESSION['loggedin'] = FALSE;
            include "../view/login.php";
        }
        if (!$_SESSION['loggedin'] == TRUE) {
        } 
        break;
    case 'submit-review-updated':
        # code... 
        break;
    case 'display-review-updated':
        # code...
        break;
    case 'delete-review':
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