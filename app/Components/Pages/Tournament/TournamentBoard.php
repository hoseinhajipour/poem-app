<?php

namespace App\Components\Pages\Tournament;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class TournamentBoard extends Component
{
    public function route()
    {
        return Route::get('/tournament/board')
            ->name('Tournament.board')
            ->middleware('auth');
    }
    public function render()
    {
        return view('pages.tournament.tournament-board');
    }
}
