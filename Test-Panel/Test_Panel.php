<?php
 include '../Partials/Connect.php'
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test_Panels</title>
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

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <?php 
                        $sql = 'SELECT * FROM `test_panel`';
                        $result = mysqli_query($conn,$sql) OR Die('query Failed');
                        $rowNo = mysqli_num_rows($result);
                    ?>
                    <h1 class="card-title">Test Panels <span
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
                                    <th scope="col">Order</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Tests</th>
                                    <th scope="col">Ratelist entries</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                    <th scope="col">View</th>
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
            var panel_name = $("#panel_name").val();
            var panel_category = $("#panel_category").val();
            var panel_tests = $("#panel_tests").val();
            var panel_fees = $("#panel_fees").val();

            if (panel_name == "" || panel_category == "" || panel_tests == "" || panel_fees == "") {
                console.log("Enter some values");
            } else {
                $.ajax({
                    url: "ajax/insertAjax.php",
                    type: "POST",
                    data: {
                        panel_name: panel_name,
                        panel_category: panel_category,
                        panel_tests: panel_tests,
                        panel_fees: panel_fees
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 1) {
                            // display();
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
            var panel_id = $(this).data("panel_id");
            var element = this;

            $.ajax({
                url: "ajax/deleteAjax.php",
                type: "POST",
                data: {
                    panel_id: panel_id
                },
                success: function(data) {
                    console.log(data);
                    // if (data == 1) {
                    //     display();
                    //     console.log("Deleted data");
                    // } else {
                    //     console.log("Cannot delete data");
                    // }
                }
            })
        })

    })
    </script>
</body>

</html>