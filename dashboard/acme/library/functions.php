<?php
    /*
     * Custom Functions Library
     */ 
    //function will build a display of products within an unordered list.
    function buildProductsDisplay($products){
        $pd = '<div id="prod-display">';
        foreach ($products as $product) {
         $pd .= '<div>';
         $pd .= "<img class='img-fluid' src='$product[invImage]' alt='Image of $product[invName] on Acme.com'>";
         $pd .= '<hr>';
         $pd .= "<a href ='../products?action=view-product&id=$product[invId]'><h2>$product[invName]</h2></a>";
         $pd .= "<span class='price' >$product[invPrice]</span>";
         $pd .= '</div>';
        }
        $pd .= '</div>';
        return $pd;
       }

    function checkEmail($clientEmail){
        $valEmail = filter_var($clientEmail, FILTER_VALIDATE_EMAIL);
        return $valEmail;
       }
       // Check the password for a minimum of 8 characters,
        // at least one 1 capital letter, at least 1 number and
        // at least 1 special character
       function checkPassword($clientPassword){
        $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])(?=.*[A-Z])(?=.*[a-z])([^\s]){8,}$/';
        return preg_match($pattern, $clientPassword);
       }


       //Common Navigation bar
    function commonNavigation($categories) {
       
        $categories = getCategories();
        /**************************
         ****Array of categories***
         **************************/
        // var_dump($categories);
        // 	exit;
        $navList = '<ul>';
        $navList .= "<li><a href='/dashboard/acme/index.php' title='View the Acme home page'>Home</a></li>";
        foreach ($categories as $category) {
            $navList .=  "<li><a href='/dashboard/acme/products/?action=category&categoryName=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
        }
        $navList .= '</ul>';

        return $navList;
    }

    function buildID($categoriesID,$navList,$categories){
        $indexCatIDtryarray = 0;
        $catNames = array();
        foreach ($categories as $category) {
         $navList .= "<li><a href='/dashboard/acme/products/?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
            //save the names in the array
           $catNames[$indexCatIDtryarray] = urlencode($category['categoryName']);
            //increment the index
            $indexCatIDtryarray = $indexCatIDtryarray + 1;
        }
        $navList .= '</ul>';
         //echo $navList;
         //exit;
         // reset the index
         $indexCatIDtryarray = 0;
         $catList = '<select name="categoryId" id="categoryId" class="message3">';
         $catList .= '<option value="Choose a category">Choose a category</option>';
         foreach ($categoriesID as $categoryID) {
             $catList .= '<option value="'.urlencode($categoryID['categoryId']).'" class="big">'.$catNames[$indexCatIDtryarray].'</option>';
             //use the array to write the name according the index, in the sql they use the same class of organization
             $indexCatIDtryarray = $indexCatIDtryarray + 1;
         }
         $catList .= '</select>';
         //echo $catList;
         //exit;
          return $catList;
     }

    // Build the categories select list 
    function buildCategoryList($categories){ 
        //$categoriesID = getCategoriesID();
     $catNames = getarrayscat();
      
    // Create an array to save the names for indexes in order to create the select option
    $indexCatIDtryarray = 0;
    $catList = '<select name="categoryId" id="categoryList">';
     $catList .= '<option value="empty">Choose a Category</option>';
     foreach ($categories as $categoryID) {
         $catList.= '<option value="'.urlencode($categoryID['categoryId']).'"';
         if (isset($categoryId)) {
             if(urlencode($categoryID['categoryId']) === $categoryId) {
                 $catList .= ' selected ';
             }
         }
         $catList.= '>'.$catNames[$indexCatIDtryarray].'</option>';
         //use the array to write the name according the index, in the sql they use the same class of organization
         $indexCatIDtryarray = $indexCatIDtryarray + 1;
     }
     $catList .= '</select>';
        return $catList; 
    }

//display items views by categories
    function buildProductsView($products){
        $pd = '<div class="prod-details">';
       
    
        $pd .= "<div><h1>$products[invName]</h1>";
        $pd .= "<img class='img-fluid' src='$products[invImage]' alt='Image of $products[invName] on Acme.com'></div>";
        $pd .= "<div id='vendor'><h3>By $products[invVendor]</h3>";
        $pd .= "<h2>$products[invStock] left in stock.</h2>";
        $pd .= "<p>$products[invDescription]</p>";
        $pd .= "<ul>";
        $pd .= "<li>Size: $products[invSize] in&sup3;</li>";
        $pd .= "<li>Weight: $products[invWeight] lbs</li>";
        $pd .= "<li>Material: $products[invStyle]</li>";
        $pd .= "</ul>";
        $pd .= "<h2 class='price'>$$products[invPrice]</h2>";
        $pd .= "<h3>Ships from $products[invLocation]</h3></div>";
        $pd .= "</div>";
        
        return $pd;
    }
        
    /* * ********************************
    *  Functions for working with images
    * ********************************* */

    // Adds "-tn" designation to file name
function makeThumbnailName($image) {
    $i = strrpos($image, '.');
    $image_name = substr($image, 0, $i);
    $ext = substr($image, $i);
    $image = $image_name . '-tn' . $ext;
    return $image;
   }

