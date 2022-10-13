<?php
 include '../Partials/Connect.php'
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Today Report </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
        integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
        integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

    <style>
    body {
        margin-top: 20px;
        background-color: #fff;
    }

    .project-list-table {
        border-collapse: separate;
        border-spacing: 0 12px
    }

    .project-list-table tr {
        background-color: #eee
    }

    .me-2 {
        margin-right: 0.5rem !important;
    }

    .badge-soft-success {
        color: #63ad6f !important;
        background-color: rgba(99, 173, 111, .1);
    }
    </style>
</head>

<body>
    <div class="container" id="category_main_container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h2 class="card-title"> All lab reports for today </h2>
                </div>
            </div>
        </div>

        <div class="container modal-header">
            <h3 class="modal-title" id="staticBackdropLabel">Search Cases</h3>
        </div>
        <form class="container my-2" action="Update_Database.php" id="filter_formData" method="POST">

            <div class="row g-3">

                <div class="col-md-6 form-group">
                    <label class="mx-2"> Search in page </label>
                    <input class="form-control" id="search_filter" type="text" name='search_filter'
                        placeholder="Search by name/ surname/ regno/ gender">
                </div>

                <div class="col-md-6 form-group">
                    <?php
                        date_default_timezone_set('Asia/Kolkata');
                        $date = date("Y-m-d");
                    ?>
                    <label class="mx-2"> Date </label>
                    <input class="form-control" type="date" id="date_filter" name="date_filter"
                        value="<?php echo $date; ?>">
                </div>

                <div class="container mt-3">
                    <button class="btn btn-primary" type="submit" name="filter_searchBtn" id="filter_searchBtn">Search</button>
                </div>

            </div>
        </form>
        <hr>

        <div class="container d-flex justify-content-center">
            <h3 class="modal-title" id="staticBackdropLabel"> New reports </h3>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Reg. no.</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Patient</th>
                                    <th scope="col">Referred by</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Paid</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tableData">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/jquery.js"></script>
    <script>
    // displaying the records
    $(document).ready(function() {
        function display() {
            $.ajax({
                url: "ajax/displayAjax.php",
                type: "POST",
                success: function(data) {
                    $("#tableData").html(data);
                }
            })
        }
        display();

        // Searching the record of doctors and fetching them
        $(document).on("click", "#filter_searchBtn", function(e) {
            e.preventDefault();
            var search_filter = $("#search_filter").val().trim();
            var date_filter = $("#date_filter").val();
            console.log(search_filter);
            console.log(date_filter);

            function loadSearch(page) {
                $.ajax({
                    url: "ajax/searchAjax.php",
                    type: "POST",
                    data: {
                        search_filter: search_filter,
                        date_filter: date_filter
                    },
                    success: function(data) {
                        console.log(data);
                        if (data) {
                            $("#tableData").html(data);
                        } else {}
                    }
                })
            }
            loadSearch();
        })
    })
    </script>

</body>

</html>