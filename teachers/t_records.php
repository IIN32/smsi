<?php
session_start();
require_once('../includes/db_connection.php');
require_once('../functions/functions.php');
?>

<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

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


    // function test_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    //   }


    $query = "INSERT INTO t_records (t_fname, t_email, t_phone, t_address, t_join, t_bdate, t_qualification, t_experience, t_description)
    VALUES('$t_fname', '$t_email', '$t_phone', '$t_address', '$t_join', '$t_bdate', '$t_qualification', '$t_experience', '$t_description')";

    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Entry Successful";
        header('location: view_t_records.php');
        
    } else {
        "Entry Failed!";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Teachers form
    </title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

    <style>

    </style>
</head>

<body>

    <div class="container pt-3 border bg-info">
        <h1>Teachers </h1>
        <form action="" method="POST">

            <p>Please fill information</p>


            <div class="container-fluid">

                <div class="form-group">
                <label for="t_fname"><b>Teacher Name:</b></label><br>
                <input type="text" class="form-control" name="t_fname" placeholder="Teacher_full_name" required>
                </div>
                
                <div class="form-group">
                <label for="t_email"><b>Email:</b></label><br>
                <input type="text" class="form-control" name="t_email" placeholder="Enter Email" required><br>
                </div>
       
                <div class="form-group">
                <label for="t_phone"><b>Phone Number:</b></label><br>
                <input type="text"  class="form-control" name="t_phone" placeholder="ex:026-235-6841" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
                </div>
                
                <div class="form-group">
                <label for="t_address"><b>Address Of stay:</b></label><br>
                <input type="text" class="form-control" name="t_address" placeholder="Enter area" required><br>
                </div>
                 
                <div class="form-group">
                <label for="t_join"><b>Joining Date:</b></label><br>
                <input type="date" class="form-control" name="t_join" placeholder="School joining date" required><br>
                </div>
                
                <div class="form-group">
                <label for="t_bdate"><b>Date_of_birth:</b></label><br>
                <input type="date" class="form-control" name="t_bdate" placeholder="Date_of_birth" required><br>
                </div>

                <div class="form-group">
                <label for="t_qualification"><b>Qualifications:</b></label><br>
                <input type="text" class="form-control" name="t_qualification" placeholder="Academic qualification" required><br>
                </div>
                 
                <div class="form-group">
                <label for="t_experience"><b>Working Experience:</b></label><br>
                <input type="text" class="form-control" name="t_experience" placeholder="In years/Months" required><br>
                </div>
                
                <div class="form-group">
                <label for="t_description"><b>Description:</b></label><br>
                <textarea name="t_description" rows="5" cols="60"></textarea>
                </div>
                <center><button type="submit" name="submit" class="btn btn-primary">Submit</button></center>
            </div>
            
    </div>

    </form>

    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>