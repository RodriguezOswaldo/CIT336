<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/dashboard/acme/css/normalize.css">
    <link rel="stylesheet" href="/dashboard/acme/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam&display=swap" rel="stylesheet">
    <title> Template | Acme Inc.</title>
</head>

<body>
    <div class="content">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'].'/dashboard/acme/modules/header.php'; ?>
        </header>

        <nav id="navigation" class="">
            <?php include $_SERVER['DOCUMENT_ROOT'].'/dashboard/acme/modules/nav.php'; ?>
        </nav>

        <main id="main">
        <h1>Registration Form</h1>
            <h3>Please complete all the fields</h3>
            <form action="">
                <label for="clientFirstName"><span>*</span>First Name:</label><input name="clientFirstname" id="clientFirstname" type="text"><br>
                <label for="clientLastName"><span>*</span>Last Name:</label><input name="clientLastName" id="clientLastName" type="text"><br>
                <label for="clientEmail"><span>*</span>Email:</label><input name="clientEmail" id="clientEmail" type="email"><br>
                <label for="clientPassword"><span>*</span>Password:</label><input name="clientPassword" id="clientPassword" type="text"><br>
                 <input type="submit"> 
            </form> 
        </main>

        <footer id="footer">
            <?php include $_SERVER['DOCUMENT_ROOT']."/dashboard/acme//modules/footer.php"; ?>
            <p id="lastupdated">Last Updated: <?php echo date('j F, Y', getlastmod()) ?></p>
        </footer>
    </div>
</body>

</html>