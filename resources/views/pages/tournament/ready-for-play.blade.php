<div class="container">
    <div class="row">
        <div class="col-6 text-center">
            <div align="center">
                <img src="{{ Voyager::image( $TournamentBoard->firstUser->avatar) }}" width="64"/>
            </div>
            <b>{{$TournamentBoard->firstUser->name}}</b>
        </div>
        <div class="col-6 text-center">
            <div align="center">
                <img src="{{ Voyager::image($TournamentBoard->secondUser->avatar) }}" width="64"/>
            </div>
            <b>{{$TournamentBoard->secondUser->name}}</b>
        </div>
    </div>


    <div class="text-center alert alert-success" wire:poll>
        <b style="font-size: 85px">{{$this->countDownForPlay()}}</b>
    </div>
</div>

