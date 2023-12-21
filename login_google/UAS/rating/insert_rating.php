<?php
session_start();
require 'dbcon.php';

$input_values = array(
    'rating_id' => $_POST['rating_id'] ?? '',
    'destination_id' => $_POST['destination_id'] ?? '',
    'destination_name' => $_POST['destination_name'] ?? '',
    'location' => $_POST['location'] ?? '',
    'date' => $_POST['date'] ?? '',
    'rating' => $_POST['rating'] ?? ''
);

$query_check = "SELECT COUNT(*) AS total FROM DestinationRating WHERE RatingID = $1";
$query_check_run = pg_prepare($con, "", $query_check);
$result_check = pg_execute($con, "", array($input_values['rating_id']));
$row_check = pg_fetch_assoc($result_check);

if ($row_check['total'] > 0) {
    $_SESSION['status'] = "ID Rating already exists. Please use a different ID.";
    header('Location: add_rating.php');
    exit();
}

$query = "INSERT INTO DestinationRating (RatingID, DestinationID, DestinationName, Location, Date, Rating) 
            VALUES ($1, $2, $3, $4, $5, $6)";
$query_run = pg_prepare($con, "", $query);

if ($query_run) {
    $result = pg_execute($con, "", array(
        $input_values['rating_id'],
        $input_values['destination_id'],
        $input_values['destination_name'],
        $input_values['location'],
        $input_values['date'],
        $input_values['rating']
    ));

    if ($result) {
        $_SESSION['success'] = "Rating added successfully.";
        header('Location: add_rating.php');
        exit();
    } else {
        $_SESSION['status'] = "Failed to add rating.";
        header('Location: add_rating.php');
        exit();
    }
} else {
    $_SESSION['status'] = "Failed to prepare query.";
    header('Location: add_rating.php');
    exit();
}

pg_close($con);
?>
