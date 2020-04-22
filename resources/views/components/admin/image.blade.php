<div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    id="mediaModal"
>
    <div
        class="modal-dialog modal-lg"
        role="document"
    >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">List media!</h5>
                <input
                    type="text"
                    name="search-media"
                    id="search-media"
                    class="form-control"
                    style="width: 250px;"
                    placeholder="Search image here . . . .">
            </div>
            <div class="modal-body">
                <h5 class="mt-5 text-center d-none" id="media-loading-message">Loading media . . .</h5>
                <div class="row" id="media-modal-container"></div>
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
                    type="button"
                    class="btn btn-primary"
                    id="media-button-modal"
                >
                    Get Link
                </button>
            </div>
        </div>
    </div>
</div>
