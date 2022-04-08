<?php

namespace App\Components\Pages\Dashboard;

use App\Models\QuizCategory;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Homepage extends Component
{
    public $categories = [];

    public function route()
    {
        return Route::get('/home')
            ->name('home')
            ->middleware('auth');
    }

    public function mount()
    {
        $this->categories = QuizCategory::all();
    }

    public function render()
    {
        return view('pages.dashboard.homepage');
    }

    public function Rewardincrement()
    {
        $user = auth()->user();
        $user->wallet += 100;
        $user->save();
        $this->redirect('#');
    }
}
