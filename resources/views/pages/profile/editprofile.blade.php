<div class="container" dir="rtl">
    <form wire:submit.prevent="submit">
        <div align="center">
            <img src="{{ Voyager::image(auth()->user()->avatar) }}" width="64"/>
        </div>
        <label>نام کاری</label>
        <input type="text" wire:model.defer="username" class="form-control">
        <button type="submit" class="btn3d btn btn-success form-control">ذخیره</button>
    </form>
</div>

