<?php
 include '../Partials/Connect.php'
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sample_Table.php</title>
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
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <?php 
                        $sql = $conn->prepare("SELECT * FROM `sample_table`");
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
                                    <th scope="col">Device Category</th>
                                    <th scope="col">Device Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Date Selected</th>
                                    <th scope="col">Submit on</th>
                                    <th scope="col">View</th>
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
            var user_id = $("#user_id").val();
            var device_id = $("#device_id").val();
            var device_cat = $("#device_cat").val();
            var device_name = $("#device_name").val();
            var status = $("#status").val();
            var payment = $("#payment").val();
            var date_selected = $("#date_selected").val();
            var submit_on = $("#submit_on").val();

            console.log(user_id);
            console.log(device_id);
            console.log(device_cat);
            console.log(device_name);
            console.log(status);
            console.log(payment);
            console.log(date_selected);
            console.log(submit_on);

            if (user_id == "" || device_id == "" || device_cat == "" ||
            device_name == "" || status == "" || payment == "" || date_selected == "" || submit_on == "") {
                console.log("Enter some values");
            } else {
                $.ajax({
                    url: "ajax/insertAjax.php",
                    type: "POST",
                    data: {
                        user_id: user_id,
                        device_id: device_id,
                        device_cat: device_cat,
                        device_name: device_name,
                        status: status,
                        payment: payment,
                        date_selected: date_selected,
                        submit_on: submit_on
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
        $(document).on("click", "#deleteBtn", function() {
            var id = $(this).data("id");
            var element = this;

            $.ajax({
                url: "ajax/deleteAjax.php",
                type: "POST",
                data: {
                    id: id
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