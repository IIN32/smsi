<?php
require_once('../includes/db_connection.php');
require_once('../functions/functions.php');

if (isset($_GET['updatedId'])) {
    $t_id = $_GET['updatedId'];
    $query = "SELECT * FROM `t_records` WHERE t_id=$t_id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);


    $t_fname = $row['t_fname'];
    $t_email = $row['t_email'];
    $t_phone = $row['t_phone'];
    $t_address = $row['t_address'];
    $t_join = $row['t_join'];
    $t_bdate = $row['t_bdate'];
    $t_qualification = $row['t_qualification'];
    $t_experience = $row['t_experience'];
    $t_description = $row['t_description'];


}

$t_id = $_GET['updatedId'];
if (isset($_POST['submit'])) {

    $t_fname = test_input($_POST['t_fname']);
    $t_email = test_input($_POST['t_email']);
    $t_phone = test_input($_POST['t_phone']);
    $t_address = test_input($_POST['t_address']);
    $t_join = test_input($_POST['t_join']);
    $t_bdate = test_input($_POST['t_bdate']);
    $t_qualification = test_input($_POST['t_qualification']);
    $t_experience = test_input($_POST['t_experience']);
    $t_description = test_input($_POST['t_description']);


    $query = "UPDATE `t_records` SET `t_fname`='$t_fname',`t_email`='$t_email',`t_phone`='$t_phone',`t_address`='$t_address',`t_join`='$t_join',
     `t_bdate`='$t_bdate',`t_qualification`='$t_qualification',`t_experience`='$t_experience',`t_description`='$t_description' WHERE `t_id` = '$t_id' LIMIT 1";


    $result = mysqli_query($connection, $query);
    if ($result) {
        echo '<script>alert("Update successful");
    </script>';
        header('location: view_t_records.php');
        echo "<a href=\"view_t_records.php?view=\"";
        echo "></a>";
        echo header('location: view_t_records.php');
    } else {
        echo '<script>alert("Update Failed");
    window.location="update_course.php";
    </script>';
        echo mysqli_errno($connection);
    }
}
?>



<!DOCTYPE html>
<html>

<head>
    <title>
        Teachers
    </title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

    <style>

    </style>
</head>

<body>

    <div class="container pt-3 border bg-info">
        <h1>Update </h1>
        <form action="" method="POST">


            <div class="container-fluid">

                <div class="form-group">
                <label for="t_fname"><b>Teacher Name:</b></label><br>
                <input type="text" class="form-control" name="t_fname" value="<?php echo $row['t_fname'] ?>" placeholder="Teacher_full_name" required>
                </div>

                
                <div class="form-group">
                <label for="t_email"><b>Email:</b></label><br>
                <input type="text" class="form-control" name="t_email" value="<?php echo $row['t_email'] ?>" placeholder="Enter Email" required><br>
                </div>
       
                <div class="form-group">
                <label for="t_phone"><b>Phone Number:</b></label><br>
                <input type="text"  class="form-control" name="t_phone" value="<?php echo $row['t_phone'] ?>" placeholder="ex:026-235-6841" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
                </div>
                
                <div class="form-group">
                <label for="t_address"><b>Address Of stay:</b></label><br>
                <input type="text" class="form-control" name="t_address" value="<?php echo $row['t_address'] ?>" placeholder="Enter area" required><br>
                </div>
                 
                <div class="form-group">
                <label for="t_join"><b>Joining Date:</b></label><br>
                <input type="date" class="form-control" name="t_join" value="<?php echo $row['t_join'] ?>"  placeholder="School joining date" required><br>
                </div>
                
                <div class="form-group">
                <label for="t_bdate"><b>Date_of_birth:</b></label><br>
                <input type="date" class="form-control" name="t_bdate" value="<?php echo $row['t_bdate'] ?>" placeholder="Date_of_birth" required><br>
                </div>

                <div class="form-group">
                <label for="t_qualification"><b>Qualifications:</b></label><br>
                <input type="text" class="form-control" name="t_qualification" value="<?php echo $row['t_qualification'] ?>" placeholder="Academic qualification" required><br>
                </div>
                 
                <div class="form-group">
                <label for="t_experience"><b>Working Experience:</b></label><br>
                <input type="text" class="form-control" name="t_experience" value="<?php echo $row['t_experience'] ?>" placeholder="In years/Months" required><br>
                </div>
                
                <div class="form-group">
                <label for="t_description"><b>Description:</b></label><br>
                <textarea name="t_description" rows="5" cols="60" value="<?php echo $row['t_description'] ?>"><?php echo $row['t_description'] ?></textarea>
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
            </div>
            
    </div>


    </form>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>