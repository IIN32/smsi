<?php
require_once('../includes/db_connection.php');
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
        <table class="table table-striped table-hover">
            <h2>Students Fees Table</h2>
            <thead class="alert-info">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Course</th>
                    <th scope="col">Year</th>
                    <th scope="col">Fees/Year</th>
                    <th scope="col">Fees/Sem</th>
                    <th scope="col">Semester</th>
                    <th scope="col">Paid</th>
                    <th scope="col">Due</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
        <tbody>
            <?php
            $query= "SELECT * FROM `fees`";
            $result=mysqli_query($connection, $query);

            while($row=mysqli_fetch_array($result))
            {?>
                <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['s_name'] ?></td>
                <td><?php echo $row['s_mail'] ?></td>
                <td><?php echo $row['s_number'] ?></td>
                <td><?php echo $row['s_course'] ?></td>
                <td><?php echo $row['s_academic'] ?></td>
                <td><?php echo $row['fees_year'] ?></td>
                <td><?php echo $row['fees_sem'] ?></td>
                <td><?php echo $row['s_semester'] ?></td>
                <td><?php echo $row['s_paid'] ?></td>
                <td><?php echo $row['s_due'] ?></td>
                <td><?php echo $row['s_id'] ?></td>
                <td>
                    <!-- <a href="single_data.php?view=<?= $row['id'] ?>">View</a>| -->
                    <a href="fees_update.php?updatedId=<?= $row['id'] ?>" title="Edit"><i class="fa fa-edit" style="color:green"></i></a>|
                    <a href="delete_fees.php?deletedId=<?= $row['id'] ?>" title="Delete"><i class="fa fa-trash" style="color:red"></i></a>|
                </td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
</div>
</body>
</html>