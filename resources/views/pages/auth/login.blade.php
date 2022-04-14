@section('title', 'Login')

<div class="d-grid col-lg-4 mx-auto" dir="rtl">
    <div class="card">

        <form wire:submit.prevent="login" class="card-body text-center">
            <div class="mb-3">
                <label for="email" class="form-label">ایمیل</label>
                <input type="email" id="email" wire:model.defer="email"
                       class="form-control text-center @error('email') is-invalid @enderror">
                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">کلمه عبور</label>
                <input type="password" id="password" wire:model.defer="password"
                       class="form-control text-center @error('password') is-invalid @enderror">
                @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="d-flex justify-content-between mb-3 text-center">
                <div class="form-check d-none">
                    <input type="checkbox" id="remember" wire:model.defer="remember"
                           checked
                           class="form-check-input">
                    <label for="remember" class="form-check-label">Remember me</label>
                </div>

                <a href="{{ route('password.forgot') }}" class="d-block">بازیابی کلمه عبور</a>
            </div>

            <button type="submit" class="btn3d btn btn-primary w-100">ورود</button>
        </form>
    </div>
</div>
