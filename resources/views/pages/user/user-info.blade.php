<div class="container">

    <div class="row">
        <div class="col-3">
            <div class="text-center">
                <div align="center">
                    <img class="avatar_img" src="{{ Voyager::image($user->avatar) }}" width="64"/>
                </div>
            </div>
        </div>
        <div class="col-3 text-center">
            {{$user->score}}
            <p>Score</p>
        </div>
        <div class="col-3 text-center">
            {{$following_count}}
            <p>following</p>
        </div>
        <div class="col-3 text-center">
            {{$follower_count}}
            <p>follower</p>
        </div>
    </div>
    <div>
        <b>{{$user->name}}</b>
        <b>{{$user->bio}}</b>
    </div>
    <div class="row">
        <div class="col-6">
            <button class="btn3d btn btn-primary form-control" wire:click="followUnfollow()">{{$followStatus}}</button>
        </div>
        <div class="col-6">

            <button class="btn3d btn btn-default form-control" wire:click="GoChatPage()">چت</button>
        </div>

    </div>


</div>

