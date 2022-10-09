<?php
    include '../../Partials/Connect.php';
?>
<?php
    $panel_id = $_GET['panel_id'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    body {
        margin-top: 20px;
        background-color: #eee;
    }

    .project-list-table {
        border-collapse: separate;
        border-spacing: 0 12px
    }

    .project-list-table tr {
        background-color: #fff
    }

    .me-2 {
        margin-right: 0.5rem !important;
    }

    a {
        color: #3b76e1;
        text-decoration: none;
    }

    .badge-soft-success {
        color: #63ad6f !important;
        background-color: rgba(99, 173, 111, .1);
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <?php 
                        $sql = "SELECT * FROM `test_panel` WHERE panel_id='$panel_id'";
                        $result = mysqli_query($conn,$sql) OR Die('query Failed');
                        $row = mysqli_fetch_assoc($result);
                        $panel_id = $row['panel_id'];
                    ?>
                    <h2 class="card-title"><?php echo $row['panel_name'] ?></h2>
                    <p>Individual test interpretation, notes, comments are displayed.</p>
                    <h3>Category: <?php echo $row['panel_category'] ?></h3>
                    
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                    <div>
                    <?php echo
                        '<a href="Edit_Panel.php?panel_id='.$panel_id.'" class="btn btn-primary" > Edit</a>';
                    ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Order</th>
                                    <th scope="col">Category</th>
                                </tr>
                            </thead>
                            <tbody id="tableData">
                                
                                    <?php
                                        $sql = "SELECT * FROM `test_panel` WHERE panel_id='$panel_id'";
                                        $result = mysqli_query($conn,$sql) OR Die('query Failed');
                                        $rowNo = mysqli_num_rows($result);
                                        $i=1;
                                        $row = mysqli_fetch_assoc($result);
                                        $panel_tests = explode(',',$row['panel_tests']);
                                        foreach ($panel_tests as $tests) {
                                            echo
                                            '<tr>
                                                <td>'.$i.'</td>
                                                <td><a href="#" class="text-body">'.$tests.'</a></td>
                                            </tr>';
                                            $i++;
                                        }
                                    ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <h2>Available in ratelist under names: </h2>
                        <table class="table project-list-table table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Fee</th>
                                    <th scope="col">Change Fee</th>
                                </tr>
                            </thead>
                            <tbody id="tableData">
                                
                            <?php
                                $sql = "SELECT * FROM `test_panel` WHERE panel_id='$panel_id'";
                                $result = mysqli_query($conn,$sql) OR Die('query Failed');
                                $rowNo = mysqli_num_rows($result);
                                $i=1;
                                ;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo
                                    '<tr>
                                        <td>'.$i.'</td>
                                        <td><a href="#" class="text-body">'.$row['panel_name'].'</a></td>
                                        <td>'.$row['panel_fees'].'</td>
                                        <td><a href="Edit_Panel.php?panel_id='.$panel_id.'" class="btn btn-primary" > Edit</a></td>
                                    </tr>';
                                    $i++;
                                }
                            ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>