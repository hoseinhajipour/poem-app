<?php

namespace App\Components\Pages\Tournament;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Play extends Component
{
    public function route()
    {
        return Route::get('/tournament/play')
            ->name('Tournament.Play')
            ->middleware('auth');
    }
    public function render()
    {
        return view('pages.tournament.play');
    }
}
