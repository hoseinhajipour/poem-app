<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div align="center">
                        <img src="{{ Voyager::image($TournamentBoard->firstUser->avatar) }}" width="64"/>
                    </div>
                    <b>{{$TournamentBoard->firstUser->name}}</b>
                </div>
                <div class="col-4">
                    {{$TournamentBoard->first_user_win }} - {{$TournamentBoard->second_win}}
                </div>
                <div class="col-4">
                    <div align="center">
                        <img src="{{ Voyager::image($TournamentBoard->secondUser->avatar) }}" width="64"/>
                    </div>
                    <b>{{$TournamentBoard->secondUser->name}}</b>
                </div>
            </div>
        </div>
    </div>

    <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament01"/>
    <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament02"/>
    <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament03"/>
    <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament04"/>
    <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament05"/>
    <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament06"/>

    <div class="fixed-bottom">
        <div class="row">
            <div class="col-4">
                <button wire:click="GoChatPage()" class="btn btn-primary form-control">گفتگو</button>
            </div>
            <div class="col-4">
                <button class="btn btn-success form-control">بازی کن</button>
            </div>
            <div class="col-4">
                <button class="btn btn-danger form-control">تسلیم</button>
            </div>
        </div>
    </div>
</div>
