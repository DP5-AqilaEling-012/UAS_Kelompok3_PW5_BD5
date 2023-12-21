<?php
require 'dbcon.php';
?>
        <!doctype html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css"> 
            
            <title>Member View</title>
        </head>
        <body>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Member View
                                    <a href="index.php" class="btn btn-danger float-end">Add Member</a>
                                </h4>
                            </div>
                            <div class="card-body">
                            
                            <div class="table-responsive">
                            <?php 
                                if(isset($_GET['id'])){
                                    $member_id = pg_escape_string($con, $_GET['id']);
                                    $query="SELECT * FROM data_anggota WHERE id='$member_id'";
                                    $query_run = pg_query($con, $query);

                                    if(pg_num_rows($query_run) > 0){
                                        $member = pg_fetch_array($query_run);
                                        ?>

                                <div class="mb-3">
                                    <label>Member Name</label>
                                    <p class="form-control">
                                        <?=$member['name'];?>
                                    </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>ID</label>
                                        <p class="form-control">
                                        <?=$member['id'];?>
                                    </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Name</label>
                                        <p class="form-control">
                                        <?=$member['name'];?>
                                    </p>
                                    </div> 
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                        <?=$member['email'];?>
                                    </p>
                                    </div>
                                <?php
                                    }
                                    else{
                                        echo"<h4>No Such Id Founs</h4>";
                                    }
                                }
                            ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
?>
