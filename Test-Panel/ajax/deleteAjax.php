<?php
include '../../Partials/Connect.php'
?>
<?php

$panel_id = $_POST['panel_id'];
// echo $database_id;

$sql = "DELETE FROM `test_panel` WHERE panel_id='$panel_id'";
$result = mysqli_query($conn,$sql) or Die("sql query failed");

if ($result) {
    echo 1;
} else {
    echo 0;
}

?>