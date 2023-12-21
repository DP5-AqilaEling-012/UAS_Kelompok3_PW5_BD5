<?php
session_start();
require 'dbcon.php';

if(isset($_POST['update'])) {
    $destinasi_id = $_POST['id'];
    $destination_name = $_POST['name'];
    $location = $_POST['location'];
    $destination_category = $_POST['category'];
    $description = $_POST['description'];

    $query = "UPDATE Destinasi SET 
                name = '$destination_name',
                location = '$location',
                category = '$destination_category',
                description= '$description'
                WHERE id = '$destinasi_id'";

    $query_run = pg_query($con, $query);

    if($query_run) {
        $_SESSION['success'] = "Destination updated successfully";
        header('Location: destinasi.php');
    } else {
        $_SESSION['status'] = "Destination update failed";
        header('Location: destinasi.php');
        echo pg_last_error($con);
    }
}

pg_close($con);
?>
