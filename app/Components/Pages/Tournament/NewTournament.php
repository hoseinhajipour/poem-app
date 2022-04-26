<?php

namespace App\Components\Pages\Tournament;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class NewTournament extends Component
{
    public function route()
    {
        return Route::get('/tournament/new')
            ->name('Tournament.new')
            ->middleware('auth');
    }
    public function render()
    {
        return view('pages.tournament.new-tournament');
    }

    public function PlayWithRandomPlayer(){
        redirect()->to('/tournament/board');
    }
    public function GoSearchUserPage()
    {
        return redirect()->to('/search/user-list');
    }
}
