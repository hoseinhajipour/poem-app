<?php

namespace App\Components\Pages\Dashboard;

use App\Models\Package;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Shop extends Component
{
    public $Packages = [];

    public function route()
    {
        return Route::get('/shop')
            ->name('shop');
        // ->middleware('auth');
    }

    public function render()
    {
        $this->Packages = Package::all();
        return view('pages.dashboard.shop');
    }
}
