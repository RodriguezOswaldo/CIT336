<?php
function addNewCategory($categoryName){
    //Create a connection object using the acme connection function
    $db = acmeConnect();
    // The SQL statement
    $sql = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';

    $stmt = $db->prepare($sql);
    // The next line runs the prepared statement 
    $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
    //Insert the data
    $stmt->execute(); 
    // The next line gets the data from the database and 
    // stores it as an array in the $categories variable 
    $rowsChanged = $stmt->rowCount(); 
    // The next line closes the interaction with the database 
    $stmt->closeCursor(); 
    // The next line sends the array of data back to where the function 
    // was called (this should be the controller) 
    return $rowsChanged;
}

function addProd($categoryId, $invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $invVendor, $invStyle) {
    // Create a connection object from the acme connection function 
     $db = acmeConnect();
    //SQL
     $sql = 'INSERT INTO inventory (categoryId, invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation, invVendor, invStyle) VALUES (:categoryId, :invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :invVendor, :invStyle)';
    // Create the prepared statement using the acme connection
     $stmt = $db->prepare($sql);
    // The next 11 lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
     $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_STR);
     $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
     $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
     $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
     $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
     $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
     $stmt->bindValue(':invStock', $invStock, PDO::PARAM_STR);
     $stmt->bindValue(':invSize', $invSize, PDO::PARAM_STR);
     $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_STR);
     $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
     $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
     $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
     //this runs the statements above and inserts the data into the database
     $stmt->execute();
     //this checks to see how many rows were added as a result of the above statements
     $rowsChanged = $stmt->rowCount();
     //this closes the interaction between the function and the database server
     $stmt->closeCursor();
     //This sends the results from the rowCount above to the controller (used in showing a success message I assume)
     return $rowsChanged;
    }

    // Get products by categoryId 
function getProductsByCategory($categoryId){ 
    $db = acmeConnect(); 
    $sql = ' SELECT * FROM inventory WHERE categoryId = :categoryId'; 
    $stmt = $db->prepare($sql); 
    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_INT); 
    $stmt->execute(); 
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $stmt->closeCursor(); 
    return $products; 
   }
   
// Get product information by invId<>
function getProductInfo($invId){
    $db = acmeConnect();
    $sql = 'SELECT * FROM inventory WHERE invId = :invId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $prodInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $prodInfo;
   }

   ?>

