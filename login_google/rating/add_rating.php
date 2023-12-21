<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Add Rating</title>
</head>
<body>
<div class="container mt-5">
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Rating
                        <a href="rating.php" class="btn btn-danger float-end">Cancel</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="insert_rating.php" method="POST">
                        <div class="mb-3">
                            <label for="rating_id" class="form-label">Rating ID</label>
                            <input type="text" id="rating_id" name="rating_id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="destination_id" class="form-label">Destination ID</label>
                            <input type="text" id="destination_id" name="destination_id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="destination_name" class="form-label">Destination Name</label>
                            <input type="text" id="destination_name" name="destination_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" id="location">
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" id="date">
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <input type="text" name="rating" class="form-control" id="rating">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Rating</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
