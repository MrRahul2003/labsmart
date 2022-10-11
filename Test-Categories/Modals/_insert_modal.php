<!-- Modal -->
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

                        <form class="form" id="formData">
                            <div class="row">
                                <div class="col">

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mt-2">
                                                <label class="mx-2"> Name </label>
                                                <input class="form-control" type="text" name="category_name" id="category_name"
                                                    placeholder="Add Category Name" required>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label class="mx-2"> Short Name </label>
                                                <input class="form-control" type="text" name="category_shortname" id="category_shortname"
                                                    placeholder="Add Short Category" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col d-flex justify-content-end">
                                    <button type="submit" id="insertBtn" name="insert" class="btn btn-primary">Add Now ! </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>