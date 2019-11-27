<?php
/*
Products Controller 
*/
 // Create or access a Session 
session_start();  

// Get the database connection file
 require_once '../library/connections.php';
 // Get the acme model for use as needed
 require_once '../model/acme-model.php';
 
 require_once '../model/products-model.php';
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


 $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
    }
    if ($action == NULL){
      $action = 'products';
    }
    if($action == 'newCategory.php'){
          $action = 'newCategory';
    }
    if($action == 'newProduct.php'){
          $action = 'newProduct';
    }

  // Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

switch ($action){
    case 'products':
       include '../view/products.php';
    break;
    case 'newCategory': 
       include '../view/newCategory.php';
    break;  
    case 'newProduct':
       include '../view/newProduct.php';
    break;  
    case 'cat':
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
        // Check for missing data
        if(empty($categoryName)){
            echo '<div class ="big"><p>Please provide information for all empty form fields</p></div>';
            include '../view/newCategory.php';
            exit;
        } 
       // Send the data to the model
        $regOutcome = addNewCategory($categoryName);
        // Check and report the result 
        if($regOutcome === 1){
            echo '<div class="big"><p> Thanks for registering the new category.</p></div>';
            include '../view/newCategory.php';
            exit;
        } else 
        {
            $message = '<p>Registration failed. Please try again. </p>';
            include '../view/newCategory.php';
            exit;
        }   
    break;
    case 'prod':
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        //$invPrice = checkPrice($invPrice);
        $invStock =filter_input(INPUT_POST, 'invStock');
        $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        //$invSize = checkFloat($invSize);
        $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        //$invWeight = checkFloat($invWeight);
        $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
        $categoryId = filter_input(INPUT_POST, 'categoryId');
        $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
        $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
        // Check for missing data
        //$categoryId = NULL;
        if( empty($invName)|| 
            empty($invDescription)|| 
            empty($invImage) || 
            empty($invThumbnail)|| 
            empty($invPrice)|| 
            empty($invStock)|| 
            empty($invSize)|| 
            empty($invWeight)|| 
            empty($invLocation)||
            empty($categoryId)|| 
            empty($invVendor)||
            empty($invStyle)){
                echo '<div><p>Please provide information for all empty form fields</p></div>';
                include '../view/newProduct.php';
                exit;
            } 
            // Send the data to the model
            $regOutcome1 = addProd($categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle);
            // Check and report the result 
        if($regOutcome1 === 1){
            echo '<div class="big"><p> New Product has been added to your inventory</p></div>';
            include '../view/newProduct.php';
            exit;
        } 
        else {
            $message = '<p>Sorry, but the information failed. Please try again. </p>';
            include '../view/newCategory.php';
            exit;
        }  
    break;
        /* * ********************************** 
    * Get Inventory Items by categoryId 
    * Used for starting Update & delete process 
    * ********************************** */ 
    case 'getInventoryItems': 
        // Get the categoryId 
        $categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_SANITIZE_NUMBER_INT); 
        // Fetch the products by categoryId from the DB 
        $productsArray = getProductsByCategory($categoryId); 
        // Convert the array to a JSON object and send it back 
        echo json_encode($productsArray); 
    break;

    case 'mod':
      
        $categoryId = filter_input(INPUT_POST, 'categoryId');
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($invId);
            if(count($prodInfo)<1){
                $message = 'Sorry, no product information could be found.';
            }
           
        include '../view/pro-update.php';
        exit;
    break;
    case 'updateProd':
           
        $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_NUMBER_INT);
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_INT);
        $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_INT);
        $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
        $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
        $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        if (empty($indId) || empty($invName) || empty($invDescription) 
        || empty($invImage) || empty($invThumbnail) || empty($invPrice) 
        || empty($invStock) || empty($invSize) || empty($invWeight) 
        || empty($invLocation) || empty($invVendor) || empty($invStyle)) {
          
        $message = '<p>Please complete all information for the item! Double check the category of the item.</p>';
        include '../view/pro-update.php';
        exit;
        }
        $insertResult = updateProduct($invName, $invDescription, 
        $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, 
        $invLocation, $invVendor, $invStyle, $invId);
        //Check and show view
        if ($insertResult) {
            $message = "<p>Congratulations, $invName was successfully added.</p>";
            header('location: /acme/products/');
             exit;
        } else {
            $message = "<p>Error. The new product was not updated.</p>";
            include '../view/pro-update.php';
            exit;
        }
    break;
    case 'del':
        $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $prodInfo = getProductInfo($invId);
        if (count($prodInfo) < 1) {
        $message = 'Sorry, no product information could be found.';
        }
        include '../view/pro-delete.php';
        exit;
    break; 
    case 'deleteProd':
    echo 'find the error';
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        
        $deleteResult = deleteProduct($invId);
        if ($deleteResult) {
            $message = "<p class='notice'>Congratulations, $invName was successfully deleted.</p>";
            $_SESSION['message'] = $message;
            echo 'find the error';
            include '../view/products.php';
        exit;
        } else {
            $message = "<p class='notice'>Error: $invName was not deleted.</p>";
            $_SESSION['message'] = $message;
            echo 'find the error';
            include '../view/products.php';
        exit;
        }
    break;
    case 'category':
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
        
        $categoryName = filter_input(INPUT_GET, 'categoryName', FILTER_SANITIZE_STRING);
        $products = getProductsByCategoryname($categoryName);
        if(!count($products)){
            $message = "<p class='notice'>Sorry, no $categoryName products could be found.</p>";
        }else{
            $prodDisplay =buildProductsDisplay($products);
        }
        // echo $prodDisplay;
        //$prodInfo = getProductInfo($invId);       
        include '../view/category.php';
    break;
    default:        
        $catList = buildID($categoriesID, $navList, $categories);
        include '../view/products.php';
    break;  
    }   


?>    