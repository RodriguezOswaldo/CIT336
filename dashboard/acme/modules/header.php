<?php
$cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
//keeping the session log in
if (isset($_SESSION['loggedin'])) {    
} else {
    $_SESSION['loggedin'] = FALSE;
}

if (!$_SESSION['loggedin'] == TRUE) {
   $GLOBALS['loginlink'] = '/dashboard/acme/accounts?action=login';
   $GLOBALS['NameLink']= 'My Account';?>
   <div>
           <a href="/dashboard/acme/index.php"><img class="logo" src="/dashboard/acme/images/site/logo.jpg" title="Acme Logo" alt="Acme Logo"></a>
       </div>
       <div id="myAccount">
       <a href="<?php echo $GLOBALS['loginlink'];?>"><img class="account" src="/dashboard/acme/images/site/account.jpg" title="My Account Menu" alt="My Account Folder">
           <?php 
        
           if(isset($cookieFirstname)){
           echo "<span>Welcome $cookieFirstname</span>";
           } ?> <span><?php echo $GLOBALS['NameLink'];?></span></a>
       </div>        <?php
} else {
    $GLOBALS['loginlink'] = '/dashboard/acme/accounts?action=Logout';
    $GLOBALS['NameLink']= 'Log Out';?>
    <div>
    <a href="/dashboard/acme/index.php"><img class="logo" src="/dashboard/acme/images/site/logo.jpg" title="Acme Logo" alt="Acme Logo"></a>
    </div>
    <div id="myAccount">
    <a href="<?php echo '/dashboard/acme/accounts?action=admin';?>"><?php 
        if(isset($cookieFirstname)){
        echo "<span>Welcome $cookieFirstname</span>";
        } ?> <img class="account" src="/dashboard/acme/images/site/account.jpg" title="My Account Menu" alt="My Account Folder"></a>
        <a href="<?php echo $GLOBALS['loginlink'];?>"><span><?php echo $GLOBALS['NameLink'];?></span></a>
        <?php
}


