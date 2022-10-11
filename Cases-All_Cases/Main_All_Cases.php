<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main Cases-All Cases</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
    body {
        color: #1a202c;
        background-color: #e2e8f0;
    }

    .inner-wrapper {
        position: relative;
        height: calc(100vh - 1.5rem);
    }

    .inner-main,
    .inner-sidebar {
        position: absolute;
        top: 0;
        bottom: 0;
        display: flex;
        flex-direction: column;
    }

    .inner-sidebar {
        left: 0;
        width: 235px;
        border-right: 1px solid #cbd5e0;
        background-color: #fff;
        z-index: 1;
    }

    .inner-main {
        right: 0;
        left: 235px;
    }

    .inner-main-footer,
    .inner-main-header,
    .inner-sidebar-footer,
    .inner-sidebar-header {
        height: 3.5rem;
        border-bottom: 1px solid #cbd5e0;
        display: flex;
        align-items: center;
        padding: 0 1rem;
        flex-shrink: 0;
    }
    </style>
</head>

<body>
    <div class="">
        <div class="main-body p-0">
            <div class="inner-wrapper">
                <!-- Inner sidebar -->
                <div class="inner-sidebar">
                    <!-- Inner sidebar header -->
                    <div class="inner-sidebar-header justify-content-center">
                        <button class="btn btn-primary has-icon btn-block" type="button" data-toggle="modal"
                            data-target="#threadModal">
                            NEW CASE
                        </button>
                    </div>

                    <!-- Inner sidebar body -->
                    <div class="inner-sidebar-body p-0">
                        <div class="p-3 h-100" data-simplebar="init">
                            <div class="simplebar-wrapper" style="margin: -16px;">

                                <div class="simplebar-mask">
                                    <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                        <div class="simplebar-content-wrapper" style="height: 100%; ">
                                            <div class="simplebar-content" style="padding: 16px;">
                                                <nav class="nav nav-pills nav-gap-y-1 flex-column">
                                                    <a href=""
                                                        class="nav-link nav-link-faded has-icon active my-2">Dashboard</a>
                                                    <a href=""
                                                        class="nav-link nav-link-faded has-icon active my-2">Manage</a>
                                                    <a href=""
                                                        class="nav-link nav-link-faded has-icon active my-2">Cases</a>
                                                    <a href=""
                                                        class="nav-link nav-link-faded has-icon active my-2">Lab</a>
                                                    <a href=""
                                                        class="nav-link nav-link-faded has-icon active my-2">Business</a>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Inner main -->
                <div class="inner-main">
                    
                    <!-- Header -->
                    <div class="inner-main-header bg-white">
                        <span class="input-icon input-icon-sm ml-auto w-auto">
                            <div class="form-group">
                                <input class="form-control" type="text" id="email-for-pass" required=""
                                    name='category_edited_name' placeholder="search...">
                            </div>
                        </span>
                    </div>
                    
                    <!-- Table -->
                    <div class="inner-main-body p-2 p-sm-3 collapse forum-content show">
                        <?php
                            include 'Cases_All_Cases.php';
                        ?>
                    </div>
                </div>

            </div>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>
</body>

</html>