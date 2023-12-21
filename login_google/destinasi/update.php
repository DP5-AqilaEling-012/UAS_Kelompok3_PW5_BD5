<?php
session_start();
require 'dbcon.php';

if (isset($_GET['id'])) {
    $destinasi_id = pg_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM Destinasi WHERE id='$destinasi_id'";
    
    $query_run = pg_query($con, $query);

    if (pg_num_rows($query_run) > 0) {
        $destination = pg_fetch_assoc($query_run);
        $destination_name = $destination['name'];
        $location = $destination['location'];
        $destinasi_category = $destination['category'];
        $description = $destination['description'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Destination Edit</title>
</head>
<body>
    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Destination Detail
                            <a href="destinasi.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label for="id" class="form-label">Destination ID</label>
                                <input type="text" name="id" value="<?php echo $destinasi_id; ?>" class="form-control" id="id" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Destination Name</label>
                                <input type="text" name="name" value="<?php echo $destination_name; ?>" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" value="<?php echo $location; ?>" class="form-control" id="location">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" name="category" value="<?php echo $destinasi_category; ?>" class="form-control" id="category">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" value="<?php echo $description; ?>" class="form-control" id="description">
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Update Destination</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php
    } else {
        echo "<h4>No Such ID Found</h4>";
    }
} else {
    echo "<h4>ID Not Provided</h4>";
}
pg_close($con);
?>
