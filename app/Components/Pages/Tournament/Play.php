<?php

namespace App\Components\Pages\Tournament;

use App\Models\Tournament;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Play extends Component
{
    public $tournament;
    public $questions = [];
    public $current_question;
    public $current_question_index = 0;

    public function route()
    {
        return Route::get('/tournament/play')
            ->name('Tournament.Play')
            ->middleware('auth');
    }

    public function mount()
    {
        $current_tournament = Session::get('current_tournament');
        $this->tournament = Tournament::where("id", $current_tournament)
            ->with("quizzes")
            ->first();

        $this->questions = $this->tournament->quizzes;
    }

    public function render()
    {
        return view('pages.tournament.play');
    }

    public function SelectAnswer($Answer_id)
    {
        $this->current_question_index++;
    }
}
