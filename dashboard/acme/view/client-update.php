<?php

?><!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/dashboard/acme/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam&display=swap" rel="stylesheet">
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
        <h1>Update Account</h1><br><br>
   <h3>Use this form to update your name or email information</h3><br>
   <form action="../accounts/index.php" method="POST" class="reg">  
         
         <label>First Name: </label><br>
         <input name="clientFirstname" id="clientFirstname" type="text" <?php if(isset($clientFirstname)){ echo "value= '$clientFirstname'";}?> maxlength="50" required /><br>
         <label> Last Name: </label><br>
         <input name="clientLastname" id="clientLastname" type="text" <?php if(isset($clientLastname)){ echo "value= '$clientLastname'";}?>maxlength="50" required/><br>
         <label>Email: </label><br>
         <input name="clientEmail" id="clientEmail" type="email" <?php if(isset($clientEmail)){ echo "value= '$clientEmail'";}?> maxlength="50" required/><br><br>
         <input type="hidden" name="action" value="Update">
         <input type="submit" name="submit" value="Update Account" class="big1"> 
 
   </form>
   </div>
   <div class="loginbox">
   <h2>Password Change</h2><br><br>
   <h3>Use this form to change this password</h3><br>
   <form action="../accounts/index.php" method="POST" class="reg"> 
      <label> New Password: </label>
      <input name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" type="password" maxlength="50"/>
      <input type="hidden" name="action" value="password"/>
      <input type="submit" name="submit" value="Change Password" class="big1"/> 
      <label> </label><br>
      <span class="message3">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
   
   
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