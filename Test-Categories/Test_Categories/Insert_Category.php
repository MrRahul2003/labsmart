<?php
 include '../../Partials/Connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <?php
     if (isset($_POST['insert'])) {
        // echo "True";

        $category_name = $_POST['category_name'];
        $category_shortname = $_POST['category_shortname'];

        $sql = "INSERT INTO `test_categories`(`login_user_id`, `category_name`, `category_edited_name`, `category_shortname`)
         VALUES (1,'$category_name','$category_name','$category_shortname')";
        $result = mysqli_query($conn,$sql) OR Die('query Failed');
        header("location: ../Main_Test_Category.php"); 
        exit();
     }
    ?>

</body>

</html>