<div class="container" style="padding-bottom: 60px">
    <div wire:poll>
        <div class="turn_card">
            <div class="row">
                <div class="col-4 text-center">
                    <div align="center">
                        <img class="avatar_img" src="{{ Voyager::image($TournamentBoard->firstUser->avatar) }}"
                             width="64"/>
                    </div>
                    <b>{{$TournamentBoard->firstUser->name}}</b>
                </div>
                <div class="col-4 text-center">
                    <div class="winner_result">
                        <span>{{$TournamentBoard->first_user_win?$TournamentBoard->first_user_win:0 }}</span>
                        <span> - </span>
                        <span>{{$TournamentBoard->second_user_win?$TournamentBoard->second_user_win:0}}</span>
                    </div>
                </div>
                <div class="col-4 text-center">
                    <div align="center">
                        <img class="avatar_img" src="{{ Voyager::image($TournamentBoard->secondUser->avatar) }}"
                             width="64"/>
                    </div>
                    <b>{{$TournamentBoard->secondUser->name}}</b>
                </div>
            </div>
        </div>
        <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament01" key="{{ now() }}"/>
        <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament02" key="{{ now() }}"/>
        <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament03" key="{{ now() }}"/>
        <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament04" key="{{ now() }}"/>
        <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament05" key="{{ now() }}"/>
        <livewire:pages.tournament.turn :tournament="$TournamentBoard->tournament06" key="{{ now() }}"/>

        <div class="fixed-bottom">
            <div class="row">
                <div class="col-4">
                    <button wire:click="GoChatPage()" class="btn btn-primary form-control">??????????</button>
                </div>
                <div class="col-4">
                    <button @if($allowPlay==false) disabled @endif wire:click="DoPlay()"
                            class="btn btn-success form-control">???????? ????
                    </button>
                </div>
                <div class="col-4">
                    <button wire:click="endGame()" class="btn btn-danger form-control">??????????</button>
                </div>
            </div>
        </div>
    </div>
</div>
