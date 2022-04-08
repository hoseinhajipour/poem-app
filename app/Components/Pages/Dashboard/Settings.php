<?php

namespace App\Components\Pages\Dashboard;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Settings extends Component
{
    public function route()
    {
        return Route::get('/settings')
            ->name('settings')
            ->middleware('auth');
    }

    public function render()
    {
        return view('pages.dashboard.settings');
    }
}
