<?php
require_once('../includes/db_connection.php');
require_once('../functions/functions.php');
?>


<?php



if (isset($_POST['submit'])) {
    $course_name = test_input($_POST['course_name']);
    $course_description = test_input($_POST['course_description']);
    $course_id = test_input($_POST['course_id']);
    $academic_year = test_input($_POST['academic_year']);
    $fees_year = test_input($_POST['fees_year']);
    $fees_sem = test_input($_POST['fees_sem']);

    // function test_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    //   }

    $query = "INSERT INTO `courses` (`course_name`, `course_description`, `course_id`, `academic_year`, `fees_year`, `fees_sem`)
    VALUES('$course_name', '$course_description', '$course_id', '$academic_year', '$fees_year', '$fees_sem')";

    $result = mysqli_query($connection, $query);
    if ($result) {
        echo '<script>alert("Course added");
    </script>';
        echo "<a href=\"view_course.php?view=\"";
        echo "></a>";
        echo header('location: view_course.php');
    } else {
        echo mysqli_errno($connection);
        echo '<script>alert("Failed to add");
    window.location="add_course.php";
    </script>';
        echo mysqli_errno($connection);
    }
}

// $fees= trim(2000) ;
// $fees_year= "$".$fees;
// $fees_sem= "$".($fees)/2;

// echo $fees_sem;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">

        <form method="POST">
            <h2>ADD COURSE</h2>
            <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="course_name" class="form-control">
            </div>
            <div class="form-group">
                <label>Course Description</label>
                <textarea name="course_description" class="form-control" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label>Course Id</label>
                <input type="text" name="course_id" class="form-control">
            </div>

            <!-- Trying to save selected option into academic_year in db table -->

            <div class="form-group">
                <label>Academic Year</label>
                <select name="academic_year">
                    <option value="2021-2022">2021-2022</option>
                    <option value="2022-2023">2022-2023</option>
                </select>
            </div>

            <div class="form-group">
                <label>Fees/Year</label>
                <input type="text" name="fees_year" class="form-control" value="<?php echo dollS(); ?>">
            </div>

            <div class="input-group">
                <label>Fees/Semester</label>
               
                
                <input type="text" name="fees_sem" class="form-control" value="<?php echo dollS(); ?>" >
                
            </div>

            <div>
                <input type="submit" name="submit" value="Submit"  >
            </div>
        </form>
    </div>
</body>

</html>