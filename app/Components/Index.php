<?php

namespace App\Components;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Index extends Component
{
    public function mount(){

        if(Auth::check()){
            return redirect('/home');
        }

    }
    public function route()
    {
        return Route::get('/')
            ->middleware('guest')
            ->name('index');
    }

    public function render()
    {
        return view('index');
    }
}
