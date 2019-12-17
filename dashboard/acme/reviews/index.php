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
        break;
    case 'edit-review-view':  
        $reviewId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);    
        if(empty($reviewId)){
            $imprimir= "<p class='message5'>There are not existing reviews yet, be the first to review this product!..</p>";
            header('location: /acme/accounts?action=admin');
            exit;
        }
        $gettingReview = getReviewById($reviewId);
        // echo gettype($gettingReview);
        // exit;
        if(empty($gettingReview)){
            $imprimir= "<p class='message5'>There are not existing reviews yet!..</p>";
            header('location: /acme/accounts?action=admin');
            exit;
        }
        include '../view/update-review.php';
        break;
    case 'submit-review-updated':
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);    
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $gettingReview = getReviewById($reviewId);
        $clientId = $_SESSION['clientData']['clientId'];
        $reviewByClient = getReviewsByClientId($clientId);
        $reviewArray = displayClient($reviewByClient);
        
        if (empty($gettingReview)) {
            $_SESSION['message'] = "Sorry, review could not be found";
            header('location: /view/home.php');
            exit;
        }
       // Check for missing data
       if(empty($reviewText)){
        $message = '<p>The review cannot be empty.</p>';
       
        include ($_SERVER['DOCUMENT_ROOT'].'/view/update-review.php');
        exit;
         }
         // Send the update to the model with the updateReview function
         $updateReviewResult = updateReview($reviewId, $reviewText);

         if ($updateReviewResult < 1) { 
            $message = "<p class ='message5'>No changes were made.</p>";
            include ($_SERVER['DOCUMENT_ROOT'].'/dashboard/acme/view/update-review.php');
            exit;
            }else{
                        
                    // $message= "<p class='message5'>Your review was updated successfully.</p>";
                        $_SESSION['message'] = "<p class='message5'>Your review was updated successfully.</p>";
                    // include ($_SERVER['DOCUMENT_ROOT'].'/accounts/index.php?action="admin"');
                        header("location:/dashboard/acme/accounts?action=admin");
                        exit;
                    }      
        break;
    case 'delete-review':   
        echo 'You made it!';
        $reviewId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);    
        if(empty($reviewId)){
            $imprimir= "<p class='message5'>There are not existing reviews yet, be the first to review this product!..</p>";
            header('location: /acme/accounts?action=admin');
            exit;
        }
        $gettingReview = getReviewById($reviewId);
        // echo gettype($gettingReview);
        // exit;
        if(empty($gettingReview)){
            $imprimir= "<p class='message5'>There are not existing reviews yet!..</p>";
            header('location: /acme/accounts?action=admin');
            exit;
        }
        include '../view/delete-review.php';
        break;
    case 'delete-review-submit':
        echo 'you made it again';
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);    
        $gettingReview = getReviewById($reviewId);
        
        if (empty($gettingReview)) {
            $_SESSION['message'] = "Sorry, review could not be found";
            header('location: /acme/accounts?action=admin');
            exit;
        }

        $delete = deleteReview($reviewId);
        if (($delete < 1)) {
            $_SESSION['message'] = "Sorry, review could not be found";
            header('location: /acme/accounts?action=admin');
            exit;
        }else{
            $_SESSION['message'] = "Review has been removed from the database.";

        }
        header("location:/dashboard/acme/accounts?action=admin");
        exit;
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