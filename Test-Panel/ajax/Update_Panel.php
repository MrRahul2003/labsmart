<?php
    include '../../Partials/Connect.php';
?>
<?php
    if (isset($_POST['update'])) 
    {
        $panel_id = $_POST['panel_id'];
        $panel_name = $_POST['panel_name'];
        $panel_category = $_POST['panel_category'];
        $panel_tests = $_POST['panel_tests'];
        $panel_fees = $_POST['panel_fees'];
        $test='';

        foreach ($panel_tests as $row) {
            $test = $test . $row . ', ';
        }
        echo $test;

        $sql = "UPDATE `test_panel` SET `login_user_id`=1,`panel_name`='$panel_name',`panel_category`='$panel_category',`panel_tests`='$test',`panel_fees`='$panel_fees' WHERE panel_id='$panel_id'";
        $result = mysqli_query($conn,$sql) OR Die('query Failed2');
        header("location: ../Main_Test_Panel.php"); 
        exit();
    }
?>