<?php
include '../../Partials/Connect.php'
?>
<?php
$srno = mysqli_real_escape_string($conn,$_POST['srno']);
$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
$device_name = mysqli_real_escape_string($conn,$_POST['device_name']);
$status = mysqli_real_escape_string($conn,$_POST['status']);
$payment = mysqli_real_escape_string($conn,$_POST['payment']);
$payment_id = mysqli_real_escape_string($conn,$_POST['payment_id']);
$paid_on = mysqli_real_escape_string($conn,$_POST['paid_on']);

$sql = "INSERT INTO `payment_history`(`user_id`, `dvc_name`, `paid_on`, `status`, `pymnt`, `SrNo`, `payment_id`)
VALUES (?, ?, ?, ?, ?, ?, ?)";
$result = mysqli_prepare($conn, $sql);

if ($result) {
    mysqli_stmt_bind_param($result,'issssis',$user_id, $device_name, $paid_on, $status, $payment, $srno, $payment_id);
    mysqli_stmt_execute($result);
    echo mysqli_stmt_affected_rows($result);
    // echo 1;
} else {
    echo 0;
} 


?>