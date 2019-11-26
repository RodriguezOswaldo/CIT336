<?php

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
    <title><?php if(isset($prodInfo['invName'])){ 
       echo "Delete $prodInfo[invName] ";} 
       elseif(isset($invName)) { echo $invName; }?> 
       | Acme, Inc</title>
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
        <h1><?php if(isset($prodInfo['invName'])){ 
            echo "Delete $prodInfo[invName] ";} 
            elseif(isset($invName)) { echo $invName; }
        ?></h1>
        <p style="color:red;">Confirm Product Deletion. The delete is permanent.</p>
        <form method="POST" class="products" action="../products/">
            <fieldset>
               
                <label for="invName">Product Name</label> <br/>
                <input type="text" readonly name="invName" id="invName" <?php 
                    if(isset($prodInfo['invName'])) {
                        echo "value='$prodInfo[invName]'"; }
                    ?> required > <br/>
                <label for="invDescription">Product Description</label> <br/>
                <textarea name="invDescription" readonly id="invDescription" title="Description" maxlength="50" required><?php 
                if(isset($prodInfo['invDescription'])) {
                    echo $prodInfo['invDescription']; }
                ?></textarea><br/>
                <input type="submit" name="submit" value="Delete Product" class="log"/>       
                <input type="hidden" name="action" value="deleteProd">
                <input type="hidden" name="invId" 
                value="<?php if(isset($invId)){ echo $invId; }?>">
                </fieldset>
            </form>    
        </main>

        <footer id="footer">
            <?php include $_SERVER['DOCUMENT_ROOT']."/dashboard/acme//modules/footer.php"; ?>
            <p id="lastupdated">Last Updated: <?php echo date('j F, Y', getlastmod()) ?></p>
        </footer>
    </div>
</body>

</html>