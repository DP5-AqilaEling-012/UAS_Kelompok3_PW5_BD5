<?php 

require 'functions.php';

if(isset($_POST["register"])){

	if(registrasi($_POST) > 0){
		echo "<script>
				alert('berhasil ditambahkan');
			  </script>";

		header("Location: login.php");



	} else{
		echo mysqli_error($conn);
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
</head>

<body>
    <div class="container">
        
        <section class="register">
            <h1>Registrasi</h1>

            <form action="" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" placeholder="Masukkan Username" required>

                <label for="email">Email:</label>
                <input type="text" name="email" id="email" placeholder="Masukkan Email" required>

                <label for="password">Password:</label>
                <div style="position: relative;">
                    <input type="password" name="password" id="password" placeholder="Masukkan Password" required>
                    
                </div>

                <label for="confirm_password">Konfirmasi Password:</label>
                <div style="position: relative;">
                    <input type="password" name="password2" id="password2" placeholder="Konfirmasi Password" required>
                    
                </div>

                <button type="submit" name="register">Registrasi</button>

                <div class="login">
                    <p>Sudah memiliki akun? <a href="login.php">Masuk</a></p>
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














