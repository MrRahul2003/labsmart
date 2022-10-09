<?php
include '../../Partials/Connect.php'
?>
<?php

$database_id = $_POST['database_id'];
// echo $database_id;

$sql = "DELETE FROM `test_database` WHERE database_id='$database_id'";
$result = mysqli_query($conn,$sql) or Die("sql query failed");

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>