<?php
require_once('../includes/db_connection.php');
require_once('../functions/functions.php');

?>


<?php

if (isset($_POST['submit'])) {
    $s_name = test_input($_POST['s_name']);
    $s_mail = test_input($_POST['s_mail']);
    $s_number = test_input($_POST['s_number']);
    $s_course = test_input($_POST['s_course']);
    $s_academic = test_input($_POST['s_academic']);
    $fees_year = test_input($_POST['fees_year']);
    $fees_sem = test_input($_POST['fees_sem']);
    $s_semester = test_input($_POST['s_semester']);
    $s_paid = test_input($_POST['s_paid']);
    $s_due = test_input($_POST['s_due']);
    $s_id = test_input($_POST['s_id']);


    $query = "INSERT INTO `fees` (`s_name`, `s_mail`, `s_number`, `s_course`, `s_academic`, `fees_year`, `fees_sem`, `s_semester`, `s_paid`, `s_due`, `s_id`)
    VALUES('$s_name', '$s_mail', '$s_number', '$s_course', '$s_academic', '$fees_year', '$fees_sem', '$s_semester', '$s_paid', '$s_due', '$s_id')";

    $result = mysqli_query($connection, $query);
    if ($result) {
        echo '<script>alert("Fees added successfully");
    </script>';
        echo "<a href=\"view_fees.php?view=\"";
        echo "></a>";
        echo header('location: view_fees.php');
    } else {
        echo mysqli_errno($connection);
        echo '<script>alert("Failed to add");
    window.location="add_course.php";
    </script>';
        echo mysqli_errno($connection);
    }
}


?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <form method="POST" action="">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">School Fees Payment Form</h3>
                            <!-- <form method="POST"> -->

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label" for="emailAddress">Student’s ID:</label>
                                        <input type="text" name="s_id" class="form-control form-control-lg" required />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="lastName">Email</label>
                                        <input type="text" name="s_mail" class="form-control form-control-lg" required />
                                    </div>

                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-4">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">Student Name:</label><br>
                                        <input type="text" name="s_name" class="form-control form-control-lg" placeholder="Name" required />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <input type="text" name="s_number" class="form-control form-control-lg" pattern="+[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{4}" required />
                                    </div>

                                </div>
                            </div>

                            <!-- <div class="container"> -->
                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2"><br>
                                    <label class="form-label select-label">Course</label><br>
                                    <select class="select form-control-lg" name="s_course" id="s_course" value="" onchange="updatecat()">
                                        <option value="" selected disabled>Select Course</option>
                                        <?php
                                        $query = "SELECT * FROM courses";
                                        $result = mysqli_query($connection, $query);
                                        while ($cdata = mysqli_fetch_assoc($result)) { ?>
                                            <option value="<?php echo $cdata['course_name'] ?>">
                                                <?php echo $cdata['course_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select><br>


                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label select-label">Academic Year</label><br>
                                        <select class="select form-control-lg" name="s_academic">
                                            <option value="" disabled selected>Academic/Year</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Instead call the ones inserted in add_course -->
                            <div class="form-group">
                                <label>Fees/Year</label>
                                <input type="text" name="fees_year" id="fees_year" class="form-control" placeholder="Ex: $4400" value="<?php echo dollS(); ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Fees/Semester</label>
                                <input type="text" name="fees_sem" class="form-control" value="<?php echo dollS(); ?>" required>
                            </div>
                            <!-- </div> -->

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">
                                    <div class="form-outline">
                                        <label class="form-label select-label">Semesters:</label><br>
                                        <select class="select form-control-lg" name="s_semester">
                                            <option value="" disabled selected>Semesters</option>
                                            <option value="Semester 1">Semester 1</option>
                                            <option value="Semester 2">Semester 2</option>
                                        </select>
                                    </div>

                                </div>
                            </div><br>


                            <div class="form-group">
                                <label>Amount Paid</label>
                                <input type="text" name="s_paid" class="form-control" value="<?php echo dollS(); ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Amount Due</label>
                                <input type="text" name="s_due" class="form-control" value="<?php echo dollS(); ?>" required>
                            </div>

                            <div class="mt-4 pt-2" class="text-center">
                                <input class="btn btn-primary btn-lg" name="submit" type="submit" value="Submit" />
                            </div>

                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>


    <script>
        // $('#s_course').change(function() {
        //     selectedOption = $('option:selected', this);
        //     $('input[name=fees_year]').val(selectedOption.data('fees_year'));
        // });

        // $('#s_course').change(function() {
        //     selectedOption = $('option:selected', this);
        //     $('input[name=fees_sem]').val(selectedOption.data('fees_sem'));
        // });

        // $('select[name="s_course"]').change(function() {
        //     $('#textfieldid').val($('select[name="s_course"] option:selected').data('fees_year'));
        // });
    </script>
</body>

</html>