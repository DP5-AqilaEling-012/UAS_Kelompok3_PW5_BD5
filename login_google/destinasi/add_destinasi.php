<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <title>Add Destination</title>
</head>
<body>
<div class="container mt-5">
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h4>Add New Destination
                        <a href="destinasi.php" class="btn btn-danger float-end">Cancel</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="insert_destinasi.php" method="POST">
                        <div class="mb-3">
                            <label for="id" class="form-label">Destination ID</label>
                            <input type="text" id="id" name="id" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Destination Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location</label>
                            <input type="text" name="location" class="form-control" id="location">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Destination Category</label>
                            <input type="text" id="category" name="category" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" class="form-control" id="description">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Destination</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
