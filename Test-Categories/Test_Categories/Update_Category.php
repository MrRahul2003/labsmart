<?php
    include '../../Partials/Connect.php';
?>
<?php
    if (isset($_POST['update'])) 
    {
        $category_id = $_POST['category_id'];
        $category_edited_name = $_POST['category_edited_name'];
        $category_edited_shortname = $_POST['category_edited_shortname'];
        echo $category_id;

        $sql = "SELECT * FROM `test_categories` WHERE category_id='$category_id'";
        $result = mysqli_query($conn,$sql) OR Die('query Failed1');
        $row = mysqli_fetch_assoc($result);
    
        $category_original_name = $row['category_name'];

        $sql = "UPDATE `test_categories` 
        SET `login_user_id`= 1,`category_id`='$category_id',`category_name`='$category_original_name',
        `category_edited_name`='$category_edited_name',`category_shortname`='$category_edited_shortname' WHERE category_id='$category_id'";
        $result = mysqli_query($conn,$sql) OR Die('query Failed2');
        header("location: ../Main_Test_Category.php"); 
        exit();
    }
?>