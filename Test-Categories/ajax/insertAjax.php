<?php
include '../../Partials/Connect.php'
?>
<?php
    $login_user_id = 1;
    $category_name = mysqli_real_escape_string($conn,$_POST['category_name']);
    $category_shortname = mysqli_real_escape_string($conn,$_POST['category_shortname']);
    date_default_timezone_set('Asia/Kolkata');
    $date = date("Y-m-d");
    $time = date("h:i:s:a");

    $sql = "INSERT INTO `test_categories`
    (`login_user_id`, `category_name`, `category_edited_name`, `category_shortname`, `category_date`, `category_time`)
    VALUES (? ,? ,? ,?, ?, ?)";
    $result = mysqli_prepare($conn, $sql);
    if ($result) {
        mysqli_stmt_bind_param($result,'isssss',$login_user_id,$category_name,$category_name,$category_shortname,$date,$time);
        mysqli_stmt_execute($result);
        // echo mysqli_stmt_affected_rows($result) . "Row Inserted <br>";
        echo 1;
    } else {
        echo 0;
    } 
?>