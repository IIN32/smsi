<?php
require_once('../includes/db_connection.php');
require_once('../functions/functions.php');
?>
<?php
//Sanitisation
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function dollS(){
    $doll='$';
    return $doll;
}


?>