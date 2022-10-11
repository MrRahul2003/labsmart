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
    <title>Edit Panel</title>
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
                <h2>Edit panel</h2>

                <?php
                    $sql = "SELECT * FROM `test_panel` WHERE panel_id='$panel_id'";
                    $result = mysqli_query($conn,$sql) OR Die('query Failed');
                    $row = mysqli_fetch_assoc($result);
                ?>

                <form class="card mt-4" action="Update_Panel.php" method="POST">

                    <div class="card-body">

                        <div class="form-group">
                            <input class="form-control" type="hidden" value="<?php echo $panel_id ?>" name='panel_id'>
                        </div>

                        <div class="form-group">
                            <label class="mx-2"> Name </label>
                            <input class="form-control" type="text" name="panel_name" id="panel_name"
                                placeholder="Add Panel Name" value="<?php echo $row['panel_name'] ?>">
                        </div>

                        <div class="form-group">
                            <label class="mx-2"> Category </label>
                            <select class="form-select" name="panel_category" id="panel_category"
                                aria-label="Default select example">
                                <option value="Open this select menu" <?php
                                 if($row['panel_category'] == 'Open this select menu')
                                 { echo "Selected";}
                                ?>>Open this select menu</option>
                                <option value="Haematology" <?php
                                 if($row['panel_category'] == 'Haematology')
                                 { echo "Selected";}
                                ?>>Haematology</option>
                                <option value="Biochemistry" <?php
                                 if($row['panel_category'] == 'Biochemistry')
                                 { echo "Selected";}
                                ?>>Biochemistry</option>
                                <option value="Serology & Immunology" <?php
                                 if($row['panel_category'] == 'Serology & Immunology')
                                 { echo "Selected";}
                                ?>>Serology & Immunology</option>
                            </select>
                        </div>

                        <div class="form-group mt-2">
                            <label class="mx-2"> Tests </label>
                            <select class="form-select" name="panel_tests[]" id="panel_tests" multiple
                                aria-label="Default select example">
                                <option selected value="Open this select menu">Open this select
                                    menu</option>
                                <option value="Hemogglobin">Hemogglobin</option>
                                <option value="Total Leukocyte Count">Total Leukocyte Count
                                </option>
                                <option value="Platelet Count">Platelet Count</option>
                            </select>
                            <small>----Select multiple tests by clicking ctrl+click----</small>
                        </div>
                    </div>

                    <div class="form-group mt-2">
                        <label class="mx-2"> Fees </label>
                        <input class="form-control" type="text" value="<?php echo $row['panel_fees'] ?>" name="panel_fees" id="panel_fees"
                            placeholder="Add Fees">
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