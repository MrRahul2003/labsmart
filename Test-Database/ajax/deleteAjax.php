<?php
include '../../Partials/Connect.php'
?>
<?php

$database_id = mysqli_real_escape_string($conn,$_POST['database_id']);

$sql = "DELETE FROM `test_database` WHERE database_id = ? ";
$result = mysqli_prepare($conn, $sql);

if ($result) {
    mysqli_stmt_bind_param($result,'i',$database_id);
    mysqli_stmt_execute($result);
    echo mysqli_stmt_affected_rows($result);
    // echo 1;
} else {
    echo 0;
}

?>