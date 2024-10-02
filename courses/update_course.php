<?php
require_once('../includes/db_connection.php');
require_once('../functions/functions.php');


if (isset($_GET['updatedId'])) {
    $id = $_GET['updatedId'];
    $query = "SELECT * FROM `courses` WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    $course_name = $row['course_name'];
    $course_description = $row['course_description'];
    $course_id = $row['course_id'];
    $academic_year = $row['academic_year'];
    $fees_year = $row['fees_year'];
    $fees_sem = $row['fees_sem'];
}

$id = $_GET['updatedId'];
if (isset($_POST['update'])) {

    $course_name = test_input($_POST['course_name']);
    $course_description = test_input($_POST['course_description']);
    $course_id = test_input($_POST['course_id']);
    $academic_year = test_input($_POST['academic_year']);
    $fees_year = test_input($_POST['fees_year']);
    $fees_sem = test_input($_POST['fees_sem']);


    $query = "UPDATE `courses` SET `course_name` = '$course_name', `course_description` = '$course_description',
     `course_id` = '$course_id', `academic_year`= '$academic_year', `fees_year` = '$fees_year', `fees_sem` = '$fees_sem' WHERE `id` = '$id' LIMIT 1";


    $result = mysqli_query($connection, $query);
    if ($result) {
        echo '<script>alert("Update successful");
    </script>';
        echo "<a href=\"view_course.php?view=\"";
        echo "></a>";
        echo header('location: view_course.php');
    } else {
        echo '<script>alert("Update Failed");
    window.location="update_course.php";
    </script>';
        echo mysqli_errno($connection);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <form method="POST">
            <h2>Update Course</h2>
            <div class="form-group">
                <label>Course Name</label>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="text" name="course_name" class="form-control" value="<?php echo $row['course_name']; ?>">
            </div>
            <div class="form-group">
                <label>Course Description</label>
                <textarea name="course_description" class="form-control" rows="10" cols="60"><?php echo $row['course_description']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Course Id</label>
                <input type="text" name="course_id" class="form-control" value="<?php echo $row['course_id']; ?>">
            </div>
            <div class="form-group">
                <label>Academic Year</label>
                <input type="text" name="academic_year" class="form-control" value="<?php echo $row['academic_year']; ?>">
            </div>
            <div class="form-group">
                <label>Fees/Year</label>
                <input type="text" name="fees_year" class="form-control" placeholder="Ex: $4400" value="<?php echo $row['fees_year']; ?>">
            </div>

            <div class="form-group">
                <label>Fees/Semester</label>
                <input type="text" name="fees_sem" class="form-control" value="<?php echo $row['fees_sem']; ?>">
            </div>
            <div>
                <input type="submit" name="update" value="Update">
            </div>
        </form>
        <div>
            <button href="view_course.php" class="row justify-content-end" name="courses">Courses</button>
        </div>
    </div>
</body>

</html>