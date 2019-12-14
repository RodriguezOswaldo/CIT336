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

        <main class="adminMain " id="main">
        <h1><?php echo $categoryName; ?> Products</h1>
            <?php if(isset($message)){
                echo $message; } 
            ?>
                <?php if(isset($prodDisplay)){ 
                    echo $prodDisplay; 
                } ?>
                <hr>
                 <?php
                  if(isset($printImage)){
                            echo $printImage;
                        }else{
                            echo 'There is not an image for this product';
                        }
                         ?>
                         <br>
                         <hr>
                          <h1>Customer Reviews</h1>
                          <h3>Give your Review for <?php if(isset($prodDisplay)){
                              echo $products['invName'];
                          } ?></h3><?php if (isset($message)){
                            echo $message;
                        } ?>
                        <div id="prod-detail"><?php if(isset($prodDetail)){ echo $prodDetail;}
                        else{
                            echo 'nothing to display yet, work in progress';
                        } ?></div>
                        <hr>
                        <?php  if (!isset($_SESSION['clientData'])){
                            echo "<p>Make sure you are <a href='/dashboard/acme/accounts?action=login'>Log in</a> to review this product</p>";
                        }else{?><div> <form action="/dashboard/acme/reviews/" method="post">
                            <h2>Add Review</h2>
                            <label class="labels" for="reviewText"></label>Name:
                            <?php echo substr($_SESSION['clientData']['clientFirstname'],0,1)."."." " . $_SESSION['clientData']['clientLastname']."</label>";?><br>
                            <textarea name="reviewText" id="reviewText" cols="30" rows="4" value="<?php echo $cont;?>"></textarea><br>
                            <input type="hidden" name="invId" value=<?php echo $invId; ?>>
                            <input type="hidden" name="action" value="add-new-review">
                            <input type="submit" value="Submit Review">
                        </form></div><?php 
                        }if(isset($imprimir)){
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