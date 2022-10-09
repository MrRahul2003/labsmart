<?php
    include '../../Partials/Connect.php';
?>
<?php
    $category_id = $_GET['category_id'];
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
                <h2>Edit Category</h2>

                <?php
                    $sql = "SELECT * FROM `test_categories` WHERE category_id='$category_id'";
                    $result = mysqli_query($conn,$sql) OR Die('query Failed');
                    $row = mysqli_fetch_assoc($result);
                ?>

                <form class="card mt-4" action="Update_Category.php" method="POST">

                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" type="hidden"
                                value="<?php echo $category_id ?>" name='category_id'>
                        </div>
                        <div class="form-group">
                            <label for="email-for-pass">Name </label>
                            <input class="form-control" type="text" id="email-for-pass" required=""
                                name='category_edited_name' value="<?php echo $row['category_edited_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email-for-pass">Short Name </label>
                            <input class="form-control" type="text" id="email-for-pass" required=""
                                name='category_edited_shortname' value="<?php echo $row['category_shortname'] ?>">
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