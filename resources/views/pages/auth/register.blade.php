@section('title', 'ثبت نام')

<div class="d-grid col-lg-4 mx-auto">
    <div class="card">
        <form wire:submit.prevent="register" class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">نام کاربری</label>
                <input type="text" id="name" wire:model.defer="name"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">ایمیل</label>
                <input type="email" id="email" wire:model.defer="email"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">پسورد</label>
                <input type="password" id="password" wire:model.defer="password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <x-honey/>

            <button type="submit" class="btn3d btn btn-success fixed-bottom w-100">ثبت</button>
        </form>
    </div>
</div>
