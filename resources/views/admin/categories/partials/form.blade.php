<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <h4>Create new Category</h4>
        </div>
        <div class="card-body">
            <form
                method="post"
                action="{{route('categories.store')}}"
            >
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input
                        type="text"
                        name="name"
                        class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        tabindex="1"
                    >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea
                        class="form-control h-auto @error('description') is-invalid @enderror"
                        name="description"
                        tabindex="2"
                    ></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button
                    onclick="showLoading()"
                    type="submit"
                    class="btn btn-primary float-right"
                >
                    Save
                </button>
            </form>
        </div>
    </div>
</div>
