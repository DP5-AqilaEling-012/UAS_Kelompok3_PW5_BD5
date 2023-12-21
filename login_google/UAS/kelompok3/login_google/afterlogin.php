<?php 

require_once('auth.php');

require 'functions.php';

tambahUser();

if(isset($_GET['logout'])){
    session_destroy();
    header('location: login.php');
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title></title>
 </head>
 <body>
    <h1>ini afterlogin</h1>
    <img  src="<?= $_SESSION['login_picture'] ?>"  style="cursor: pointer;">
        <span><?= ucwords($_SESSION['login_givenName'] . " " .$_SESSION['login_familyName']) ?></span>
    <a href="afterlogin.php?logout">Logout</a>
 </body>
 </html>