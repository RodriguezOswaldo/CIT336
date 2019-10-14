<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/dashboard/acme/css/normalize.css">
    <link rel="stylesheet" href="/dashboard/acme/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title> Registration | Acme Inc.</title>
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
        <div class="wrap">
        <div class="icon"><i class='far fa-edit'></i></div>
        <h1 class="loginTitle">Register</h1>
        <?php
        if (isset($message)) {
        echo $message;
        }
        ?>
        <form action="/dashboard/acme/accounts/index.php" method="POST">
            <label>Please complete all the fields</label><br>
            <label for="clientFirstname"><span>*</span> First Name:</label><br><input  name="clientFirstname" id="clientFirstname" type="text"><br>
            <label for="clientLastname"><span>*</span> Last Name:</label><br><input  name="clientLastname" id="clientLastname" type="text"><br>
            <label for="clientEmail"><span>*</span> Email:</label><br><input name="clientEmail" id="clientEmail" type="email"><br>
            <label for="clientPassword"><span>*</span> Password:</label><br><input name="clientPassword" id="clientPassword" type="text"><br>
            <input type="submit" name="submit" value="Sign Up"> 
            <!-- Add the action key - value pair -->
            <input type="hidden" name="action" value="register">

        </form>

    </div>
        </main>

        <footer id="footer">
            <?php include $_SERVER['DOCUMENT_ROOT']."/dashboard/acme//modules/footer.php"; ?>
            <p id="lastupdated">Last Updated: <?php echo date('j F, Y', getlastmod()) ?></p>
        </footer>
    </div>
</body>

</html>