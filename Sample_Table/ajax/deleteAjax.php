<?php
include '../../Partials/Connect.php'
?>
<?php

$id = mysqli_real_escape_string($conn,$_POST['id']);

$sql = "DELETE FROM `sample_table` WHERE id = ? ";
$result = mysqli_prepare($conn, $sql);

if ($result) {
    mysqli_stmt_bind_param($result,'i',$id);
    mysqli_stmt_execute($result);
    echo mysqli_stmt_affected_rows($result);
    // echo 1;
} else {
    echo 0;
}

?>