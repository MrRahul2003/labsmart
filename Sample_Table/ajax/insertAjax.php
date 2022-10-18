<?php
include '../../Partials/Connect.php'
?>
<?php
$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
$device_id = mysqli_real_escape_string($conn,$_POST['device_id']);
$device_cat = mysqli_real_escape_string($conn,$_POST['device_cat']);
$device_name = mysqli_real_escape_string($conn,$_POST['device_name']);
$status = mysqli_real_escape_string($conn,$_POST['status']);
$payment = mysqli_real_escape_string($conn,$_POST['payment']);
$date_selected = mysqli_real_escape_string($conn,$_POST['date_selected']);
$submit_on = mysqli_real_escape_string($conn,$_POST['submit_on']);

$sql = "INSERT INTO `sample_table`(`user_id`, `device_id`, `device_cat`, `device_name`, `status`, `date_selected`, `pymnt`, `submit_on`) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$result = mysqli_prepare($conn, $sql);

if ($result) {
    mysqli_stmt_bind_param($result,'iissssss',$user_id, $device_id, $device_cat, $device_name, $status, $payment, $date_selected, $submit_on);
    mysqli_stmt_execute($result);
    echo mysqli_stmt_affected_rows($result);
    // echo 1;
} else {
    echo 0;
} 


?>