function buildProductsImages($imageArray){
    $pd = '<figure class="images">';
    foreach ($imageArray as $prod) {
        $fileN = pathinfo($prod["imgName"], PATHINFO_FILENAME);
        $extension = substr($fileN, -2);
        if($prod['invId']== $GLOBALS['cont'] && $extension != 'tn'){
            $pd .="<img src='$prod[imgPath]' alt='$prod[imgName] image on Acme.com'>";
        }
    }
    $pd .= '</figure>';
    return $pd;
}
// Build images display for image management view
function buildImageDisplay($imageArray) {
    $id = '<ul id="image-display">';
    foreach ($imageArray as $image) {
     $id .= '<li>';
     $id .= "<img src='$image[imgPath]' title='$image[invName] image on Acme.com' alt='$image[invName] image on Acme.com'>";
     $id .= "<p><a href='../acme/uploads?action=delete&imgId=$image[imgId]&filename=$image[imgName]' title='Delete the image'>Delete $image[imgName]</a></p>";
     $id .= '</li>';
    }
    $id .= '</ul>';
    return $id;
   }

  // Build the products select list
function buildProductsSelect($products) {
    $prodList = '<select name="invId" id="invId">';
    $prodList .= "<option>Choose a Product</option>";
    foreach ($products as $product) {
     $prodList .= "<option value='$product[invId]'>$product[invName]</option>";
    }
    $prodList .= '</select>';
    return $prodList;
   }  

// Handles the file upload process and returns the path
// The file path is stored into the database
function uploadFile($name) {
    // Gets the paths, full and local directory
    global $image_dir, $image_dir_path;
    if (isset($_FILES[$name])) {
     // Gets the actual file name
     $filename = $_FILES[$name]['name'];
     if (empty($filename)) {
      return;
     }
    // Get the file from the temp folder on the server
    $source = $_FILES[$name]['tmp_name'];
    // Sets the new path - images folder in this directory
    $target = $image_dir_path . '/' . $filename;
    // Moves the file to the target folder
    move_uploaded_file($source, $target);
    // Send file for further processing
    processImage($image_dir_path, $filename);
    // Sets the path for the image for Database storage
    $filepath = $image_dir . '/' . $filename;
    // Returns the path where the file is stored
    return $filepath;
    }
   }

   // Processes images by getting paths and 
// creating smaller versions of the image
function processImage($dir, $filename) {
    // Set up the variables
    $dir = $dir . '/';
   
    // Set up the image path
    $image_path = $dir . $filename;
   
    // Set up the thumbnail image path
    $image_path_tn = $dir.makeThumbnailName($filename);
   
    // Create a thumbnail image that's a maximum of 200 pixels square
    resizeImage($image_path, $image_path_tn, 200, 200);
   
    // Resize original to a maximum of 500 pixels square
    resizeImage($image_path, $image_path, 500, 500);
   }

   // Checks and Resizes image
function resizeImage($old_image_path, $new_image_path, $max_width, $max_height) {
     
    // Get image type
    $image_info = getimagesize($old_image_path);
    $image_type = $image_info[2];
   
    // Set up the function names
    switch ($image_type) {
    case IMAGETYPE_JPEG:
     $image_from_file = 'imagecreatefromjpeg';
     $image_to_file = 'imagejpeg';
    break;
    case IMAGETYPE_GIF:
     $image_from_file = 'imagecreatefromgif';
     $image_to_file = 'imagegif';
    break;
    case IMAGETYPE_PNG:
     $image_from_file = 'imagecreatefrompng';
     $image_to_file = 'imagepng';
    break;
    default:
     return;
   } // ends the resizeImage function
   
    // Get the old image and its height and width
    $old_image = $image_from_file($old_image_path);
    $old_width = imagesx($old_image);
    $old_height = imagesy($old_image);
   
    // Calculate height and width ratios
    $width_ratio = $old_width / $max_width;
    $height_ratio = $old_height / $max_height;
   
    // If image is larger than specified ratio, create the new image
    if ($width_ratio > 1 || $height_ratio > 1) {
   
     // Calculate height and width for the new image
     $ratio = max($width_ratio, $height_ratio);
     $new_height = round($old_height / $ratio);
     $new_width = round($old_width / $ratio);
   
     // Create the new image
     $new_image = imagecreatetruecolor($new_width, $new_height);
   
     // Set transparency according to image type
     if ($image_type == IMAGETYPE_GIF) {
      $alpha = imagecolorallocatealpha($new_image, 0, 0, 0, 127);
      imagecolortransparent($new_image, $alpha);
     }
   
     if ($image_type == IMAGETYPE_PNG || $image_type == IMAGETYPE_GIF) {
      imagealphablending($new_image, false);
      imagesavealpha($new_image, true);
     }
   
     // Copy old image to new image - this resizes the image
     $new_x = 0;
     $new_y = 0;
     $old_x = 0;
     $old_y = 0;
     imagecopyresampled($new_image, $old_image, $new_x, $new_y, $old_x, $old_y, $new_width, $new_height, $old_width, $old_height);
   
     // Write the new image to a new file
     $image_to_file($new_image, $new_image_path);
     // Free any memory associated with the new image
     imagedestroy($new_image);
     } else {
     // Write the old image to a new file
     $image_to_file($old_image, $new_image_path);
     }
     
     // Free any memory associated with the old image
     imagedestroy($old_image);
   } // ends the if - else began on line 36

   //Add this function
   function GetReview($newReview){
    $id = '<div id="review-item">';
        foreach ($newReview as $item) {
            // echo gettype($item);
            // exit;
            $id.= "<div class='item'><h3>";
            $id.= substr($item['clientFirstname'], 0,1). " ". $item['clientLastname']. " " ."<span class='fecha'>wrote on</span>"." ". "<span class='fecha'>";
            $id.= $item['reviewDate']."</span>" .":". "</h3></div>";
            $id .="<div><p> $item[reviewText]</p>";
            $id .= "</div>";    
         
        } 
        $id .= '</div>';
        return $id;
    }
?>