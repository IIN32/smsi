<?php 
require_once('../includes/db_connection.php');

if(isset($_GET['deletedId'])){
    $id= $_GET['deletedId'];
    $query= "DELETE FROM class WHERE id='$id'";
    $result=mysqli_query($connection, $query);

if($result){
    echo'<script>alert("Deletion successful");
    window.location="class.php";
    </script>';
}else{
    echo'<script>alert("Deletion Failed");
    window.location="class.php";
    </script>';
    echo mysqli_errno($connection);
}

}
?>