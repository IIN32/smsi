<?php
session_start();
require_once('../includes/db_connection.php');
require_once('../functions/functions.php');
?>

<?php

if (isset($_POST['submit'])) {

    $class_name = test_input($_POST['class_name']);
    $class_code = test_input($_POST['class_code']);
    $class_teacher = test_input($_POST['class_teacher']);
    $c_date = test_input($_POST['c_date']);
    $c_time = test_input($_POST['c_time']);

//     $query = "INSERT INTO t_records (t_fname, t_email, t_phone, t_address, t_join, t_bdate, t_qualification, t_experience, t_description)
//  VALUES('$t_fname', '$t_email', '$t_phone', '$t_address', '$t_join', '$t_bdate', '$t_qualification', '$t_experience', '$t_description')";
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>
        Add class
    </title>

    <meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />

    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script> -->

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


        <!--Creating Modal-->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!--Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Add class </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">
                        <form method="POST" action="add_class.php">
                            <div class="form-group">
                                <label>Class Name</label>
                                <input type="text" class="form-control" name="class_name" placeholder="Class Name">
                            </div>
                            <div class="form-group">
                                <label>Class Code</label>
                                <input type="text" class="form-control" name="class_code" placeholder="Class Code">
                            </div>
                            <div class="form-group">
                                <label>Teacher</label>
                                <input type="text" class="form-control" name="class_teacher" placeholder="Class Teacher">
                            </div>

                            <div class="form-group">
                                <label>Date</label>
                                <input type="text" class="form-control" name="c_date" placeholder="Month-Day-Year">
                            </div>

                            <div class="form-group">
                                <label>Time</label>
                                <input type="text" class="form-control" name="c_time" placeholder="2:30pm/am">
                            </div>

                            <button class="btn btn-primary" name="submit">Add</button>

                                        <!-- Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    

    <div class="modal-body">
        <button type="button" class="btn btn-primary float-right popover-test" data-toggle="modal" data-target="#myModal" role="button" style="margin-top: 80px; margin-right: 18px; ">
            + Add Class
        </button>
        
    </div>



    <table class="table table-striped" id="classtable">
        <thead class="alert-info">

            <tr>
                <th scope="col">Class Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody style="background-color:#fff;">
            <?php
            $query = mysqli_query($connection, "SELECT * FROM `class`"); //"SELECT * FROM class";

            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <!-- <td><?php echo $row['id'] ?></td> -->
                    <td><?php echo $row['class_name'] ?></td>
                    <!-- <td><button class="btn btn-warning" data-toggle="modal" title="Click to edit record" type="button" data-target="#myModal<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td> -->
                    <td>
                        <a href="single_view.php?view=<?= $row['id'] ?>" class="btn btn-primary">View</a>
                        <!-- <button class="btn btn-success" data-toggle="modal" type="button" data-target="#myModal<?php echo $row['id']; ?>">Edit</button> -->
                        <!-- <td><button class="btn btn-warning" data-toggle="modal" type="button" data-target="#myModal<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-edit"></span> Edit</button></td> -->
                        <!-- <a href="delete.php?deletedId=<?= $row['id'] ?>" class="btn btn-danger">Delete</a> -->
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

    <!-- </div> -->


    <script src="../bootstrap/datatables.min.js"></script>
    <script src="../bootstrap/js/jquery-3.2.1.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <scrip src="https://code.jquery.com/jquery-3.5.1.js"></script>
    

    <!-- <script src="../bootstrap/js/jquery-3.2.1.min.js"></script> -->
    <!-- <script src="../bootstrap/js/bootstrap.js"></script> -->
    
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

   <script> 
   $(document).ready(function () {
    $('#classtable').DataTable();
});</script>
</body>

</html>