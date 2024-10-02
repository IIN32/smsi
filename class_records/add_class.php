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



    $query = "INSERT INTO class (class_name, class_code, class_teacher, c_date, c_time)
    VALUES('$class_name', '$class_code', '$class_teacher', '$c_date', '$c_time')";

    $res = mysqli_query($connection, $query);

    if ($res) {
        echo'<script>alert("Insertion successful");
        window.location="class.php";
        </script>';
      
    } else {
        echo'<script>alert("Insertion failed");
        window.location="class.php";
        </script>';
    }

    // function test_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    //   }
}
?>