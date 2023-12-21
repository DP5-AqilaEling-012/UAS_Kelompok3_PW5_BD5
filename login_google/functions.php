<?php 

$conn = pg_connect("host=localhost port=5432 dbname=kelompok3 user=postgres password='aqilaeling2402'"); 

function query($query){
    global $conn;
    $result = pg_query($conn, $query);
    $rows = [];
    while( $row = pg_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function tambahUser(){
    global $conn;
    $email =  $_SESSION['login_email'];
    $username =  ucwords($_SESSION['login_givenName'] . " " .$_SESSION['login_familyName']);
    $profile_picture =  $_SESSION['login_picture'];
    $query = "INSERT INTO users (user_email, username, profile_picture) VALUES ('$email', '$username', '$profile_picture')";

    
    $result = pg_query($conn, "SELECT user_email FROM users WHERE user_email = '$email'");

    if(pg_fetch_assoc($result)){
        return false;
    }

    $result = pg_query($conn, $query);

    return pg_affected_rows($result);
}

function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $email =  strtolower(stripslashes($data["email"]));
    $password = pg_escape_string($conn, $data["password"]);
    $password2 = pg_escape_string($conn, $data["password2"]);
    $profile_picture = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRTeBbY5yeo6weQ7oRaU495oGfmUnfCNGYDFnx6vs-4rL0LG069UPWwsCw7tqZ7XAsf54E&usqp=CAU";

   
    $result = pg_query($conn, "SELECT user_email FROM users WHERE user_email = '$email'");

    if(pg_fetch_assoc($result)){
        echo "<script>
                alert('Already Registered');
                </script>";
        return false;
    }

    
    if( $password !== $password2){
        echo "<script>
                alert('Password doesn't match')
                </script>";
        return false;
    }

    
    $password = password_hash($password, PASSWORD_DEFAULT);

    
    $result = pg_query($conn, "INSERT INTO users (username, user_email, password, profile_picture) VALUES('$username', '$email', '$password', '$profile_picture')");

    return pg_affected_rows($result);
}

function ubah($data){
    global $conn;

    session_start();
    if(isset($_SESSION['login_email'])) {
        $userEmail = $_SESSION['login_email'];
        $result1 = pg_query($conn, "SELECT * FROM users WHERE user_email = '$userEmail'");

        if ($result1) {
            $userData = pg_fetch_assoc($result1);
            $hashedPassword = $userData['password']; 
            $newPassword = $data["password"];
            $newPassword2 = $data["password2"];

            if (password_verify($newPassword, $hashedPassword)) {
                echo "Password matched! You can proceed to update.";
                $newPasswordHash = password_hash($newPassword2, PASSWORD_DEFAULT);
                $updateQuery = "UPDATE users SET password = '$newPasswordHash' WHERE user_email = '$userEmail'";
                $result2 = pg_query($conn, $updateQuery);
            } else {
                echo "Current password doesn't match.";
            }

            return pg_affected_rows($result2);
            } else {
            echo "User not found.";
            }
            } else {
            echo "Session variable 'login_email' is not set.";
            }
    }
?>
