<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Rating Edit</title>
</head>
<body>
    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Rating Detail
                            <a href="rating.php" class="btn btn-danger float-end">Add Rating</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        if (isset($_GET['id'])) {
                            $rating_id = pg_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM DestinationRating WHERE ratingid='$rating_id'";
                            
                            $query_run = pg_query($con, $query);
                        
                            if(pg_num_rows($query_run) > 0){
                                $rating = pg_fetch_assoc($query_run);
                        ?>
                        <form action="code.php" method="POST">
                            <input type="hidden" name="ratingid" value="<?php echo $rating['ratingid']; ?>">
                            <div class="mb-3">
                                <label for="destinationid" class="form-label">Destination ID</label>
                                <input type="text" name="destinationid" value="<?php echo $rating['destinationid']; ?>" class="form-control" id="destinationid">
                            </div>
                            <div class="mb-3">
                                <label for="destinationname" class="form-label">Destination Name</label>
                                <input type="text" name="destinationname" value="<?php echo $rating['destinationname']; ?>" class="form-control" id="destinationname">
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" value="<?php echo $rating['location']; ?>" class="form-control" id="location">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" name="date" value="<?php echo $rating['date']; ?>" class="form-control" id="date">
                            </div>
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <input type="text" name="rating" value="<?php echo $rating['rating']; ?>" class="form-control" id="rating">
                            </div>
                            <button type="submit" name="update" class="btn btn-primary">Update Rating</button>
                        </form>
                        <?php
                            } else {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
