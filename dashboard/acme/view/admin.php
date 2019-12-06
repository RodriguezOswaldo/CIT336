<?php
require_once '../library/connections.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the array of categories
$categories = getCategories();
//Creating the dynamic navigation bar
// $navList = '<ul>';
// $navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
// foreach ($categories as $category) {
//  $navList .= "<li><a href='/acme/index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
//     }
//     $navList .= '</ul>';


if (isset($_SESSION['loggedin'])) {
    
    } else {
        $_SESSION['loggedin'] = FALSE;
    }
    if (!$_SESSION['loggedin'] == TRUE) {
        include "../view/home.php";
        exit;
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
    <title> Admin | Acme Inc.</title>
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
        <h1>Logged in as<span>
          <?php echo $_SESSION['clientData']['clientFirstname'].' '.$_SESSION['clientData']['clientLastname'];?></span></h1>
        <ul>
            <li><strong>First Name: </strong><?php echo $_SESSION['clientData']['clientFirstname']; ?></li>
            <li><strong>Last Name: </strong><?php echo $_SESSION['clientData']['clientLastname']; ?></li>
            <li><strong>Email Account: </strong><?php echo $_SESSION['clientData']['clientEmail']; ?></li>
        </ul>
        <?php
              
        ?> <h3><a href="../accounts/index.php?action=update"> Update Account Information </a></h3><br><?php if( $_SESSION['clientData']['clientLevel'] > 1) { 
            echo "<h2 class ='letras'>Administrative Functions</h2><br>";
            echo "<h3>Use the link below to manage products</h3><br>";
              
            if ($_SESSION['clientData']['clientLevel'] > 1) {
                echo '<p><a href="/dashboard/acme/products/">Go to Products Management</a></p>';
            }
            
         }?>
        </main>

        <footer id="footer">
            <?php include $_SERVER['DOCUMENT_ROOT']."/dashboard/acme//modules/footer.php"; ?>
            <p id="lastupdated">Last Updated: <?php echo date('j F, Y', getlastmod()) ?></p>
        </footer>
    </div>
</body>

</html>