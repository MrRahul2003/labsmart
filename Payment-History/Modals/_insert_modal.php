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
                                                <div class="col-md-6 form-group mt-2">
                                                    <label class="mx-2"> SrNo </label>
                                                    <input class="form-control" type="number" name="srno"
                                                        id="srno" placeholder="Add Serial No" required>
                                                </div>

                                                <div class="col-md-6 form-group mt-2">
                                                    <label class="mx-2"> User Id </label>
                                                    <input class="form-control" type="number" name="user_id"
                                                        id="user_id" placeholder="Add User Id">
                                                </div>

                                                <div class="col-md-6 form-group mt-2">
                                                    <label class="mx-2"> Device Name </label>
                                                    <input class="form-control" type="text" name="device_name"
                                                        id="device_name" placeholder="Add Device Name" required>
                                                </div>

                                                <div class="col-md-6 form-group mt-2">
                                                    <label class="mx-2"> Payment Id </label>
                                                    <input class="form-control" type="text" name="payment_id"
                                                        id="payment_id" placeholder="Add Payment Id" required>
                                                </div>

                                                <div class="col-md-6 form-group mt-2">
                                                    <label class="mx-2"> Status </label>
                                                    <select class="form-select" name="status" id="status"
                                                        aria-label="Default select example">
                                                        <option value="Success">Success</option>
                                                        <option value="Canceled">Canceled</option>
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
                                                    <label class="mx-2"> Paid On </label>
                                                    <input class="form-control" type="date" id="paid_on" name="paid_on">
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