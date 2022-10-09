<?php
include '../../Partials/Connect.php'
?>
<?php
$database_name = $_POST['database_name'];
$database_shortname = $_POST['database_shortname'];
$database_category = $_POST['database_category'];
$database_unit = $_POST['database_unit'];
$database_input_type = $_POST['database_input_type'];

$sql = "INSERT INTO `test_database`(`login_user_id`, `database_name`, `database_shortname`, `database_category`, `database_unit`, `database_input_type`) 
VALUES (1,'$database_name','$database_shortname','$database_category','$database_unit','$database_input_type')";
$result = mysqli_query($conn,$sql);

if ($result) {
    echo 1;
} else {
    echo 0;
}


?>