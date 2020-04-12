<div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    id="createCustomer"
>
    <div
        class="modal-dialog modal-lg"
        role="document"
    >
        <form
            method="POST"
            id="formCreateCustomer"
        >
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Create new Customer!
                    </h5>
                </div>
                <div class="modal-body">

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
                        onclick="updateProcess('formCreateCustomer')"
                        type="submit"
                        class="btn btn-primary"
                    >
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
