<?php

namespace App\Components\Pages\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Homepage extends Component
{
    public $currentIndex = 2;

    public function mount($id = 2)
    {
        if (isset($id)) {
            $this->currentIndex = $id;
        }
    }

    public function route()
    {
        return Route::get('/home/{id?}')
            ->name('home')
            ->middleware('auth');
    }


    public function render()
    {
        return view('pages.dashboard.homepage');
    }

}
