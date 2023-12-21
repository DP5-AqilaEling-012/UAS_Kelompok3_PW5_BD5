<?php
session_start();
require 'dbcon.php';

if(isset($_POST['update'])) {
    $rating_id = $_POST['ratingid'];
    $destination_id = $_POST['destinationid'];
    $destination_name = $_POST['destinationname'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $rating = $_POST['rating'];

    $query = "UPDATE DestinationRating SET 
                DestinationID = '$destination_id',
                DestinationName = '$destination_name',
                Location = '$location',
                Date = '$date',
                Rating = '$rating'
                WHERE RatingID = '$rating_id'";

    $query_run = pg_query($con, $query);

    if($query_run) {
        $_SESSION['success'] = "Rating berhasil diperbarui";
        header('Location: rating.php');
    } else {
        $_SESSION['status'] = "Pembaruan rating gagal";
        header('Location: rating.php');
        echo pg_last_error($con);
    }
}

pg_close($con);
?>
