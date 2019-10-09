<?php
/*
Accounts Controller 
*/



// Get the database connection file
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';

// Get the array of categories
$categories = getCategories();

/**************************
 ****Array of categories***
 **************************/
// var_dump($categories);
// 	exit;

// Build a navigation bar using the $categories array
$navList = '<ul>';
$navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
 $navList .= "<li><a href='/acme/index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';

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
    case '':
    
    break;
    default:

}
?>