    <!-- Add New Modal -->
    <div class="modal fade" id="Add_data" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="py-1">

                            <form class="form">
                                <div class="row">
                                    <div class="col">

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Name </label>
                                                    <input class="form-control" type="text" name="database_name" id="database_name"
                                                        placeholder="Add Category Name" required>
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Short Name </label>
                                                    <input class="form-control" type="text" name="database_shortname" id="database_shortname"
                                                        placeholder="Add Short Category" required>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Category </label>
                                                    <select class="form-select" name="database_category" id="database_category" aria-label="Default select example">
                                                        <option selected value="-">Open this select menu</option>
                                                        <?php 
                                                            $sql = "SELECT * FROM `test_categories`";
                                                            $result = mysqli_prepare($conn,$sql);
                                                            mysqli_stmt_bind_result($result, $login_user_id, $category_id, 
                                                            $category_name, $category_edited_name, $category_shortname, $category_date, $category_time);
                                                            mysqli_stmt_execute($result);  // stores result
                                                            mysqli_stmt_store_result($result);

                                                            if (mysqli_stmt_num_rows($result)>0) {
                                                                while ($row = mysqli_stmt_fetch($result)) {
                                                                    echo '<option value="'.$category_edited_name.'">'.$category_edited_name.'</option>';
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Unit </label>
                                                    <select class="form-select" name="database_unit" id="database_unit" aria-label="Default select example">
                                                        <option selected value="-">Open this select menu</option>
                                                        <option value="%">%</option>
                                                        <option value="AU/mL">AU/mL</option>
                                                        <option value="cumm">cumm</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Input type </label>
                                                    <select class="form-select" name="database_input_type" id="database_input_type" aria-label="Default select example">
                                                        <option selected value="-">Open this select menu</option>
                                                        <option value="Numeric">Numeric</option>
                                                        <option value="Single Line">Single Line</option>
                                                        <option value="Paragraph">Paragraph</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col d-flex justify-content-end">
                                        <button type="submit" id="insertBtn" class="btn btn-primary">Add Now ! </button>
                                    </div>
                                </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>