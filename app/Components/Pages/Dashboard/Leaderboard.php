<?php

namespace App\Components\Pages\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Leaderboard extends Component
{
    public $users = [];

    public function route()
    {
        return Route::get('/leaderboards')
            ->name('leaderboards')
            ->middleware('auth');
    }

    public function render()
    {
        $this->users = User::where("id", "!=", 2)
            ->orderby('score', 'desc')
            ->get();
        return view('pages.dashboard.leaderboard');
    }
}
