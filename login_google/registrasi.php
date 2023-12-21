<?php 

require 'functions.php';

if(isset($_POST["register"])){

	if(registrasi($_POST) > 0){
		echo "<script>
				alert('berhasil ditambahkan');
			  </script>";

		header("Location: login.php");



	} else{
		echo pg_last_error($conn);
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
    <title> Register </title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <div class="container" id="container">
        <div class="form-container sign up-container">
        <form action="" method="post">

                <h2 style="padding-bottom: 15px"> Register Here</h2>    
                <input type="text" name="username" id="username" placeholder="Username" required>
                <input type="text" name="email" id="email" placeholder="Email" required>
                    <input type="password" name="password" id="password" placeholder="Password" required> 
                    <input type="password" name="password2" id="password2" placeholder="Confirm Password" required> 
                <br>
                <button type="submit" name="register">Register</button>

                <div class="login">
                <h5>Already have an account? <a class="ghost" id="login" style="color:blue;" href="login.php"><u>Login</u></a></h5>
                </div>
            </form>
        </div>
            <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img src="image/pc2.jpeg" alt="movie-1" height="480" width="500"/>
  
                </div>

                <div class="overlay-panel overlay-right">
                    <img src="image/pc2.jpeg" alt="movie-2" height="480" width="500"/>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>