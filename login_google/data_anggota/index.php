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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="...">
    <link rel="stylesheet" href="style.css">

    <title>Healing's Journey</title>
</head>
<body>
    
    <div class="container mt-4">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Member Detail
                            <a href="data_anggota.php" class="btn btn-primary float-end">Add Member</a>
                        </h4>
                    </div>
                </div>
                <div class="card-body">

                <div class="table-responsive">
                <table class="table table-bordered table-striped table-custom">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = "SELECT * FROM data_anggota";
                                $query_run = pg_query($con, $query); 
                                
                                if($query_run && pg_num_rows($query_run) > 0){
                                    while($member = pg_fetch_assoc($query_run)) {
                                        ?>
                                        <tr>
                                            <td><?= $member['id']; ?></td>
                                            <td><?= $member['name']; ?></td>
                                            <td><?= $member['email']; ?></td>
                                            <td>
                                            <a href="data_anggota_view.php?id=<?= $member['id']; ?>" class="btn btn-info btn-sm"><i class="far fa-eye"></i> </a>
                                                <a href="data_anggota_edit.php?id=<?= $member['id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-pen"></i> </a>
                                                <form action="code.php" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this member??')">
                                                    <button type="submit" name="delete" value="<?= $member['id']; ?>" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i> 
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }   
                                else {
                                    echo "<h5>No Record Found</h5>";
                                }  
                            ?>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
