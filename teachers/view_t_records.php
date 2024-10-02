<?php
require_once('../includes/db_connection.php');
?>

<!DOCTYPE html>
<html>

<head>


    <meta charset="UTF-8" name="viewport" content="width-device-width, initial-scale=1" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <table class="table table-striped table-hover" id="classtable">
            <h2>Teachers Records</h2>
            <thead class="alert-info">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Number</th>
                    <th scope="col">Address</th>
                    <th scope="col">Joining Date</th>
                    <th scope="col">Date Of Birth</th>
                    <th scope="col">Qualifications</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM `t_records`";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $row['t_id'] ?></td>
                        <td><?php echo $row['t_fname'] ?></td>
                        <td><?php echo $row['t_email'] ?></td>
                        <td><?php echo $row['t_phone'] ?></td>
                        <td><?php echo $row['t_address'] ?></td>
                        <td><?php echo $row['t_join'] ?></td>
                        <td><?php echo $row['t_bdate'] ?></td>
                        <td><?php echo $row['t_qualification'] ?></td>
                        <td><?php echo $row['t_experience'] ?></td>
                        <td><?php echo $row['t_description'] ?></td>
                        <td>
                            <!-- <a href="single_data.php?view=<?= $row['id'] ?>">View</a>| -->
                            <a href="update_t_records.php?updatedId=<?= $row['t_id'] ?>" title="Edit"><i class="fa fa-edit" style="color:green"></i></a>|
                            <a href="delete_t_records.php?deletedId=<?= $row['t_id'] ?>" title="Delete"><i class="fa fa-trash" style="color:red"></i></a>|
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