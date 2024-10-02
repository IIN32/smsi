<?php
//session_start();
require_once('../includes/db_connection.php')
?>

<?php 
$r_email="";
$r_password="";


if($_SERVER["REQUEST_METHOD"] == $_POST){
    $r_email= $_POST['r_email'];
    $r_password= md5($_POST['r_password']);

$query="SELECT * FROM register WHERE r_mail = '$r_email' && r_password = '$r_password' ";

$result= mysqli_query($connection, $query)or die(mysqli_connect_error());
$row= mysqli_fetch_array($result);
$num_row= mysqli_num_rows($result);

$pass=$row['password'];
$status =$row['status'];

if($num_row > 0){

  session_start();
  $_SESSION['id']=$row['user_id'];
  
  
  if($status=='administrator'){
    echo 'true_admin';	
    mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")")or die(mysqli_connect_error());
  }else
  if($status=='normal'){
    echo 'true_user';	
    mysqli_query($conn,"insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")")or die(mysqli_connect_error());
  }
  else{ 
      echo 'false';
  }
}
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>
            Admin Login
        </title>

        <link href="admin.css" media="all" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h1>SOFTCLIQ University</h1>
    <form action="" method="POST">
      <div class="img0">
        <img src="images/avatar.png" alt="Avatar" class="avatar">
      </div>

      <div class="username0">
        <label for="uname"><b>E-mail</b></label>
        <input type="text" placeholder="ex: myown@mail.com" name="r_email" required><br>
        <br>
        <br>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="r_password" required><br>
        <br>
        <label>
          <span><a href="#">Forgot Password?</a></span><br>
        </label>

        <p><a href="register.php">Create an account</a>.</p>

        <button type="submit" name="submit">Login</button><br>
      </div>

    </form> 
    </body>
</html>