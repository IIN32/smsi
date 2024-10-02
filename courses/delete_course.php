<?php 
require_once('../includes/db_connection.php');

if(isset($_GET['deletedId'])){
    $id= $_GET['deletedId'];
    $query= "DELETE FROM `courses` WHERE id='$id'";
    $result=mysqli_query($connection, $query);
    if($result){
        echo "Course Deleted";
        header('location: view_course.php');
    }else{
        echo "Failed";
    }
}
?>