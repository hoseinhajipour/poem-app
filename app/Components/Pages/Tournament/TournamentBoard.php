<?php

namespace App\Components\Pages\Tournament;

use App\Models\TournamentBoard as TournamentBoardModel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class TournamentBoard extends Component
{
    public $TournamentBoard;
    public $allowPlay = false;
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

        if ($this->Currenttournament->status == "play") {
            $this->allowPlay = true;

            if ($this->Currenttournament->first_user_id == auth()->user()->id) {
                if (isset($this->Currenttournament->first_user_true_answer)) {
                    $this->allowPlay = false;
                }
            }
            if ($this->Currenttournament->second_user_id == auth()->user()->id) {
                if (isset($this->Currenttournament->second_user_true_answer)) {
                    $this->allowPlay = false;
                }
            }
        } elseif ($this->Currenttournament->status == "complete") {
            $this->allowPlay = true;
        }


    }

    public function route()
    {
        return Route::get('/tournament/board/{id}')
            ->name('Tournament.board')
            ->middleware('auth');
    }

    public function render()
    {
        return view('pages.tournament.tournament-board');
    }

    public function GoChatPage()
    {
        if ($this->TournamentBoard->first_user_id == auth()->user()->id) {
            $userid = $this->TournamentBoard->second_user_id;
        } else {
            $userid = $this->TournamentBoard->first_user_id;
        }

        $this->redirect('/chat/' . $userid);
    }

    public function endGame()
    {
        $this->TournamentBoard->endgame = true;
        $this->TournamentBoard->save();
        $this->redirect('/home');
    }

    public function DoPlay()
    {
        if ($this->Currenttournament->status == "complete") {
            redirect()->to('/tournament/select-category/' . $this->TournamentBoard->id);
        } else {
            Session::put('current_tournament', $this->Currenttournament->id);
            redirect()->to('/tournament/play');
        }

    }
}
