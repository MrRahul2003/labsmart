    <!-- Add New Modal -->
    <div class="modal fade" id="Add_data" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">New Panel</h5>
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
                                                    <input class="form-control" type="text" name="panel_name"
                                                        id="panel_name" placeholder="Add Panel Name">
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Category </label>
                                                    <select class="form-select" name="panel_category"
                                                        id="panel_category" aria-label="Default select example">
                                                        <option selected value="Open this select menu">Open this select
                                                            menu</option>
                                                        <option value="Haematology">Haematology</option>
                                                        <option value="Biochemistry">Biochemistry</option>
                                                        <option value="Serology & Immunology">Serology & Immunology
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Tests </label>
                                                    <select class="form-select" name="panel_tests" id="panel_tests"
                                                        multiple aria-label="Default select example">
                                                        <option selected value="Open this select menu">Open this select
                                                            menu</option>
                                                        <option value="Hemogglobin">Hemogglobin</option>
                                                        <option value="Total Leukocyte Count">Total Leukocyte Count
                                                        </option>
                                                        <option value="Platelet Count">Platelet Count</option>
                                                    </select>
                                                    <small>----Select multiple tests by clicking ctrl+click----</small>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Fees </label>
                                                    <input class="form-control" type="text" name="panel_fees"
                                                        id="panel_fees" placeholder="Add Fees">
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>