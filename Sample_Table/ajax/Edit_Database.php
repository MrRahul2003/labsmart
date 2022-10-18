<?php
    include '../../Partials/Connect.php';
?>
<?php
    $id = $_GET['id'];
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
                    $sql1 = $conn->prepare("SELECT * FROM `sample_table` WHERE id='$id'");
                    $sql1 -> execute();
                    $result1 = $sql1->get_result();
                    
                    $row1 = $result1 -> fetch_assoc();
                    $rowNo = mysqli_num_rows($result1);
                ?>

                <form class="card mt-4" action="Update_Database.php" method="POST">
                    <div class="card-body row g-3">
                        <div class="form-group mt-2">
                            <input class="form-control" type="hidden" name="id" id="id" value="<?php echo $row1['id'] ?>">
                        </div>
                        <div class="form-group mt-2">
                            <label class="mx-2"> User Id </label>
                            <input class="form-control" type="text" name="user_id" id="user_id" value="<?php echo $row1['user_id'] ?>">
                        </div>

                        <div class="form-group mt-2">
                            <label class="mx-2"> Device Id </label>
                            <input class="form-control" type="number" name="device_id" id="device_id" placeholder="Add Device Id" value="<?php echo $row1['device_id'] ?>">
                        </div>

                        <div class="col-md-6 form-group mt-2">
                            <label class="mx-2"> Device Category </label>
                            <input class="form-control" type="text" name="device_cat" id="device_cat"
                                placeholder="Add Device Category" value="<?php echo $row1['device_cat'] ?>">
                        </div>

                        <div class="col-md-6 form-group mt-2">
                            <label class="mx-2"> Device Name </label>
                            <input class="form-control" type="text" name="device_name" id="device_name"
                                placeholder="Add Device Name" value="<?php echo $row1['device_name'] ?>">
                        </div>

                        <div class="col-md-6 form-group mt-2">
                            <label class="mx-2"> Status </label>
                            <select class="form-select" name="status" id="status" aria-label="Default select example">
                                <option value="Repair" <?php if($row1['status'] == 'Repair') { echo "Selected";} ?>>Repair</option>
                                <option value="Repair" <?php if($row1['status'] == 'Pending') { echo "Selected";} ?>>Pending</option>
                                <option value="Repair" <?php if($row1['status'] == 'Done') { echo "Selected";} ?>>Done</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mt-2">
                            <label class="mx-2"> Payment </label>
                            <select class="form-select" name="payment" id="payment" aria-label="Default select example">
                                <option value="Yes" <?php if($row1['pymnt'] == 'Yes') { echo "Selected";} ?>>Yes</option>
                                <option value="No" <?php if($row1['pymnt'] == 'No') { echo "Selected";} ?>>No</option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group">
                            <label class="mx-2"> Date Selected </label>
                            <input class="form-control" type="date" id="date_selected" name="date_selected" value="<?php echo $row1['date_selected'] ?>">
                        </div>

                        <div class="col-md-6 form-group">
                            <label class="mx-2"> Submit On </label>
                            <input class="form-control" type="date" id="submit_on" name="submit_on" value="<?php echo $row1['submit_on'] ?>">
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