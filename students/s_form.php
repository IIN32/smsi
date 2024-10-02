<?php
session_start();
require_once('../includes/db_connection.php');
require_once('../functions/functions.php');
?>


<?php

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

    // function test_input($data) {
    //     $data = trim($data);
    //     $data = stripslashes($data);
    //     $data = htmlspecialchars($data);
    //     return $data;
    //   }

    $query= "INSERT INTO `students`(`s_fname`, `s_bdate`, `s_country`, `s_phone`, `s_email`, `s_education`, `s_programme`, `s_course`, `s_type`, `s_occupation`)
    VALUES ('$s_fname','$s_bdate','$s_country','$s_phone','$s_email','$s_education','$s_programme','$s_course','$s_type','$s_occupation')";

//     $query = "INSERT INTO `students` (`s_fname`, `s_bdate`, `s_country`, `s_phone`, `s_email`, `s_education`, `s_programme`, `s_course`, `s_type`, `s_occupation`)
// VALUES('$s_fname', $s_bdate, '$s_country', '$s_phone', '$s_email', '$s_education', '$s_programme', '$s_course', '$s_type', '$s_occupation')";

    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "Registration Successful";
        echo header('location: s_view.php');
    } else {
        "Registration Failed!";
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
        <h1>SOFTCLIQ University</h1>
        <form action="" method="POST">
            <div class="img0">
                <img src="../admin/images/avatar.png" alt="Avatar" class="avatar">
            </div>
            <p>Please fill this form for</p>
            <hr>

            <div class="username0">
                <!-- <label for="s_id"><b>Student_Id:</b></label>
                    <input type="text" placeholder="SID01" name="s_id" required><br>
                    <br> -->
                <label for="s_fname"><b>Full_name:</b></label>
                <input type="text" name="s_fname" placeholder="Student_full_name" required><br>
                <br>
                <label for="s_bdate"><b>Date_of_birth:</b></label>
                <input type="date" name="s_bdate" placeholder="Date_of_birth" required><br>
                <br>
                <label for="s_country"><b>Country:</b></label>
                <input type="text" name="s_country" placeholder="Country" required><br>
                <br>
                <label for="s_phone"><b>Phone Number:</b></label>
                <input type="text" name="s_phone" placeholder="ex:026-235-6841" pattern="+[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required><br>
                <br>
                <label for="s_email"><b>Email:</b></label>
                <input type="text" name="s_email" placeholder="Enter Email" required><br>
                <br>

                <label for="s_education"><b>Educational Qualifications:</b></label>
                <select name="s_education">
                    <option value="Senior Secondary School Graduate">Senior Secondary School Graduate</option>
                    <option value="Junior Secondary Graduate">Junior Secondary Graduate</option>
                    <option value="University Graduate">University Graduate</option>
                    <option value="Others">Others</option>
                </select><br>
                <br>

                <label for="s_programme"><b>Student Programmes:</b></label>
                <select name="s_programme">
                    <option value="Graduate Degree Programmes">Graduate Degree Programmes</option>
                    <option value="Undergraduate Degree Programmes">Undergraduate Degree Programmes</option>
                </select><br>
                <br>

                <label for="s_course"><b>Student Course:</b></label>
                <select name="s_course">
                    <option value="" selected disabled>Select Course</option>
                    <?php
                    $query = "SELECT * FROM courses";
                    $result = mysqli_query($connection, $query);
                    while ($sdata = mysqli_fetch_assoc($result)) { ?>
                        <option value="<?php echo $sdata['course_name'] ?>">
                            <?php echo $sdata['course_name'] ?>
                        </option>
                    <?php } ?>


                    <!-- <option value="IT">IT</option>
                    <option value="Accounting">Accounting</option>
                    <option value="Business">Business</option>
                    <option value="Fashion">Fashion</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Graphic Design">Graphic Design</option> -->
                </select><br>
                <br>

                <label for="s_type"><b>Student Type:</b></label>
                <select name="s_type">
                    
                    <option value="Regular">Regular</option>
                    <option value="Mature">Mature</option>
                    <option value="Mature">Week-End</option>
                    <option value="Mature">Evening</option>
                </select><br>
                <br>

                <label for="s_occupation"><b>Occupation:</b></label>
                <input type="text" name="s_occupation" placeholder="Ex: Manager/Officer/..." value="">
                <br>
                <br>


            </div>
            <button type="submit" name="submit">Submit</button>
    </div>

    <!-- <div class="container signin">
            <p>Already have an account? <a href="#">Sign in</a>.</p>
        </div> -->
    </form>
</body>

</html>