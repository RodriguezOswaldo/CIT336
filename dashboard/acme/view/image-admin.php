<?php
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the array of categories
$categories = getCategories();
//Creating the dynamic navigation bar
$navList = '<ul>';
$navList .= "<li><a href='/dashboard/acme/index.php' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
 $navList .= "<li><a href='/acme/index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
    }
    $navList .= '</ul>';

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    }
?><!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/dashboard/acme/css/normalize.css">
    <link rel="stylesheet" href="/dashboard/acme/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam&display=swap" rel="stylesheet">
    <title>Image Management | Acme Inc.</title>
</head>

<body>
    <div class="content">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/dashboard/acme/modules/header.php'; ?>
        </header>

        <nav id="navigation" class=""> 
            <?php echo $navList; ?>
        </nav>

        <main class="adminMain image-management" id="main">
            <h1>Image Management</h1>
            <p class="welc-message"> Welcome to the image management page please choose one of the following options.</p>       
            <h2>Add New Product Image</h2>
            <?php
            if (isset($message)) {
            echo $message;
            } ?>

            <form class="product-image" action="/dashboard/acme/uploads/" method="post" enctype="multipart/form-data">
                <label for="invItem">Product</label><br>
                <?php echo $prodSelect; ?><br><br>
                <label>Upload Image:</label><br>
                <input type="file" name="file1"><br>
                <input type="submit" class="regbtn" value="Upload">
                <input type="hidden" name="action" value="upload">
            </form>
            <hr>
            <h2>Existing Images</h2>
            <p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
            <?php
            if (isset($imageDisplay)) {
            echo $imageDisplay;
            } ?>
        </main>

        <footer id="footer">
            <?php include $_SERVER['DOCUMENT_ROOT']."/dashboard/acme//modules/footer.php"; ?>
            <p id="lastupdated">Last Updated: <?php echo date('j F, Y', getlastmod()) ?></p>
        </footer>
    </div>
   
</body>

</html>
<?php unset($_SESSION['message']); ?>