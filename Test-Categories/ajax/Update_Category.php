<?php
    include '../../Partials/Connect.php';
?>
<?php
    if (isset($_POST['update'])) 
    {
        $login_user_id = 1;
        $category_id = mysqli_real_escape_string($conn,$_POST['category_id']);
        $category_edited_name = mysqli_real_escape_string($conn,$_POST['category_edited_name']);
        $category_edited_shortname = mysqli_real_escape_string($conn,$_POST['category_edited_shortname']);

        $sql = "SELECT * FROM `test_categories` WHERE category_id = ? ";
        $result = mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_result($result, $login_user_id, $category_id, 
        $category_name, $category_edited_name, $category_shortname, $category_date, $category_time);
        mysqli_stmt_execute($result);  // stores result
        mysqli_stmt_store_result($result);
        
        $category_original_name = mysqli_real_escape_string($conn,$category_name);
        date_default_timezone_set('Asia/Kolkata');
        $category_date = date("Y-m-d");
        $category_time = date("h:i:s:a");

        $sql = "UPDATE `test_categories`
        SET `login_user_id`= ?,
        `category_id`= ?,
        `category_name`= ?,
        `category_edited_name`= ?,
        `category_shortname`= ?,
        `category_date`= ?,
        `category_time`= ?
        WHERE category_id= ?";
        $result = mysqli_prepare($conn, $sql);
    
        if ($result) {
            mysqli_stmt_bind_param($result,'iisssssi',$login_user_id,$category_id,
            $category_original_name,$category_edited_name,$category_edited_shortname,
            $category_date,$category_time,$category_id);
            mysqli_stmt_execute($result);
            echo mysqli_stmt_affected_rows($result);
            // echo 1;
            header("location: ../Main_Test_Category.php"); 
            exit();
        } else {
            echo 0;
        }
    }
?>