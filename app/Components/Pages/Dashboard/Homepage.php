<?php

namespace App\Components\Pages\Dashboard;

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

        Session::remove("current_tournament");
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

    public function SaveToken($token)
    {
        $user = auth()->user();
        $user->token = $token;
        $user->save();

        $this->dispatchBrowserEvent('updateSwiper');

    }

}
