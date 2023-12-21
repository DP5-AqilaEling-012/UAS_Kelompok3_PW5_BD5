<?php require_once('auth.php') ?>
<?php require_once('../vendor/autoload.php') ?>
<?php
$clientID = "607966749430-fcvn4qvofc7ru9h1vtaf33a0cdir8f0l.apps.googleusercontent.com";
$secret = "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";

$gclient = new Google_Client();

$gclient->setClientId($clientID);
$gclient->setClientSecret($secret);
$gclient->setRedirectUri('http://localhost/phpdasar/kelompok3/login_google/login.php');


$gclient->addScope('email');
$gclient->addScope('profile');

if(isset($_GET['code'])){
    $token = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token['error'])){
        $gclient->setAccessToken($token['access_token']);
        $_SESSION['access_token'] = $token['access_token'];
        $gservice = new Google_Service_Oauth2($gclient);
        $udata = $gservice->userinfo->get();
        foreach($udata as $k => $v){
            $_SESSION['login_'.$k] = $v;
        }
        $_SESSION['ucode'] = $_GET['code'];
        header('location: afterlogin.php');
        exit;
    }
}

require "functions.php";
if(isset($_POST["login"])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = pg_query($conn, "SELECT * FROM users WHERE user_email = '$email'");

    if(pg_num_rows($result) === 1){
        $row = pg_fetch_assoc($result);
        if(password_verify($password, $row["password"])){
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
<html>
<head>
    <title> Login </title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
        <section class="login">
            <?php if (isset($error)) : ?>
            <p style="color:red; font-style: italic;">Email / Password Incorrect</p>
            <?php endif; ?>

            <div class="container" id="container">
             <div class="form-container sign-in-container">
             <form action="" method="post">

                <h2 style="padding-bottom: 15px"> Login Now</h2>
                <input type="text" name="email" id="email" placeholder="Email" required>

                <div style="position: relative;">
                    <input type="password" name="password" id="password" placeholder="Password" required> 
                </div>
                <button type="submit" name="login">Login</button>

                <h5>Don't have an account? <a class="ghost" id="login" style="color:blue;" href="registrasi.php"><u>Register</u></a></h5>

            <section class="tombol text-center">
            <a href="<?= $gclient->createAuthUrl() ?>" class="d-block mx-auto">
            <img src="image/google.jpg" alt="Google Login" class="img-fluid" style="max-width: 200px; border-radius: 10px;">
             </a>
            </section>
        </form>  
    </div>

    <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="image/pc1.jpg" alt="movie-1" height="480" width="500"/>
                </div>
                <div class="overlay-panel overlay-right">
                    <img src="image/pc1.jpg" alt="movie-2" height="480" width="500"/>
                </div>
             </div>
            </div>
         </div>
    </div>
   
</body>

</html>