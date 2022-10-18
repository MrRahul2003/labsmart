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
                                            <div class="row g-3">
                                                <div class="form-group mt-2">
                                                    <input class="form-control" type="hidden" name="user_id"
                                                        id="user_id" value="1">
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label class="mx-2"> Device Id </label>
                                                    <input class="form-control" type="number" name=""
                                                        id="device_id" placeholder="Add Device Id" required>
                                                </div>

                                                <div class="col-md-6 form-group mt-2">
                                                    <label class="mx-2"> Device Category </label>
                                                    <input class="form-control" type="text" name="device_cat"
                                                        id="device_cat" placeholder="Add Device Category" required>
                                                </div>

                                                <div class="col-md-6 form-group mt-2">
                                                    <label class="mx-2"> Device Name </label>
                                                    <input class="form-control" type="text" name="device_name"
                                                        id="device_name" placeholder="Add Device Name" required>
                                                </div>

                                                <div class="col-md-6 form-group mt-2">
                                                    <label class="mx-2"> Status </label>
                                                    <select class="form-select" name="status" id="status"
                                                        aria-label="Default select example">
                                                        <option value="Repair">Repair</option>
                                                        <option value="Pending">Pending</option>
                                                        <option value="Done">Done</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6 form-group mt-2">
                                                    <label class="mx-2"> Payment </label>
                                                    <select class="form-select" name="payment" id="payment"
                                                        aria-label="Default select example">
                                                        <option value="Yes">Yes</option>
                                                        <option value="No">No</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label class="mx-2"> Date Selected </label>
                                                    <input class="form-control" type="date" id="date_selected" name="date_selected">
                                                </div>

                                                <div class="col-md-6 form-group">
                                                    <label class="mx-2"> Submit On </label>
                                                    <input class="form-control" type="date" id="submit_on" name="submit_on">
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