<?php
 include '../Partials/Connect.php'
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test_Database</title>
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
                        $sql = $conn->prepare("SELECT * FROM `test_database`");
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Short Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
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
            var database_name = $("#database_name").val();
            var database_shortname = $("#database_shortname").val();
            var database_category = $("#database_category").val();
            var database_unit = $("#database_unit").val();
            var database_input_type = $("#database_input_type").val();

            if (database_name == "" || database_shortname == "" || database_category == "" ||
                database_unit ==
                "" || database_input_type == "") {
                console.log("Enter some values");
            } else {
                $.ajax({
                    url: "ajax/insertAjax.php",
                    type: "POST",
                    data: {
                        database_name: database_name,
                        database_shortname: database_shortname,
                        database_category: database_category,
                        database_unit: database_unit,
                        database_input_type: database_input_type
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
            var database_id = $(this).data("database_id");
            var element = this;

            $.ajax({
                url: "ajax/deleteAjax.php",
                type: "POST",
                data: {
                    database_id: database_id
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