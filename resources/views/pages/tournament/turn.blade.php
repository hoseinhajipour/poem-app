<div class="row">
    <div class="col-5 text-center">
        <i class="fas fa-circle @if($tournament && $tournament->first_user_true_answer>=1) green_color @endif"></i>
        <i class="fas fa-circle @if($tournament && $tournament->first_user_true_answer>=2) green_color @endif"></i>
        <i class="fas fa-circle @if($tournament && $tournament->first_user_true_answer>=3) green_color @endif"></i>
    </div>
    <div class="col-2">
        @if($tournament)
            <img src="{{ Voyager::image($tournament->category->icon) }}"
                 class="center" width="32"/>
            <p>{{$tournament->category->name}}</p>
        @endif
    </div>
    <div class="col-5">
        <i class="fas fa-circle @if($tournament && $tournament->second_user_true_answer>=1) green_color @endif"></i>
        <i class="fas fa-circle @if($tournament && $tournament->second_user_true_answer>=2) green_color @endif"></i>
        <i class="fas fa-circle @if($tournament && $tournament->second_user_true_answer>=3) green_color @endif"></i>
    </div>
</div>
