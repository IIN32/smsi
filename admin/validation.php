<?php
//session_start();
require_once('../includes/db_connection.php')
?>

<?php 
$r_email="";
$r_password="";


if($_SERVER["REQUEST_METHOD"] == $_POST){
    //$r_fname= $_POST['r_fname'];
    $r_email= $_POST['r_email'];
    $r_password= md5($_POST['r_password']);
    //$r_rpassword= md5($_POST['r_rpassword']);

$query="SELECT * FROM register WHERE r_mail = '$r_email' && r_password = '$r_password' ";

// $query= "INSERT INTO register (r_fname, r_email, r_password, r_rpassword)
// VALUES('$r_fname','$r_email', '$r_password', '$r_rpassword')";

$result= mysqli_query($connection, $query);

if($result){
//header('location:admin.php');
    echo "Registration Successful";
}else{
    echo "Registration failed!";
//header('location:login.php');
}

}

?>