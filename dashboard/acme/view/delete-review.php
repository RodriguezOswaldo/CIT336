<?php
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the array of categories
$categories = getCategories();
//Creating the dynamic navigation bar
// $navList = '<ul>';
// $navList .= "<li><a href='/dashboard/acme/index.php' title='View the Acme home page'>Home</a></li>";
// foreach ($categories as $category) {
//  $navList .= "<li><a href='/acme/index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
//     }
//     $navList .= '</ul>';
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
    <title><?php echo $categoryName; ?> Products | Acme Inc.</title>
</head>

<body>
    <div class="content">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/dashboard/acme/modules/header.php'; ?>
        </header>

        <nav id="navigation" class=""> 
            <?php echo $navList; ?>
        </nav>

        <main>
  
  <form method="post" action="/dashboard/acme/reviews/index.php">
    <h1><?php echo "$gettingReview[invName] Review"; ?></h1><br>
        <?php if (isset($message)) { echo $message; } ?>
        <h2><label for="reviewText" ><?php echo "Reviewed on " , date('M d, Y', strtotime($gettingReview['reviewDate'])); ?></label></h2><br><br>
        <h3>Are you sure you want to delete this review?</h3>
        <textarea name="reviewText" id="reviewText" title="Review Text" class="textArea" required><?php 
        if (isset($reviewText)) { echo $reviewText; }
        else { echo $gettingReview['reviewText']; } ?></textarea>
        <!-- Add the action name - value pair -->
        <input type="hidden" name="action" value="delete-review-submit" >
        <input type="hidden" name="reviewId" value="<?php if (isset($reviewId)) { echo $reviewId; } ?>">
        <input type="submit" value="Delete Review" class="log1">
	</form>
   <?php if(isset($imprimir)){
       echo $imprimir;
    }
       ?>
 
 </main> 

        <footer id="footer">
            <?php include $_SERVER['DOCUMENT_ROOT']."/dashboard/acme/modules/footer.php"; ?>
            <p id="lastupdated">Last Updated: <?php echo date('j F, Y', getlastmod()) ?></p>
        </footer>
    </div>
   
</body>

</html>