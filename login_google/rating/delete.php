<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete'])) {
    $rating_id = $_POST['id'];

    $query = "DELETE FROM DestinationRating WHERE RatingID = '$rating_id'";
    $query_run = pg_query($con, $query);

    if($query_run) {
        $_SESSION['success'] = "Rating berhasil dihapus";
        header('Location: rating.php');
    } else {
        $_SESSION['status'] = "Hapus rating gagal";
        header('Location: rating.php');
    }
}

pg_close($con);
?>
