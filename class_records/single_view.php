<?php
require_once('../includes/db_connection.php')
?>


<!DOCTYPE html>
<html>

<head>
    <title>
        Add class
    </title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../bootstrap/datatables.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/datatables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>



    <div class="container">
        <table class="table table-striped">
            <thead class="alert-info">
                <tr>
                    <th scope="col">Class Name</th>
                    <th scope="col">Class Code</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $id = $_GET['view'];
                $query = "SELECT * FROM `class` WHERE `id` = '$id' ";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($result)) { 
                    ?>
                    <hr style="border-top:2px dotted #ccc;" />
                    <h2 style="color:Green;">Class: <?php echo $row['class_name'] ?></h2>
                    <hr style="border-top:2px dotted #ccc;" />
                    <tr>
                        <td><?php echo $row['class_name'] ?></td>
                        <td><?php echo $row['class_code'] ?></td>
                        <td><?php echo $row['class_teacher'] ?></td>
                        <td><?php echo $row['c_date'] ?></td>
                        <td><?php echo $row['c_time'] ?></td>
                        <td><a class="btn btn-warning" href="update.php?updatedId=<?= $row['id'] ?>">Edit</a>|
                            <a href="delete.php?deletedId=<?= $row['id'] ?>" class="btn btn-danger">Delete</a>
                        </td>

                    </tr>
                <?php
                //include 'update.php';
                    //include '../class_records/update.php';
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>