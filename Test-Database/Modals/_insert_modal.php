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
                                                        placeholder="Add Category Name">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Short Name </label>
                                                    <input class="form-control" type="text" name="database_shortname" id="database_shortname"
                                                        placeholder="Add Short Category">
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Category </label>
                                                    <select class="form-select" name="database_category" id="database_category" aria-label="Default select example">
                                                        <option selected value="Open this select menu">Open this select menu</option>
                                                        <option value="Haematology">Haematology</option>
                                                        <option value="Biochemistry">Biochemistry</option>
                                                        <option value="Serology & Immunology">Serology & Immunology</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Unit </label>
                                                    <select class="form-select" name="database_unit" id="database_unit" aria-label="Default select example">
                                                        <option selected value="Open this select menu">Open this select menu</option>
                                                        <option value="%">%</option>
                                                        <option value="AU/mL">AU/mL</option>
                                                        <option value="cumm">cumm</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Input type </label>
                                                    <select class="form-select" name="database_input_type" id="database_input_type" aria-label="Default select example">
                                                        <option selected value="Open this select menu">Open this select menu</option>
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