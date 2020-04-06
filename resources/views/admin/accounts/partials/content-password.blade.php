<div class="col-12 col-md-6 p-2">
    <div class="bg-white p-5 h-100">
        <h5>Password</h5>
        <p>Update your password to save your account!</p>
        <form method="POST" action="{{url('/accounts/password')}}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="old-password" class="control-label">{{ __('Old Password') }}</label>
                <input
                    id="old-password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    required
                >
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">{{ __('New Password') }}</label>
                </div>
                <input
                    id="password"
                    type="password"
                    class="form-control @error('new_password') is-invalid @enderror"
                    name="new_password"
                    required
                >
                @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password-confirm" class="control-label">{{ __('Confirm new Password') }}</label>
                <input
                    id="password-confirm"
                    type="password"
                    class="form-control @error('new_password_confirmation') is-invalid @enderror"
                    name="new_password_confirmation"
                    required
                >
                @error('new_password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right">
                    {{ __('Change Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
