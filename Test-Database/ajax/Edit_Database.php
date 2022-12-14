<?php
    include '../../Partials/Connect.php';
?>
<?php
    $database_id = $_GET['database_id'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    body {
        margin-top: 20px;
    }

    .form-control:not(textarea) {
        height: 44px;
    }

    .form-control {
        padding: 0 18px 3px;
        border: 1px solid #dbe2e8;
        border-radius: 22px;
        background-color: #fff;
        color: #606975;
        font-family: "Maven Pro", Helvetica, Arial, sans-serif;
        font-size: 14px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .form-group label {
        margin-bottom: 8px;
        padding-left: 18px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
    }

    .form-text {
        padding-left: 18px;
    }

    .text-muted {
        color: #9da9b9 !important;
    }
    </style>
</head>

<body>
    <div class="container padding-bottom-3x mb-2">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <h2>Edit Database</h2>

                <?php
                    $sql1 = $conn->prepare("SELECT * FROM `test_database` WHERE database_id='$database_id'");
                    $sql1 -> execute();
                    $result1 = $sql1->get_result();
                    
                    $row1 = $result1 -> fetch_assoc();
                    $rowNo = mysqli_num_rows($result1);
                ?>

                <form class="card mt-4" action="Update_Database.php" method="POST">

                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" type="hidden" value="<?php echo $database_id ?>"
                                name='database_id' required>
                        </div>

                        <div class="form-group">
                            <label class="mx-2"> Name </label>
                            <input class="form-control" type="text" name="database_name" id="database_name"
                                placeholder="Add Category Name" value="<?php echo $row1['database_name'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="mx-2"> Short Name </label>
                            <input class="form-control" type="text" name="database_shortname" id="database_shortname"
                                placeholder="Add Short Category" value="<?php echo $row1['database_shortname'] ?>" required>
                        </div>

                        <div class="form-group">
                            <label class="mx-2"> Category </label>
                            <select class="form-select" name="database_category" id="database_category"
                                aria-label="Default select example">

                                <?php
                                $database_category = $row1['database_category'];
                                $sql = "SELECT * FROM `test_categories`";
                                $result = mysqli_prepare($conn,$sql);
                                mysqli_stmt_bind_result($result, $login_user_id, $category_id, 
                                $category_name, $category_edited_name, $category_shortname, $category_date, $category_time);
                                mysqli_stmt_execute($result);  // stores result
                                mysqli_stmt_store_result($result);

                                if (mysqli_stmt_num_rows($result)>0) {
                                    while ($row = mysqli_stmt_fetch($result)) {
                                        echo '<option value="'.$category_name.'"'; 
                                ?>
                                <?php
                                         if($category_name == $database_category)
                                         { echo "Selected"; };
                                ?>
                                <?php
                                        echo ">$category_name </option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="mx-2"> Unit </label>
                            <select class="form-select" name="database_unit" id="database_unit"
                                aria-label="Default select example">
                                <option value="-" <?php
                                 if($row1['database_unit'] == '-')
                                 { echo "Selected";}
                                ?>>Open this select menu</option>
                                <option value="%" <?php
                                 if($row1['database_unit'] == '%')
                                 { echo "Selected";}
                                ?>>%</option>
                                <option value="AU/mL" <?php
                                 if($row1['database_unit'] == 'AU/mL')
                                 { echo "Selected";}
                                ?>>AU/mL</option>
                                <option value="cumm" <?php
                                 if($row1['database_unit'] == 'cumm')
                                 { echo "Selected";}
                                ?>>cumm</option>
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label class="mx-2"> Input type </label>
                            <select class="form-select" name="database_input_type" id="database_input_type"
                                aria-label="Default select example">
                                <option value="-" <?php
                                 if($row1['database_input_type'] == '-')
                                 { echo "Selected";}
                                ?>>Open this select menu</option>
                                <option value="Numeric" <?php
                                 if($row1['database_input_type'] == 'Numeric')
                                 { echo "Selected";}
                                ?>>Numeric</option>
                                <option value="Single Line" <?php
                                 if($row1['database_input_type'] == 'Single Line')
                                 { echo "Selected";}
                                ?>>Single Line</option>
                                <option value="Paragraph" <?php
                                 if($row1['database_input_type'] == 'Paragraph')
                                 { echo "Selected";}
                                ?>>Paragraph</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit" name="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>