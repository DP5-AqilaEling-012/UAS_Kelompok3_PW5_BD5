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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <style>
     body {
            background-color:#e9edcd; 
            font-family: 'Arial', sans-serif;
        }

     .exercise-box {
      border-radius: 15px;
     }

     .bg-custom header img {
    max-width: 50%; 
    height: auto;
    }

    a[href="afterlogin.php?logout"],
    a[href="ubah.php"] {
    display: inline-block;
    padding: 10px 20px;
    border-radius: 5px;
    margin-bottom: 20px;
    background-color: #b4baec;
    color: #000;
    text-decoration: none;
    transition: background-color 0.3s, color 0.3s;
    }

    a[href="afterlogin.php?logout"]:hover,
    a[href="ubah.php"]:hover {
    background-color: whitesmoke; 
    color: #333; 
    }
    
    .navbar {
    background-color: #b4baec;
    height: 150px;
    }
  </style>

<title>AFTER LOGIN</title> 
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid"> 
                <a class="navbar-logo" href="#" style="text-decoration: none;">
                <img src="<?= $_SESSION['login_picture'] ?>" style="cursor: pointer;  max-width: 120px;">
                <br>
                <?= ucwords($_SESSION['login_givenName'] . " " .$_SESSION['login_familyName']) ?> 
                </a> 
                <ul class="navbar-nav d-flex flex-row me-1">
                    <img src="image/logo.png" alt="SPORTREVIVE" width="350"/>
                </ul>    
            </div>  
        </nav> 
    </header>
    
  <div class="container mt-5">
    <p class="text-black text-center font-weight-bold">Explore more about Healing's journey</p>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-6 mb-3">
        <div class="exercise-box" style="background: url('image/fotoo.jpg') center/cover no-repeat; height: 300px; width:100%; position: relative;">
          <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
            <h1> <a href="data_anggota/index.php">MEMBER</a></h1>
          </div>
        </div>
      </div>

    <div class="col-md-6 mb-3">
      <div class="exercise-box" style="background: url('image/carousel\ 1.jpg') center/cover; height: 300px;  width:100%; position: relative;">
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
         <h1>
        <a href="UAS/wisata.html" style="color: white; text-decoration: none;">DESTINATION</a>
      </h1>
    </div>
  </div>
</div>

    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mb-3">
         <div class="exercise-box" style="background: url('image/steps.jpg') center/cover no-repeat; height: 300px; width:100%; position: relative;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
              <h1> <a href="destinasi/destinasi.php">OUR STEPS</a></h1>
        </div>
      </div>
    </div>

      <div class="col-md-6 mb-3">
        <div class="exercise-box" style="background: url('image/rating.jpg') center/cover; height: 300px;  width:100%; position: relative;">
          <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: white;">
          <h1> <a href="rating/rating.php">RATING</a></h1>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-9 offset-md-3 text-right">
    <a href="afterlogin.php?logout">Logout</a>
    <a href="ubah.php">Update Password</a>
  </div>

  <footer style="background-color:#b4baec; padding: 15px; color: white; width: 100%;">
    <div class="text-center">
        <h5 style="font-size: 24px;">Created by @healing.girls</h5>
        <p style="font-size: 18px;">© 2023. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
