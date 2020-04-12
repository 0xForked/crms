<div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    id="submitMedia"
>
    <div class="modal-dialog" role="document">
        <form
            method="POST"
            action="{{ route('media.store') }}"
            id="formSubmitMedia"
            enctype="multipart/form-data"
        >
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload new Media</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Media file</label>
                        <div class="custom-file text-left" >
                            <input type="file" name="file" class="custom-file-input" id="media-file" required>
                            <label class="custom-file-label" id="media-file-label">Choose</label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label>Media display name</label>
                        <input type="text" name="display_name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Media</button>
                </div>
            </div>
        </form>
    </div>
</div>
