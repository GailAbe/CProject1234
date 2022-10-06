<form wire:submit.prevent="update">
    <div wire:ignore.self class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit New Official</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label>Full Name
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="fullname" placeholder="Enter First Name"
                                wire:model="fullname" />
                        </div>
                        <div class="form-group">
                            <label>Position
                                <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="position" placeholder="Position"
                                wire:model="position" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-danger font-weight-bold"
                        data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary font-weight-bold">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
