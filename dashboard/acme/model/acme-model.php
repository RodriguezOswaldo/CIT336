<?php
/*
Acme Model
*/
function getCategories(){
    // Create a connection object from the acme connection function
    $db = acmeConnect(); 
    // The SQL statement to be used with the database 
    $sql = 'SELECT categoryName FROM categories ORDER BY categoryName ASC'; 
    // The next line creates the prepared statement using the acme connection      
    $stmt = $db->prepare($sql);
    // The next line runs the prepared statement 
    $stmt->execute(); 
    // The next line gets the data from the database and 
    // stores it as an array in the $categories variable 
    $categories = $stmt->fetchAll(); 
    // The next line closes the interaction with the database 
    $stmt->closeCursor(); 
    // The next line sends the array of data back to where the function 
    // was called (this should be the controller) 
    return $categories;
   }

   function getCategoriesID(){
    // Create a connection object from the acme connection function
    $db = acmeConnect(); 
    // The SQL statement to be used with the database 
    $sql1 = 'SELECT categoryId FROM categories ORDER BY categoryName ASC'; 
    // The next line creates the prepared statement using the acme connection      
    $stmt1 = $db->prepare($sql1);
    // The next line runs the prepared statement 
    $stmt1->execute(); 
    // The next line gets the data from the database and 
    // stores it as an array in the $categories variable 
    $categories = $stmt1->fetchAll(); 
    // The next line closes the interaction with the database 
    $stmt1->closeCursor(); 
    // The next line sends the array of data back to where the function 
    // was called (this should be the controller) 
    return $categories;
   }

?>