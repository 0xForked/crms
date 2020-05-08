<div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    id="selectCustomerModal"
>
    <div
        class="modal-dialog"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Select Customer!
                </h5>
                <input
                    type="text"
                    name="search-customer"
                    id="search-customer"
                    class="form-control"
                    style="width: 170px;"
                    placeholder="Search customer . . . .">
            </div>
            <div class="modal-body">
                <h5 class="mt-5 text-center d-none" id="customer-loading-message">
                    Loading customer . . .
                </h5>
                <table class="mt-3" id="customer-table-container"></table>
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
                    type="submit"
                    class="btn btn-primary"
                    id="customer-button-modal"
                >
                    Select
                </button>
            </div>
        </div>
    </div>
</div>
