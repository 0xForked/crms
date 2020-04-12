<div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    id="editCategory"
>
    <div
        class="modal-dialog"
        role="document"
    >
        <form
            method="POST"
            id="formEditCategory"
        >
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Update Category!
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control h-auto" name="description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >
                        Close
                    </button>

                    <button
                        onclick="updateProcess('editCategory')"
                        type="submit"
                        class="btn btn-primary"
                    >
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
