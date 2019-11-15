<?php
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the array of categories
$categories = getCategories();
//Creating the dynamic navigation bar
$navList = '<ul>';
$navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
 $navList .= "<li><a href='/acme/index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';

$indexCatIDtryarray = 0;
$catNames = array();
foreach ($categories as $category) {
    //save the names in the array
   $catNames[$indexCatIDtryarray] = urlencode($category['categoryName']);
    //increment the index
    $indexCatIDtryarray = $indexCatIDtryarray + 1;
}
//$navList .= '</ul>';
 // reset the index
 $indexCatIDtryarray = 0;
 $catList = '<select name="categoryId" id="categoryId" class="message3">';
 $catList .= '<option value="Choose a category">Choose a category</option>';
 
 foreach ($categoriesID as $categoryID) {
  
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
 

// Check if the clientLevel has been declared
if (isset($_SESSION['clientData']['clientLevel'])) {
//Check if the lvl is = 1 don't give admin privileges
    if ($_SESSION['clientData']['clientLevel'] == 1) {
        include "../view/home.php";
        exit;
    }
}
//if user hasn't logged in display home view
if (isset($_SESSION['loggedin'])) {
    
} else {
    $_SESSION['loggedin'] = FALSE;
}
if (!$_SESSION['loggedin'] == TRUE) {
    include "../view/login.php";
    exit;
} 
if (isset($message)) { 
    echo $message; 
    } 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/dashboard/acme/css/normalize.css">
    <link rel="stylesheet" href="/dashboard/acme/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam&display=swap" rel="stylesheet">
    <title> Products | Acme Inc.</title>
</head>

<body>
    <div class="content">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/dashboard/acme/modules/header.php'; ?>
        </header>

        <nav id="navigation" class="">
            <?php echo $navList; ?>
        </nav>

        <main id="main">
            <h1>Product Management</h1> 
            <a href="/dashboard/acme/products?action=newProduct">Add New Product</a> <br>
            <a href="/dashboard/acme/products?action=newCategory">Add New Category</a>
      
            <?php
                if (isset($catList)) { 
                echo '<h2>Products By Category</h2>'; 
                echo '<p>Choose a category to see those products</p>'; 
                echo $catList;    
                }
                ?>
                <noscript>
                <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
                </noscript>
                <table id="productsDisplay"></table>
        </main>

        <footer id="footer">
            <?php include $_SERVER['DOCUMENT_ROOT']."/dashboard/acme//modules/footer.php"; ?>
            <p id="lastupdated">Last Updated: <?php echo date('j F, Y', getlastmod()) ?></p>
        </footer>
    </div>
    <script src="../js/products.js">
       
    </script>
</body>

</html>