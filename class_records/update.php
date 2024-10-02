<?php
session_start();
require_once('../includes/db_connection.php');
require_once('../functions/functions.php');

if (isset($_GET['updatedId'])) {
    //$id = $_GET['id'];

    $id = $_GET['updatedId'];
    $query = "SELECT * FROM `class` WHERE `id`='$id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    $class_name = $row['class_name'];
    $class_code = $row['class_code'];
    $class_teacher = $row['class_teacher'];
    $c_date = $row['c_date'];
    $c_time = $row['c_time'];
}


?>




<?php
//session_start();

require_once('../includes/db_connection.php');
if (isset($_POST['update'])) {

    $id = $_POST['id'];
    $class_name = test_input($_POST['class_name']);
    $class_code = test_input($_POST['class_code']);
    $class_teacher = test_input($_POST['class_teacher']);
    $c_date = test_input($_POST['c_date']);
    $c_time = test_input($_POST['c_time']);

    $query = "UPDATE `class` SET `class_name` = '$class_name', `class_code` = '$class_code', `class_teacher` = '$class_teacher', `c_date` = '$c_date', `c_time` = '$c_time' WHERE `id`= '$id' LIMIT 1";


    $result = mysqli_query($connection, $query);
    if ($result) {
        // echo '<script>alert("Update successful");
        //       </script>';
              header('location:class.php');
              echo '<script>alert("Update successful");
              </script>';
        echo "<a href=\"class.php?view=\"";
        //echo $row['id'];
        echo "></a>";
    } else {
        echo '<script>alert("Update Failed");
    window.location="class.php";
    </script>';
        echo mysqli_errno($connection);
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>
        Add class
    </title>

    <meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1" />
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
        <form method="POST" action="">

            <!-- <div class="col-md-3"> -->
            <div class="col-md-8 well">

                <div class="modal-header">
                    <h4 class="modal-title">Edit</h4>
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                </div>




                <div class="form-group">
                    <label>Class Name</label>
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <input type="text" class="form-control" value="<?php echo $row['class_name']; ?>" name="class_name">
                </div>
                <div class="form-group">
                    <label>Class Code</label>
                    <input type="text" class="form-control" value="<?php echo $row['class_code']; ?>" name="class_code">
                </div>
                <div class="form-group">
                    <label>Teacher</label>
                    <input type="text" class="form-control" value="<?php echo $row['class_teacher']; ?>" name="class_teacher">
                </div>

                <div class="form-group">
                    <label>Date</label>
                    <input type="text" class="form-control" value="<?php echo $row['c_date']; ?>" name="c_date">
                </div>

                <div class="form-group">
                    <label>Time</label>
                    <input type="text" class="form-control" value="<?php echo $row['c_time']; ?>" name="c_time">
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" name="update">Update</button>
                    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                </div>


            </div>
            <!-- </div> -->
        </form>
    </div>
</body>

</html>