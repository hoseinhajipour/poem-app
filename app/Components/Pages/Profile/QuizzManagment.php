<?php

namespace App\Components\Pages\Profile;

use App\Models\Quiz;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class QuizzManagment extends Component
{
    public $quzzies = [];

    public function route()
    {
        return Route::get('/profile/my-quizz')
            ->name('MyQuizz')
            ->middleware('auth');
    }

    public function render()
    {
        $this->quzzies = Quiz::where("author_id", auth()
            ->user()->id)
            ->latest()
            ->get();
        return view('pages.profile.quizz-managment');
    }
}
