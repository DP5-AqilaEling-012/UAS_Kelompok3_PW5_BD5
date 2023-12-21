<?php
session_start();
require 'dbcon.php';

$input_values = array(
    'id' => $_POST['id'] ?? '',
    'name' => $_POST['name'] ?? '',
    'location' => $_POST['location'] ?? '',
    'category' => $_POST['category'] ?? '',
    'description' => $_POST['description'] ?? ''
);

$query_check = "SELECT COUNT(*) AS total FROM Destinasi WHERE id = $1";
$query_check_run = pg_prepare($con, "", $query_check);
$result_check = pg_execute($con, "", array($input_values['id']));
$row_check = pg_fetch_assoc($result_check);

if ($row_check['total'] > 0) {
    $_SESSION['status'] = "ID Destination already exists. Please use a different ID.";
    header('Location: add_destinasi.php');
    exit();
}

$query = "INSERT INTO Destinasi (id,  name, location, category, description) 
            VALUES ($1, $2, $3, $4, $5)";
$query_run = pg_prepare($con, "", $query);

if ($query_run) {
    $result = pg_execute($con, "", array(
        $input_values['id'],
        $input_values['name'],
        $input_values['location'],
        $input_values['category'],
        $input_values['description']
    ));

    if ($result) {
        $_SESSION['success'] = "Destination added successfully.";
        header('Location: add_destinasi.php');
        exit();
    } else {
        $_SESSION['status'] = "Failed to add Destination.";
        header('Location: add_destinasi.php');
        exit();
    }
} else {
    $_SESSION['status'] = "Failed to prepare query.";
    header('Location: add_destinasi.php');
    exit();
}

pg_close($con);
?>
