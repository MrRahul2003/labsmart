<?php
    include '../../Partials/Connect.php';
?>
<?php
    if (isset($_POST['update'])) 
    {
        $login_user_id = 1;
        $database_id = mysqli_real_escape_string($conn,$_POST['database_id']);
        $database_name = mysqli_real_escape_string($conn,$_POST['database_name']);
        $database_shortname = mysqli_real_escape_string($conn,$_POST['database_shortname']);
        $database_category = mysqli_real_escape_string($conn,$_POST['database_category']);
        $database_unit = mysqli_real_escape_string($conn,$_POST['database_unit']);
        $database_input_type = mysqli_real_escape_string($conn,$_POST['database_input_type']);


        $sql = "SELECT * FROM `test_database` WHERE database_id = ? ";
        $result = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_result($result, $login_user_id, $database_id, 
        $database_name, $database_shortname, $database_category,
        $database_unit,$database_input_type, $database_date, $database_time);
        mysqli_stmt_execute($result);  // stores result
        mysqli_stmt_store_result($result);  
        
        $database_original_name = mysqli_real_escape_string($conn,$database_name);
        date_default_timezone_set('Asia/Kolkata');
        $database_date = date("Y-m-d");
        $database_time = date("h:i:s:a");
        



        $sql = "UPDATE `test_database` SET 
        `login_user_id`= ? ,
        `database_name`= ? ,
        `database_shortname`= ? ,
        `database_category`= ? ,
        `database_unit`= ? ,
        `database_input_type`= ? ,
        `database_date`= ? ,
        `database_time`= ? 
        WHERE database_id= ? ";
        $result = mysqli_prepare($conn, $sql);

        if ($result) {
            mysqli_stmt_bind_param($result,'isssssssi',$login_user_id,$database_name,
            $database_shortname,$database_category,$database_unit,
            $database_input_type,$database_date,$database_time,$database_id);
            mysqli_stmt_execute($result);
            echo mysqli_stmt_affected_rows($result);
            // echo 1;
            header("location: ../Main_Test_Database.php"); 
            exit();
        } else {
            echo 0;
        }
    }
?>