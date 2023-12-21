<?php 

require "functions.php";

if( isset($_POST['submit'])){

	
	if(ubah($_POST) > 0){
		echo "
			<script>
				alert('Changed Successfully');
				document.location.href = 'afterlogin.php';
			</script>
		";
		
	} else{
		echo "
			<script>
				alert('Failed to change');
				document.location.href = 'afterlogin.php';
			</script>
		";
	}

} 

 ?>

<!DOCTYPE html>
<html>
<head>
    <title> Update Password </title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container" id="container">
        <div class="form-container sign-in-container">
	<form action="" method="post">
	<h2 style="padding-bottom: 15px"> Update Password</h2>
				<input type="password" name="password" id="password" placeholder="Old Password">
				<input type="password" name="password2" id="password2" placeholder="New Password">
				<br>
				<button type="submit" name="submit">Update</button>
	</form>
		</div>

	<div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-right">
                    <img src="image/pc4.jpeg" alt="movie-2" height="480" width="500"/>
                </div>
            </div>
        </div>
    </div>
</body>
</html>