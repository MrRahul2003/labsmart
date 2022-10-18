<?php
    include '../Partials/Connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Cases</title>
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
    <div class="container modal-header">
        <h3 class="modal-title" id="staticBackdropLabel">Search Cases</h3>
    </div>
    <form class="container my-2" action="Update_Database.php" id="filter_formData" method="POST">

        <div class="row g-3">

            <div class="col-md-6 form-group">
                <label class="mx-2"> Reg. no. </label>
                <input class="form-control" id="regno" type="number" name='regno' placeholder="Add Reg.no" required>
            </div>

            <div class="col-md-6 form-group">
                <label class="mx-2"> Patiest Name </label>
                <input class="form-control" type="text" name="patient_name" id="patient_name"
                    placeholder="Add Patient Name" required>
            </div>

            <div class="col-md-4 form-group">
                <label class="mx-2"> Referred by (active referrers) </label>
                <select class="form-select" name="referred_by" id="referred_by" aria-label="Default select example">
                    <option value="-">Open this select menu</option>
                    <option value="Dr.Vivek">Dr.Vivek</option>
                    <option value="Dr.Self">Dr.Self</option>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label class="mx-2"> Case type </label>
                <select class="form-select" name="case_type" id="case_type" aria-label="Default select example">
                    <option value="-">Open this select menu</option>
                    <option value="labcase">labcase</option>
                    <option value="usgcase">usgcase</option>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label class="mx-2"> Collection centre </label>
                <select class="form-select" name="collection_center" id="collection_center"
                    aria-label="Default select example">
                    <option value="-">Open this select menu</option>
                    <option value="Main">Main</option>
                </select>
            </div>

            <div class="col-md-6 form-group">
                <label class="mx-2"> From </label>
                <input class="form-control" type="date" id="case_from" name="case_from">
            </div>

            <div class="col-md-6 form-group">
                <label class="mx-2"> To </label>
                <input class="form-control" type="date" id="case_to" name="case_to">
            </div>


        </div>
        <div class="container mt-3">
            <button class="btn btn-primary" type="submit" name="search" id="filter_searchBtn">Search</button>
            <button class="btn btn-primary" type="submit" name="clear" id="filter_clearBtn">Clear</button>
        </div>


    </form>
    <hr>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>