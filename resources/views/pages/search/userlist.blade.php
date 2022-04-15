<div class="container">
    <input class="form-control fixed-top text-center"
           wire:model="username"
           placeholder="جستجو نام کاربر"
           type="text">
    <div class="row" dir="rtl">

        @foreach($users as $user)
            <div class="col-12">
                <button class="btn3d btn btn-default form-control"
                        wire:click="SelectUser({{$user->id}})"
                        data-bs-toggle="modal" data-bs-target="#showUserInfo">
                    <div class="row">
                        <div class="col-1">{{$loop->index+1}}</div>
                        <div class="col-2">
                            <img src="{{ Voyager::image($user->avatar) }}" width="64"/>
                        </div>
                        <div class="col-7 text-end">{{$user->name}}</div>
                        <div class="col-2">{{$user->score}}</div>

                    </div>
                </button>
            </div>
        @endforeach
    </div>

    <div wire:ignore.self class="modal fade" id="showUserInfo" tabindex="-1" aria-labelledby="showUserInfo"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <button
                                wire:click="showCurrentUserProfile()"
                                data-turbolinks="false"
                                data-bs-dismiss="modal"
                                class="btn3d btn btn-magick form-control"
                            >پروفایل
                            </button>
                        </div>
                        <div class="col-6">
                            <button class="btn3d btn btn-magick form-control"
                                    wire:click="PlayWithCurrentUser()"
                                    data-bs-dismiss="modal">بازی
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
