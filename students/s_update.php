<?php
require_once('../includes/db_connection.php');
require_once('../functions/functions.php');

if (isset($_GET['updatedId'])) {
    $id = $_GET['updatedId'];
    $query = "SELECT * FROM `students` WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);


    $s_fname = $row['s_fname'];
    $s_bdate = $row['s_bdate'];
    $s_country = $row['s_country'];
    $s_phone = $row['s_phone'];
    $s_email = $row['s_email'];
    $s_education = $row['s_education'];
    $s_programme = $row['s_programme'];
    $s_course = $row['s_course'];
    $s_type = $row['s_type'];
    $s_occupation = $row['s_occupation'];
}

$id = $_GET['updatedId'];
if (isset($_POST['submit'])) {

    $s_fname = test_input($_POST['s_fname']);
    $s_bdate = test_input($_POST['s_bdate']);
    $s_country = test_input($_POST['s_country']);
    $s_phone = test_input($_POST['s_phone']);
    $s_email = test_input($_POST['s_email']);
    $s_education = test_input($_POST['s_education']);
    $s_programme = test_input($_POST['s_programme']);
    $s_course = test_input($_POST['s_course']);
    $s_type = test_input($_POST['s_type']);
    $s_occupation = test_input($_POST['s_occupation']);

    $query = "UPDATE `students` SET `s_fname` = '$s_fname', `s_bdate` = '$s_bdate', `s_country` = '$s_country', `s_phone` = '$s_phone',
     `s_email` = '$s_email', `s_education` = '$s_education', `s_programme` = '$s_programme', `s_course` = '$s_course', `s_type` = '$s_type', `s_occupation` = '$s_occupation' WHERE `id` = '$id' LIMIT 1";


    $result = mysqli_query($connection, $query);
    if ($result) {
        echo '<script>alert("Update successful");
    </script>';
        echo "<a href=\"s_view.php?view=\"";
        echo "></a>";
        echo header('location: s_view.php');
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
    <title>
        Students form
    </title>
    <link href="../admin/admin.css" media="all" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="container">
        <h1>University</h1>
        <form action="" method="POST">
            <div class="img0">
                <img src="../admin/images/avatar.png" alt="Avatar" class="avatar">
            </div>
            <p>Please fill this form for</p>
            <hr>

            <div class="username0">

                <label for="s_fname"><b>Full_name:</b></label>
                <input type="text" name="s_fname" placeholder="Student_full_name" value="<?php echo $row['s_fname']; ?>" required><br>
                <br>

                <label for="s_bdate"><b>Date_of_birth:</b></label>
                <input type="date" name="s_bdate" placeholder="Date_of_birth"  value="<?php echo $row['s_bdate'];?>" required><br>
                <br>

                <label for="s_country"><b>Country:</b></label>
                <input type="text" name="s_country" placeholder="Country" value="<?php echo $row['s_country']; ?>" required><br>
                <br>

                <label for="s_phone"><b>Phone Number:</b></label>
                <input type="text" name="s_phone" placeholder="ex:026-235-6841" value="<?php echo $row['s_phone']; ?>" pattern="+[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
                <br>
                <label for="s_email"><b>Email:</b></label>
                <input type="text" name="s_email" placeholder="Enter Email" value="<?php echo $row['s_email']; ?>" required><br>
                <br>

                <label for="s_education"><b>Educational Qualifications:</b></label>
                <select name="s_education" value="<?php echo $row['s_education']; ?>">
                    <option value="Senior Secondary School Graduate" <?php echo ($s_education == 'Senior Secondary School Graduate') ? 'selected' : '' ?>>Senior Secondary School Graduate</option>
                    <option value="Junior Secondary Graduate" <?php echo ($s_education == 'Junior Secondary Graduate') ? 'selected' : '' ?>>Junior Secondary Graduate</option>
                    <option value="University Graduate" <?php echo ($s_education == 'University Graduate') ? 'selected' : '' ?>>University Graduate</option>
                    <option value="Others">Others</option>
                </select><br>
                <br>

                <label for="s_programme"><b>Student Programmes:</b></label>
                <select name="s_programme" value="<?php echo $row['s_programme']; ?>">
                    <option value="Graduate Degree Programmes" <?php echo ($s_programme == 'Graduate Degree Programmes') ? 'selected' : '' ?>>Graduate Degree Programmes</option>
                    <option value="Undergraduate Degree Programmes" <?php echo ($s_programme == 'Undergraduate Degree Programmes') ? 'selected' : '' ?>>Undergraduate Degree Programmes</option>
                </select><br>
                <br>

                <label for="s_course"><b>Student Course:</b></label>
                <select name="s_course">
                <option value="" selected disabled>Select Course</option>

                    <?php
                    $query = "SELECT * FROM courses";
                    $result = mysqli_query($connection, $query);


                    while ($sdata = mysqli_fetch_assoc($result)) { ?>

                        <option value="<?php echo $sdata['course_name'] ?>" <?php if ($row['s_course'] == $sdata['course_name']) echo 'selected'; ?>>
                            <?php echo $sdata['course_name'] ?>
                        </option>
                    <?php } ?>

                </select><br>
                <br>

                <label for="s_type"><b>Student Type:</b></label>
                <select name="s_type">
                    <option value="Regular" <?php echo ($s_type=='Regular')?'selected':'' ?>>Regular</option>
                    <option value="Mature" <?php echo ($s_type=='Mature')?'selected':'' ?>>Mature</option>
                    <option value="Week-End" <?php echo ($s_type=='Week-End')?'selected':'' ?>>Week-End</option>
                    <option value="Evening" <?php echo ($s_type=='Evening')?'selected':'' ?>>Evening</option>
                </select><br>
                <br>

                <label for="s_occupation"><b>Occupation:</b></label>
                <input type="text" name="s_occupation" placeholder="Ex: Manager/Officer/..." value="<?php echo $row['s_occupation']; ?>">
                <br>
                <br>


            </div>
            <div>
            <button type="submit" name="submit">Update</button>
            </div>


    </form>
    </div>
</body>

</html>