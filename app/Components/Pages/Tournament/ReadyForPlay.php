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
    public $Currenttournament;
    public function mount($id)
    {
        $this->TournamentBoard = TournamentBoardModel::where('id', $id)
            ->with('firstUser')
            ->with('secondUser')
            ->with('tournament01')
            ->with('tournament02')
            ->with('tournament03')
            ->with('tournament04')
            ->with('tournament05')
            ->with('tournament06')
            ->first();

        $this->Currenttournament = $this->TournamentBoard->getAttribute('tournament0' . $this->TournamentBoard->current_turn);
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
            redirect()->to('/tournament/play/' . $this->Currenttournament->id . '?b=' . $this->TournamentBoard->id);
            return "play";
        } else {
            return $this->countDown;
        }
    }

}
