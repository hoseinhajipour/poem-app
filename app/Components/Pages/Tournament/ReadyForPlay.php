<?php

namespace App\Components\Pages\Tournament;

use App\Models\TournamentBoard as TournamentBoardModel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ReadyForPlay extends Component
{
    public $countDown = 3;
    public $TournamentBoard;
    public $matchUser;

    public function mount($id)
    {
        $this->TournamentBoard = TournamentBoardModel::where('id', $id)
            ->with('tournament01')
            ->first();
        Session::put('current_tournament', $this->TournamentBoard->tournament_01);
        $this->matchUser = $this->TournamentBoard->tournament01->secondUser;
    }

    public function route()
    {
        return Route::get('/tournament/ready-for-play/{id}')
            ->name('Tournament.ReadyForPlay')
            ->middleware('auth');
    }


    public function render()
    {
        return view('pages.tournament.ready-for-play');
    }

    public function countDownForPlay()
    {
        $this->countDown--;
        if ($this->countDown <= 0) {
            redirect()->to('/tournament/play');
            return "play";
        } else {
            return $this->countDown;
        }
    }

}
