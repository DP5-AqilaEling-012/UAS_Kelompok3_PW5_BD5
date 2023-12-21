<?php
session_start();

if((!isset($_SESSION['ucode']) || (isset($_SESSION['ucode']) && empty($_SESSION['ucode']))) && !isset($_SESSION['login'])){
    if(strstr($_SERVER['PHP_SELF'], 'login.php') === false)
    header('location:login.php');
}else{
    if(strstr($_SERVER['PHP_SELF'], 'afterlogin.php') === false)
    header('location:afterlogin.php');
}



?>