<div class="container">
    <div class="text-center">
        <div align="center">
            <img src="{{ Voyager::image($user->avatar) }}" width="64"/>
        </div>
        <b>{{$user->name}}</b>
    </div>

    <button class="btn btn-primary form-control" wire:click="followUnfollow()">{{$followStatus}}</button>
</div>

