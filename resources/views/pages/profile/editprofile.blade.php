<div class="container" dir="rtl">
    <form wire:submit.prevent="submit">
        <div align="center">
            <img class="avatar_img" src="{{ Voyager::image(auth()->user()->avatar) }}" width="64"/>
            <input type="file" wire:model.defer="image">
        </div>
        <label>نام کاری</label>
        <input type="text" wire:model.defer="username" class="form-control">

        <label>موبایل</label>
        <input type="text" wire:model.defer="mobile" class="form-control">

        <label>ایمیل</label>
        <input type="text" wire:model.defer="email" class="form-control">

        <label>بیو</label>
        <textarea cols="5" wire:model.defer="bio" class="form-control">

        </textarea>

        <button type="submit" class="btn3d btn btn-success form-control fixed-bottom">ذخیره</button>
    </form>
</div>

