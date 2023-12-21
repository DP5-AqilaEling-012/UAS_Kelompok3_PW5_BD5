<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete'])){
    $member_id = pg_escape_string($con, $_POST['delete']);

    $query = "DELETE FROM data_anggota WHERE id='$member_id' ";
    $query_run = pg_query($con, $query);

    if($query_run){
        $_SESSION['message'] = "Member Deleted Successfully";
    } else {
        $_SESSION['message'] = "Member Not Deleted";
    }
    header("Location: index.php");
    exit(0);
}

if (isset($_POST['update'])) {

    $member_id = pg_escape_string($con, $_POST['member_id']);
    $name = pg_escape_string($con, $_POST['name']);
    $email = pg_escape_string($con, $_POST['email']);

    $query = "UPDATE data_anggota SET name='$name', email='$email'
    WHERE id='$member_id'";

    $query_run = pg_query($con, $query);
    

    if($query_run){
        $_SESSION['message'] = "Member Updates Successfully";
        header("Location: index.php");
        exit(0);
    }
    else{
        $_SESSION['message'] = "Member Not Updates Successfully";
        header("Location: index.php");
        exit(0);
    }
}

if (isset($_POST['save'])) {
    $id = pg_escape_string($con, $_POST['id']);
    $name = pg_escape_string($con, $_POST['name']);
    $email = pg_escape_string($con, $_POST['email']);

    $query = "INSERT INTO data_anggota (id, name, email) 
    VALUES ('$id', '$name', '$email')";

    $query_run = pg_query($con, $query);
    if($query_run){
        $_SESSION['message'] = "Member Add Successfully";
        header("Location: data_anggota.php");
        exit(0);
    }
    else {
        $_SESSION['message'] = "Member Not Added";
        header("Location: data_anggota.php");
        exit(0);
    }
} 
?>
