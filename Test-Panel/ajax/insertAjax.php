<?php
include '../../Partials/Connect.php'
?>
<?php
$panel_name = $_POST['panel_name'];
$panel_category = $_POST['panel_category'];
$panel_tests = $_POST['panel_tests'];
$panel_fees = $_POST['panel_fees'];
$test='';

foreach ($panel_tests as $row) {
    // $test =. mysqli_real_escape_string($conn,$row);
    $test = $test . $row . ', ';
}
// echo $test;

$sql = "INSERT INTO `test_panel`(`login_user_id`, `panel_name`, `panel_category`, `panel_tests`, `panel_fees`) 
VALUES (1,'$panel_name','$panel_category','$test','$panel_fees')";
$result = mysqli_query($conn,$sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}


?> 