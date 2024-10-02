<?php
//session_start();
require_once('../includes/db_connection.php');
require_once('../functions/functions.php');
?>

<?php
if (isset($_POST['submit'])) {

    // $dates = $_POST['date'];
    // $id = $_POST['id'];
    $student_name = test_input($_POST['student_name']);
    $statuses = test_input($_POST['statuses']);
    $f_note = test_input($_POST['f_note']);
    $faculty = test_input($_POST['faculty']);

    $query ="INSERT INTO `attendance`(`student_name`, `statuses`, `f_note`, `faculty`) VALUES ('$student_name', '$statuses', '$f_note', '$faculty')";
    
//     "INSERT INTO attendance (student_name, statuses, f_note, faculty)
//  VALUES('$student_name', '$statuses', '$f_note', '$faculty')";

$result= mysqli_query($connection, $query);

if($result){
    echo "Insertion successful";
    header('Location: view.php');
}else{
    echo  "Insertion failed";
}

}

?>


<!DOCTYPE html>
<html>

<head>
    <title>
        Add class
    </title>

    <meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1"/> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />

    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../bootstrap/datatables.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/datatables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<div class="container bg-info">

<form method="POST">
<div class="col-md-4 well">
    <h2>Class:</h2>

  <div class="form-group">
    <label>Student Name</label>
    <input type="text" class="form-control" name="student_name" placeholder="Full Name">
  </div>
  <div class="form-group">
    <label >Status</label>
    <select class="form-control" name="statuses" >
      <option value="Unknown">Unknown</option>
      <option value="Skipped">Skipped</option>
      <option value="Attended">Attended</option>
    </select>
  </div>

  <div class="form-group">
    <label>Faculty Note</label>
    <textarea class="form-control" name="f_note" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label >Faculty</label>
    <input type="text" class="form-control" name="faculty" placeholder="Faculty Name">
  </div>
  <hr>
  <input type="submit" name="submit" value="Submit" class="form-control  mb-2 mr-sm-2">
  <!-- <button class="btn bg-success" name="submit">Save</button> -->
</div>
</form>





</div>
</body>
</html>