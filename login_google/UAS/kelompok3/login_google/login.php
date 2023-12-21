<?php require_once('auth.php') ?>
<?php require_once('../vendor/autoload.php') ?>
<?php
$clientID = "607966749430-fcvn4qvofc7ru9h1vtaf33a0cdir8f0l.apps.googleusercontent.com";
$secret = "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";

// Google API Client
$gclient = new Google_Client();

$gclient->setClientId($clientID);
$gclient->setClientSecret($secret);
$gclient->setRedirectUri('http://localhost/phpdasar/kelompok3/login_google/login.php');


$gclient->addScope('email');
$gclient->addScope('profile');

if(isset($_GET['code'])){
    // Get Token
    $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);

    // Check if fetching token did not return any errors
    if(!isset($token['error'])){
        // Setting Access token
        $gclient->setAccessToken($token['access_token']);

        // store access token
        $_SESSION['access_token'] = $token['access_token'];

        // Get Account Profile using Google Service
        $gservice = new Google_Service_Oauth2($gclient);

        // Get User Data
        $udata = $gservice->userinfo->get();
        foreach($udata as $k => $v){
            $_SESSION['login_'.$k] = $v;
        }
        $_SESSION['ucode'] = $_GET['code'];

        header('location: afterlogin.php');
        exit;
    }
}

// login pake php
require "functions.php";
if(isset($_POST["login"])){
    $email = $_POST['email'];
    $password = $_POST['password'];


    $result = pg_query($conn, "SELECT * FROM users WHERE user_email = '$email'");

    //cek username
    if(pg_num_rows($result) === 1){

        //cek password
        $row = pg_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
            //set session
            $_SESSION['login'] = true;
            $_SESSION['login_email'] = $email;
            $_SESSION['login_givenName'] = $row["username"];
            $_SESSION['login_familyName'] = '';
            $_SESSION['login_picture'] = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTeBbY5yeo6weQ7oRaU495oGfmUnfCNGYDFnx6vs-4rL0LG069UPWwsCw7tqZ7XAsf54E&usqp=CAU";


            header("Location: afterlogin.php");
            exit;
        }



    }

    $error = true;

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>

<body>
    <div class="container">
        <section class="gambar">
            <img src="src\logo.png" alt="Logo">
        </section>
        <section class="login">
            <h1>Login</h1>

            <?php if (isset($error)) : ?>
            <p style="color:red; font-style: italic;">Username / email / password salah</p>
            <?php endif; ?>

            <form action="" method="post">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Masukkan Email" required>

                <label for="password">Password:</label>
                <div style="position: relative;">
                    <input type="password" name="password" id="password" placeholder="Masukkan Password" required> 
                    
                </div>

                <button type="submit" name="login">Login</button>

                <div class="registrasi">
                    <p>Belum punya akun? <a href="registrasi.php">Buat Akun</a></p>
                </div>
            </form>
        </section>

        <section class="tombol">
            <a href="<?= $gclient->createAuthUrl() ?>">
                <img src="src/google.png" alt="Google Login" class="google-img">
            </a>
        </section>
    </div>
   
</body>

</html>