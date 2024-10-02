<?php 
require_once('../includes/db_connection.php')
?>


<?php 
if(isset($_GET['deletedId'])){
    $id= $_GET['deletedId'];
    $query= "DELETE FROM students WHERE id='$id'";
    $result=mysqli_query($connection, $query);
    if($result){
        echo "Deletion succesful";
        header('location: s_view.php');
    }else{
        echo "Failed";
    }
}
?>