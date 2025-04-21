<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Admin Login</h4>
                </div>

                <div class="card-body">
                    <form wire:submit.prevent="login">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" wire:model.defer="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" wire:model.defer="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" wire:model="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Login</button>
                        <div class="mt-3 text-center">
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>