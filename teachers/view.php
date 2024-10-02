<?php
require_once('../includes/db_connection.php');
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
<div class="container">
        <table class="table table-striped table-hover" id="classtable">
            <h2>Attendance</h2>
            <thead class="alert-info">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Faculty Note</th>
                    <th scope="col">Faculty</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $query= "SELECT * FROM attendance";
            $result=mysqli_query($connection, $query);

            while($row=mysqli_fetch_array($result))
            {?>
                <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['dates'] ?></td>
                <td><?php echo $row['student_name'] ?></td>
                <td><?php echo $row['statuses'] ?></td>
                <td><?php echo $row['f_note'] ?></td>
                <td><?php echo $row['faculty'] ?></td>
                <td><?php echo $row['time'] ?></td>
                <td>
                    <!-- <a href="single_data.php?view=<?= $row['id'] ?>">View</a>|-->
                    <a href="a_update.php?updatedId=<?= $row['id'] ?>" title="Edit"><i class="fa fa-edit" style="color:green"></i></a>|
                    <a href="delete.php?deletedId=<?= $row['id'] ?>" title="Delete"><i class="fa fa-trash" style="color:red"></i></a>|
                </td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
</div>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#classtable').DataTable();
    });
</script>
    </body>
</html>