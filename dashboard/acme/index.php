<?php

// Get the database connection file
require_once 'library/connections.php';
// Get the acme model for use as needed
require_once 'model/acme-model.php';
 // get the library functions
 require_once $_SERVER['DOCUMENT_ROOT'] . '/dashboard/acme/library/functions.php';

// Get the array of categories
$categories = getCategories();
//Common Navigation Bar
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
    if($action == NULL){
        $action = 'home';
}
}
switch($action){
    case 'home':
    include 'view/home.php';
    break;
}
?>