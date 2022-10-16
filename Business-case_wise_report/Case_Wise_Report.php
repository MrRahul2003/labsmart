<?php
 include '../Partials/Connect.php'
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Case_Wise_Report.php</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
        integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css"
        integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />

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

    <!-- <?php include 'form/_search_cases.php' ?> -->

    <div class="container" id="category_main_container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h1 class="card-title"> Case wise business report </h1>
                </div>
            </div>
        </div>

        <form class="container my-2" id="generate_formData">
            <div class="row g-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="main" id="main" value="main" checked>
                    <label class="form-check-label" for="main">
                        Main
                    </label>
                </div>
                <div class="col-md-12 form-group">
                    <label class="mx-2"> On </label>
                    <input class="form-control" type="date" id="on_date" name="on_date">
                </div>

                <div>
                    <input class="form-check-input cases" name="cases" type="checkbox" value="LabCase" /> LabCase <br>
                    <input class="form-check-input cases" name="cases" type="checkbox" value="UsgCase" /> UsgCase <br>
                    <input class="form-check-input cases" name="cases" type="checkbox" value="DigitalXrayCase" />
                    DigitalXrayCase <br>
                    <input class="form-check-input cases" name="cases" type="checkbox" value="XrayCase" /> XrayCase <br>
                    <input class="form-check-input cases" name="cases" type="checkbox" value="EcgCase" /> EcgCase <br>
                    <input class="form-check-input cases" name="cases" type="checkbox" value="CtScanCase" /> CtScanCase
                    <br>
                    <input class="form-check-input cases" name="cases" type="checkbox" value="MriCase" /> MriCase <br>
                </div>
                <div class="container mt-3">
                    <button class="btn btn-primary" type="submit" name="generateBtn" id="generateBtn">Generate Case Wise
                        Business Report</button>
                </div>
            </div>
        </form>


        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <div class="container text-center">
                        <h1> Case Wise Business Report for Main <br> Date: 05/10/2022 </h1> <br>
                        <h3>Case types: Ct scan case, Digital xray case, Ecg case, Lab case, Mri case, Outsource lab
                            case, Usg case, Xray case <br> <strong> Total cases: 1 </strong> </h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-nowrap align-middle table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Sr.No.</th>
                                    <th scope="col">Daily case number</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Patient Name</th>
                                    <th scope="col">Referred by</th>
                                    <th scope="col">Investigation</th>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Due</th>
                                    <th scope="col">Amount Collected</th>
                                </tr>
                            </thead>
                            <tbody id="tableData">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <script src="../js/jquery.js"></script>
    <script>
    $(document).ready(function() {
        $("#generate_formData").submit(function(e) {
            e.preventDefault();

            var cases = [];
            var onDate = $("#on_date").val();
            $(".cases").each(function() {
                if ($(this).is("input:checkbox[name=cases]:checked")) {
                    cases.push($(this).val());
                }
            })
            cases = cases.toString();
            console.log(onDate);
            console.log(cases);

            $.ajax({
                url: "ajax/displayAjax.php",
                type: "POST",
                data: {
                    cases: cases,
                    onDate: onDate
                },
                success: function(data) {
                    // console.log(data);
                    // if (data) {
                    //     $("#tableData").html(data);
                    // } else {}
                }
            })
        })
    })
    </script>

</body>

</html>