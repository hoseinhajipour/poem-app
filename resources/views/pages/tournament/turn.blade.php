<div class="row turn_row">
    <div class="col-4 text-center turn_circles">
        <i class="fas fa-circle gray_color @if($tournament && $tournament->first_user_true_answer>=1) green_color @endif"></i>
        <i class="fas fa-circle gray_color @if($tournament && $tournament->first_user_true_answer>=2) green_color @endif"></i>
        <i class="fas fa-circle gray_color @if($tournament && $tournament->first_user_true_answer>=3) green_color @endif"></i>
    </div>
    <div class="col-4 text-center">
        @if($tournament)
            <img src="{{ Voyager::image($tournament->category->icon) }}"
                 class="center" width="32"/>
            <p>{{$tournament->category->name}}</p>
        @else
            <span class="font_size_big">?</span>
        @endif
    </div>
    <div class="col-4 text-center turn_circles">
        <i class="fas fa-circle gray_color @if($tournament && $tournament->second_user_true_answer>=1) green_color @endif"></i>
        <i class="fas fa-circle gray_color @if($tournament && $tournament->second_user_true_answer>=2) green_color @endif"></i>
        <i class="fas fa-circle gray_color @if($tournament && $tournament->second_user_true_answer>=3) green_color @endif"></i>
    </div>
</div>
