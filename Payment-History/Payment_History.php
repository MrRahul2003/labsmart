<?php
 include '../Partials/Connect.php'
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment History</title>
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

    <?php include 'Modals/_insert_modal.php'; ?>

    <div class="container" id="database_main_container">
        <div class="mb-4 row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <h2 class="card-title"> Search </h2>
                </div>
            </div>
        </div>

        <form class="container my-2" action="Update_Database.php" id="filter_formData" method="POST">

            <div class="row g-3">

                <div class="container col-md-12 form-group">
                    <input class="form-control" id="search_filter" type="text" name='search_filter'
                        placeholder="Search by name/ surname/ regno/ gender">
                </div>

                <div class="container mt-3">
                    <button class="btn btn-primary" type="submit" name="filter_searchBtn"
                        id="filter_searchBtn">Search</button>
                </div>

            </div>
        </form>
        <hr>
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <?php 
                        $sql = $conn->prepare("SELECT * FROM `payment_history`");
                        $sql -> execute();
                        $result = $sql->get_result();
                        
                        $row = $result -> fetch_assoc();
                        $rowNo = mysqli_num_rows($result);
                    ?>
                    <h1 class="card-title">Test Database <span
                            class="text-muted fw-normal ms-2">(<?php echo $rowNo ?>)</span></h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">

                    <div>
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Add_data"><i
                                class="bx bx-plus me-1"></i> Add New </a>
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
                                    <th scope="col">S.No.</th>
                                    <th scope="col">User Id</th>
                                    <th scope="col">Device Name</th>
                                    <th scope="col">Paid on</th>
                                    <th scope="col">Payment Id</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Edit</th>
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
        $("#insertBtn").on("click", function(e) {
            // e.preventDefault();
            var srno = $("#srno").val();
            var user_id = $("#user_id").val();
            var device_name = $("#device_name").val();
            var status = $("#status").val();
            var payment = $("#payment").val();
            var payment_id = $("#payment_id").val();
            var paid_on = $("#paid_on").val();

            console.log(srno);
            console.log(user_id);
            console.log(device_name);
            console.log(status);
            console.log(payment);
            console.log(payment_id);
            console.log(paid_on);

            if (user_id == "" || srno == "" ||
                device_name == "" || status == "" || payment == "" ||  payment_id == "" ||
                paid_on == "") {
                console.log("Enter some values");
            } else {
                $.ajax({
                    url: "ajax/insertAjax.php",
                    type: "POST",
                    data: {
                        srno: srno,
                        user_id: user_id,
                        device_name: device_name,
                        status: status,
                        payment: payment,
                        payment_id: payment_id,
                        paid_on: paid_on
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 1) {
                            display();
                            // $("#formData").trigger("reset");
                            console.log("success");
                        } else {
                            console.log("unsuccess");
                        }
                    }
                })
            }

        })

        // Deleting the recordviewModal
        $(document).on("click", "#deleteBtn", function(e) {
            // e.preventDefault();
            var repair_Id = $(this).data("id");
            var element = this;
            console.log(repair_Id);

            $.ajax({
                url: "ajax/deleteAjax.php",
                type: "POST",
                data: {
                    repair_Id: repair_Id
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