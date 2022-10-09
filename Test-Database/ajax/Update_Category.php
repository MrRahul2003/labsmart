<?php
    include '../../Partials/Connect.php';
?>
<?php
    if (isset($_POST['update'])) 
    {
        $database_id = $_POST['database_id'];
        $database_name = $_POST['database_name'];
        $database_shortname = $_POST['database_shortname'];
        $database_category = $_POST['database_category'];
        $database_unit = $_POST['database_unit'];
        $database_input_type = $_POST['database_input_type'];

        $sql = "SELECT * FROM `test_database` WHERE database_id='$database_id'";
        $result = mysqli_query($conn,$sql) OR Die('query Failed1');
        $row = mysqli_fetch_assoc($result);
    
        $database_original_name = $row['database_name'];

        $sql = "UPDATE `test_database` SET `login_user_id`=1,`database_name`='$database_name',
        `database_shortname`='$database_shortname',`database_category`='$database_category',
        `database_unit`='$database_unit]',`database_input_type`='$database_input_type' WHERE database_id='$database_id' ";
        $result = mysqli_query($conn,$sql) OR Die('query Failed2');
        header("location: ../Main_Test_Database.php"); 
        exit();
    }
?>