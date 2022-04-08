<div class="container">
    <input class="form-control fixed-top text-center"
           placeholder="جستجو نام کاربر"
           type="text">
    <div class="row" dir="rtl">

        @foreach($users as $user)
            <div class="col-12">
                <button class="btn3d btn btn-default form-control">
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
</div>
