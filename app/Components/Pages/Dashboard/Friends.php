<?php

namespace App\Components\Pages\Dashboard;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Friends extends Component
{
    public $users = [];
    public $followers = [];
    public $following = [];

    public function route()
    {
        return Route::get('/myfriends')
            ->name('myfriends')
            ->middleware('auth');
    }

    public function render()
    {
        $this->followers = auth()->user()->followers()->get();
        $this->following = auth()->user()->following()->get();
        return view('pages.dashboard.friends');
    }
}
