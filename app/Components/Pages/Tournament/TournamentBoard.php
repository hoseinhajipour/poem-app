<?php

namespace App\Components\Pages\Tournament;

use App\Models\TournamentBoard as TournamentBoardModel;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class TournamentBoard extends Component
{
    public $TournamentBoard;

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
}
