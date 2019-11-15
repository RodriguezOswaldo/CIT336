<?php // If not logged in, go log in
if (!isset($_SESSION['clientData'])){
		include '../accounts/index.php?action=login';
		exit;
}?><!DOCTYPE html>
<html lang="en-us">
<head> 
  <title>Update clients | ACME</title>
  <meta charset="UTF-8">
   <meta name="description" content="Update Client."> 
   <meta name="keywords" content="ACME">
  <meta name="author" content="Alexander Calva">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css">
 
</head>
 
 


<body>
  
  <header>
  <?php include '../common/header.php';?> 
  </header>
   <nav>
   <?php echo $navList;?>
  </nav>
 
  
  <main>
    
   <h1>Update Account</h1><br><br>
   <h3>Use this form to update your name or email information</h3><br>
   <form action="../accounts/index.php" method="POST" class="reg">  
         
         <label>First Name: </label><br>
         <input name="clientFirstname" id="clientFirstname" type="text" <?php if(isset($clientFirstname)){ echo "value= '$clientFirstname'";}?> maxlength="50" required /><br>
         <label> Last Name: </label><br>
         <input name="clientLastname" id="clientLastname" type="text" <?php if(isset($clientLastname)){ echo "value= '$clientLastname'";}?>maxlength="50" required/><br>
         <label>Email: </label><br>
         <input name="clientEmail" id="clientEmail" type="email" <?php if(isset($clientEmail)){ echo "value= '$clientEmail'";}?> maxlength="50" required/><br><br>
         <input type="hidden" name="action" value="Update"/>
         <input type="submit" name="submit" value="Update Account" class="big1"/> 
 
   </form>
   <br><br><br>
   
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
         
    
  
  
  
  
  
  </main>    
   
    
    
    
    <footer>
    <?php include '../common/footer.php';?>
  </footer>  
   

</body>
</html>