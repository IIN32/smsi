<?php
//session_start();
//header('location:login.php'); 

require_once('../includes/db_connection.php')
?>

<?php 
if(isset($_POST['submit'])){
    $r_fname= $_POST['r_fname'];
    $r_email= $_POST['r_email'];
    $r_password= md5($_POST['r_password']);
    $r_rpassword= md5($_POST['r_rpassword']);

$query= "INSERT INTO register (r_fname, r_email, r_password, r_rpassword)
VALUES('$r_fname','$r_email', '$r_password', '$r_rpassword')";

$result= mysqli_query($connection, $query);

if($result){
    echo "Registration Successful";
}else{
    "Registration Failed!";
}

}

?>
<!---->


<!DOCTYPE html>
<html>
    <head>
        <title>Rgistration</title>
        <link href="admin.css" media="all" rel="stylesheet" type="text/css">
    </head>
    <body>
    <form action="" method="POST">
  <div class="registerC">
    <h1>Create an Account</h1>

    <label for="user0"><b>Full Name</b></label>
    <input type="text" name="r_fname" placeholder="ex: Ahmed Ali" value="" required><br>

    <label for="email"><b>Email</b></label>
    <input type="text" name="r_email" placeholder="ex: myown@mail.com" value="" required><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" name="r_password" placeholder="Enter Password" value="" required><br>

    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" name="r_rpassword" placeholder="Re-Enter Password" value="" required><br>
    <hr>

    <p>By creating an account you agree to our <a href="">Terms & Privacy</a>.</p>
    <button type="submit" name="submit" class="registerbtn">Submit</button>
  </div>

  <div class="registerC create">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form> 
    </body>
</html>