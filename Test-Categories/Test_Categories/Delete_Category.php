<?php
    // connection to db
    include '../../Partials/Connect.php';

    $category_id = $_GET['category_id'];

    // deleting data in db
    $sql = "DELETE FROM `test_categories` WHERE category_id='$category_id'";
    $result = mysqli_query($conn,$sql);

    // checking insertion condition
    if (!$result) {
        echo "cannot be deleted";
    } else {
        echo "Deleted";
        header("location: ../Main_Test_Category.php"); 
        exit();
    }
?>