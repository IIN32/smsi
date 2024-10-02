<?php 
require_once('../includes/db_connection.php')
?>


<?php 
if(isset($_GET['deletedId'])){
    $t_id= $_GET['deletedId'];
    $query= "DELETE FROM t_records WHERE t_id='$t_id'";
    $result=mysqli_query($connection, $query);
    if($result){
        echo "Deletion successful";
        header('location: view_t_records.php');
    }else{
        echo "Failed";
    }
}
?>