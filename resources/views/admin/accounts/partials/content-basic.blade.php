<div class="col-12 col-md-6 p-2">
    <div class="bg-white p-5 h-100">
        <h5>Basic</h5>
        <p>Update your basic profile information!</p>
        <form method="POST" action="{{url('/accounts/basic')}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="d-block">
                    <label for="email" class="control-label">{{ __('Name') }}</label>
                </div>
                <input
                    id="name"
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    value="{{$user->name}}"
                    required
                    autocomplete="name"
                    tabindex="1"
                    autofocus
                >
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="d-block">
                    <label for="email" class="control-label">{{ __('Username') }}</label>
                </div>
                <input
                    id="username"
                    type="text"
                    class="form-control @error('username') is-invalid @enderror"
                    name="username"
                    value="{{$user->username}}"
                    disabled
                >
                @error('name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="d-block">
                    <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                </div>
                <input
                    id="email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    name="email"
                    value="{{$user->email}}"
                    disabled
                >
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group text-right" >
                <button type="submit" id="submit-basic" class="btn btn-primary btn-lg btn-icon icon-right">
                    {{ __('Save Changes') }}
                </button>
            </div>
        </form>
    </div>
</div>
