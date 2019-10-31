<?php

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
    <title> New Categories | Acme Inc.</title>
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
            <h1>You are in the category page!</h1> 
            <p>Add a new category of products below</p>
  
            <br/><br/>
            
            <form method="POST" class="reg" action="../products/index.php">
                <label>New Category Name</label> <br/>
                <input name="categoryName" id="categoryName" title="Category Name" placeholder="Name" type="text" required>
                <br/><br/>
                <input type="submit" name="submit" value="Add Category" class="log"/>       
                <input type="hidden" name="action" value="cat">
            
            </form>  
        </main>

        <footer id="footer">
            <?php include $_SERVER['DOCUMENT_ROOT']."/dashboard/acme//modules/footer.php"; ?>
            <p id="lastupdated">Last Updated: <?php echo date('j F, Y', getlastmod()) ?></p>
        </footer>
    </div>
</body>

</html>