<div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    id="updateMedia"
>
    <div class="modal-dialog" role="document">
        <form
            method="POST"
            id="formUpdateMedia"
        >
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Media</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-3">
                        <label>Media display name</label>
                        <input type="text" name="display_name" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="updateProcess('updateMedia')">Update Media</button>
                </div>
            </div>
        </form>
    </div>
</div>
