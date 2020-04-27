<div
    class="modal fade"
    tabindex="-1"
    role="dialog"
    id="createCustomer"
>
    <div
        class="modal-dialog"
        role="document"
    >
        <form
            method="POST"
            action="{{route('customers.store')}}"
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
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Phone number</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <select name="country_id" class="form-control">
                            @foreach(countries() as $item)
                                <option
                                    value="{{$item['id']}}"
                                    {{ ($item['id'] == 102) ? 'selected' : '' }}
                                >{{$item['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>State</label>
                        <input type="text" class="form-control" name="state">
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="city">
                    </div>
                    <div class="form-group">
                        <label>Street address</label>
                        <textarea name="address_street_1" class="form-control" style="height: 60px"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Street address line 2</label>
                        <textarea name="address_street_2" class="form-control" style="height: 60px"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Postal/Zip code</label>
                        <input type="text" class="form-control" name="zip">
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
                        onclick="updateProcess('createCustomer')"
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
