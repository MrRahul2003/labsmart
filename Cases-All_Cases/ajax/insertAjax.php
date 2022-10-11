<?php
include '../../Partials/Connect.php'
?>
<?php
$login_user_id = 1;
$database_name = mysqli_real_escape_string($conn,$_POST['database_name']);
$database_shortname = mysqli_real_escape_string($conn,$_POST['database_shortname']);
$database_category = mysqli_real_escape_string($conn,$_POST['database_category']);
$database_unit = mysqli_real_escape_string($conn,$_POST['database_unit']);
$database_input_type = mysqli_real_escape_string($conn,$_POST['database_input_type']);
date_default_timezone_set('Asia/Kolkata');
$database_date = date("Y-m-d");
$database_time = date("h:i:s:a");

$sql = "INSERT INTO `test_database` (`login_user_id`, `database_name`, `database_shortname`, `database_category`, `database_unit`, `database_input_type`, `database_date`, `database_time`) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$result = mysqli_prepare($conn, $sql);

if ($result) {
    mysqli_stmt_bind_param($result,'isssssss',$login_user_id, $database_name, $database_shortname, $database_category, $database_unit, $database_input_type, $database_date, $database_time);
    mysqli_stmt_execute($result);
    echo mysqli_stmt_affected_rows($result);
    // echo 1;
} else {
    echo 0;
} 


?>