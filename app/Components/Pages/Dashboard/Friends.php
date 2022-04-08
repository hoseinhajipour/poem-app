<?php

namespace App\Components\Pages\Dashboard;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Friends extends Component
{
    public $users = [];

    public function route()
    {
        return Route::get('/myfriends')
            ->name('myfriends')
            ->middleware('auth');
    }

    public function render()
    {
        $this->users = User::all();
        return view('pages.dashboard.friends');
    }
}
