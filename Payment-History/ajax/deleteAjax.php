<?php
include '../../Partials/Connect.php'
?>
<?php

$repair_Id = mysqli_real_escape_string($conn,$_POST['repair_Id']);

$sql = "DELETE FROM `payment_history` WHERE repair_Id = ? ";
$result = mysqli_prepare($conn, $sql);

if ($result) {
    mysqli_stmt_bind_param($result,'i',$repair_Id);
    mysqli_stmt_execute($result);
    echo mysqli_stmt_affected_rows($result);
    // echo 1;
} else {
    echo 0;
}

?>