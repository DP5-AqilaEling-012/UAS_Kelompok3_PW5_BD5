<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete'])) {
    $destinasi_id = $_POST['id'];

    $query = "DELETE FROM Destinasi WHERE id = '$destinasi_id'";
    $query_run = pg_query($con, $query);

    if($query_run) {
        $_SESSION['success'] = "Destination successfully deleted";
        header('Location: destinasi.php');
    } else {
        $_SESSION['status'] = "Failed to delete destination";
        header('Location: destinasi.php');
    }
}

pg_close($con);
?>
