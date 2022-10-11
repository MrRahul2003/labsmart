<?php
 include '../Partials/Connect.php'
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All Cases</title>
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

    <?php include 'form/_search_cases.php' ?>

    <div class="container" id="category_main_container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <?php 
                        $sql = "SELECT * FROM `patient`";
                        $result = mysqli_prepare($conn,$sql);
                        mysqli_stmt_bind_result($result, $p_id, $title, 
                        $fname, $lname, $aadhar, $email, $mobile, $years, $months, $p_days, 
                        $p_address, $report, $gender, $p_date, $curr_time);
                        mysqli_stmt_execute($result);  // stores result
                        mysqli_stmt_store_result($result);

                        $rowNo = mysqli_stmt_num_rows($result);
                        $row = mysqli_stmt_fetch($result)
                    ?>
                    <h1 class="card-title">Test Categories <span
                            class="text-muted fw-normal ms-2">(<?php echo $rowNo ?>)</span></h1>
                </div>
            </div>
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

        // inserting the records after clicking insertBtn
        $("#insertBtn").on("click", function() {
            // e.preventDefault();

            var category_name = $("#category_name").val();
            var category_shortname = $("#category_shortname").val();

            if (category_name == "" || category_shortname == "") {
                console.log("Enter some values");
            } else {
                $.ajax({
                    url: "ajax/insertAjax.php",
                    type: "POST",
                    data: {
                        category_name: category_name,
                        category_shortname: category_shortname
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 1) {
                            display();
                            $("#formData").trigger("reset");
                            console.log("success");
                        } else {
                            console.log("unsuccess");
                        }
                    }
                })
            }
        })

        // Deleting the recordviewModal
        $(document).on("click", "#deleteBtn", function() {
            // e.preventDefault();
            var category_id = $(this).data("category_id");
            var element = this;
            console.log(category_id);

            $.ajax({
                url: "ajax/deleteAjax.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                success: function(data) {
                    console.log(data);
                    if (data == 1) {
                        display();
                        console.log("Deleted data");
                    } else {
                        console.log("Cannot delete data");
                    }
                }
            })
        })
    })
    </script>

</body>

</html>