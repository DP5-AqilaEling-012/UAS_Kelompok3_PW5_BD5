<?php 

$conn = pg_connect("host=localhost port=5432 dbname=kelompok3 user=postgres password='aqilaeling2402'"); //ganti password postgre sesuaikan

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

// function hapus
// function ubah

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
                alert('sudah terdaftar');
                </script>";
        return false;
    }

    
    if( $password !== $password2){
        echo "<script>
                alert('tidak sesuai!')
                </script>";
        return false;
    }

    
    $password = password_hash($password, PASSWORD_DEFAULT);

    
    $result = pg_query($conn, "INSERT INTO users (username, user_email, password, profile_picture) VALUES('$username', '$email', '$password', '$profile_picture')");

    return pg_affected_rows($result);
}

?>
