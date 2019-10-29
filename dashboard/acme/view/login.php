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
    <title> Login Page | Acme Inc.</title>
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
        <div class="loginbox">
            <div class="icon"><i class='fas fa-fingerprint'></i></div>
            <h1 class="loginTitle">Login</h1>
            <?php
            if (isset($message)) {
            echo $message;
            }
            ?>
            <form action="/dashboard/acme/accounts/index.php" method="POST">
                <label for="emailAddress">Email Address:</label><input required type="email" name="emailAddress" id="emailAddress" ><br>
                <label for="customerPassword">Password:</label><input  required type="password" name="customerPassword" id="customerPassword" >
                <label for="signIn"></label><input type="submit" name="sign in" id="signIn" value="Sign In"><br>
                <label for="notAMember">Not a member?</label><br><button id="notAMember" onclick="window.location='/dashboard/acme/accounts/index.php?action=register'">Create New Account</button>
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