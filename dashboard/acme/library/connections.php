<?php
/*
Database Connections 
*/
$server = "localhost";
$database = "acme";
$user = "iClient";
$password = "YOGEfETechF4TiNQ";
$dsn = 'mysql:host='.$server.';dbname='.$database;
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try{
    $acmeLink = new PDO($dsn, $user, $password, $options);
    echo '$acmeLink worked succesfully<br>'; 
}catch(PDOException $exc){
    echo $exc->getMessage();
}
?>