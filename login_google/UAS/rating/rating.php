<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="script.js"></script>

    <title>Destination Rating</title>
</head>
<body>
    <div class="container w-75 pt-5">
    <?php include('message.php'); ?>
    <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Rating Detail
                        <a href="add_rating.php" class="btn btn-primary float-end">Add Rating</a>
                        </h4>
                    </div>
                </div>

        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Rating ID</th>
                    <th>Destination ID</th>
                    <th>Destination Name</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Rating</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('dbcon.php');

                $query = "SELECT * FROM DestinationRating";
                $query_run = pg_query($con, $query);

                if ($query_run && pg_num_rows($query_run) > 0) {
                    while ($row = pg_fetch_assoc($query_run)) {
                        echo "<tr>
                            <td>".htmlspecialchars($row["ratingid"])."</td>
                            <td>".htmlspecialchars($row["destinationid"])."</td>
                            <td>".htmlspecialchars($row["destinationname"])."</td>
                            <td>".htmlspecialchars($row["location"])."</td>
                            <td>".htmlspecialchars($row["date"])."</td>
                            <td>".htmlspecialchars($row["rating"])."</td>
                            <td>
                            <a href='update.php?id=".htmlspecialchars($row['ratingid'])."' class='btn btn-success btn-sm'><i class='fas fa-pen'></i></a>
                                <form action='delete.php' method='POST' class='d-inline' onsubmit='return confirm(\"Are you sure you want to delete this entry?\")'>
                                    <input type='hidden' name='id' value='".htmlspecialchars($row['ratingid'])."'>
                                    <button type='submit' name='delete' class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>
                                </form>
                            </td>
                            </tr>";
                    }
                } else {
                    echo "<h5>No Record Found</h5>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
