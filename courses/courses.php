<?php
require_once('../includes/db_connection.php');

// $fees_year = $_POST['fees_year'];
// $fees_sem = $_POST['fees_sem'];
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

<?php
// require_once('../includes/db_connection.php');
$fees_year = $_POST['fees_year'];
// $fees_sem = $_POST['fees_sem'];
$fees_year = $row['fees_year'];
echo '<td align="left" width="8%" height="25px">';
$query = "SELECT id, course_name FROM courses";
$result = mysqli_query($connection, $query) or die("Bad SQL: $query");

echo '<select type="text" class="dropdown" name="course_name" id="course_name" size="1" onchange="updatecat()">';
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
$fees_year = $row['fees_year'];

    echo "<option value='" . $row['fees_year']; "'>  </option>";
} //End while statement
echo "</select>";
echo '</a></td>';
echo '<td align="left" width="10%">';
echo '<input type="text" id="fees_year" name="fees_year" readonly="readonly" value="">';
echo '</a></td>';
?>





<script>
    // $('#s_course').change(function() {
    //     selectedOption = $('option:selected', this);
    //     $('input[name=fees_year]').val(selectedOption.data('fees_year'));
    // });

    $('select[name="s_course"]').change(function()
    {
         $('#textfieldid').val($('select[name="s_course"] option:selected').data('fees_year'));
    }
)
</script>
</body>
</html>
