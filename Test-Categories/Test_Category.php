<?php
 include '../Partials/Connect.php'
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test_Categories</title>
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

    <?php include 'Modals/_insert_modal.php' ?>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-3">
                    <?php 
                        $sql = 'SELECT * FROM `test_categories`';
                        $result = mysqli_query($conn,$sql) OR Die('query Failed');
                        $rowNo = mysqli_num_rows($result);
                    ?>
                    <h1 class="card-title">Test Categories <span class="text-muted fw-normal ms-2">(<?php echo $rowNo ?>)</span></h1>
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
                                    <th scope="col">Shot Name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql = 'SELECT * FROM `test_categories`';
                                    $result = mysqli_query($conn,$sql) OR Die('query Failed');
                                    if (mysqli_num_rows($result)>0) {
                                        $i = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $i++;
                                            $category_id = $row['category_id'];
                                            echo
                                            '<tr>
                                                <td>'.$i.'</td>
                                                <td><a href="#" class="text-body">'.$row['category_edited_name'].'</a></td>
                                                <td><span class="badge badge-soft-success mb-0">'.$row['category_shortname'].'</span></td>
                                                <td>
                                                    <a href="Test_Categories/Edit_Category.php?category_id='.$category_id.'" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Edit" class="px-2 text-primary"><i
                                                            class="bx bx-pencil font-size-18"></i></a>
                                                </td>
                                                <td>
                                                    <a href="Test_Categories/Delete_Category.php?category_id='.$category_id.'" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Delete" class="px-2 text-danger"><i
                                                            class="bx bx-trash-alt font-size-18"></i></a>
                                                </td>
                                            </tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>