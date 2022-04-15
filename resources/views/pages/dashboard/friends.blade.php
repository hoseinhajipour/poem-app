<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#followers"
                    type="button" role="tab" aria-controls="home" aria-selected="true">followers
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#following"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">following
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="followers" role="tabpanel" aria-labelledby="profile-tab">
            @foreach($followers as $user)
                <div class="col-12">
                    <a href="/user/{{$user->id}}"
                       data-turbolinks="false"
                       class="btn3d btn btn-default form-control">
                        <div class="row">
                            <div class="col-2">
                                @if($user->avatar)
                                    <img class="avatar_img" src="{{ Voyager::image($user->avatar) }}" width="64"/>
                                @endif
                            </div>
                            <div class="col-8 text-end">{{$user->name}}</div>
                            <div class="col-2">{{$user->score}}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="contact-tab">
            @foreach($following as $user)
                <div class="col-12">
                    <a href="/user/{{$user->id}}"
                       data-turbolinks="false"
                       class="btn3d btn btn-default form-control">
                        <div class="row">
                            <div class="col-2">
                                @if($user->avatar)
                                    <img class="avatar_img" src="{{ Voyager::image($user->avatar) }}" width="64"/>
                                @endif
                            </div>
                            <div class="col-8 text-end">{{$user->name}}</div>
                            <div class="col-2">{{$user->score}}</div>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


</div>
