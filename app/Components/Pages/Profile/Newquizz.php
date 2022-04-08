<?php

namespace App\Components\Pages\Profile;

use App\Models\Quiz;
use App\Models\QuizCategory;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Newquizz extends Component
{
    public $categories = [];
    public $type = "4answer";
    public $description;
    public $answer01;
    public $answer02;
    public $answer03;
    public $answer04;
    public $true_answer = 1;
    public $category;

    public function route()
    {
        return Route::get('/profile/new-quizz')
            ->name('NewQuizz')
            ->middleware('auth');
    }

    public function mount()
    {
        $this->categories = QuizCategory::all();


    }

    public function render()
    {
        return view('pages.profile.newquizz');
    }

    public function submit()
    {
        $newQuiz = new Quiz();
        $newQuiz->description = $this->description;
        $newQuiz->answer01 = $this->answer01;
        $newQuiz->answer02 = $this->answer02;
        $newQuiz->answer03 = $this->answer03;
        $newQuiz->answer04 = $this->answer04;
        $newQuiz->true_answer = $this->true_answer;
        $newQuiz->type = $this->type;
        $newQuiz->category_id = $this->category;
        $newQuiz->status = "pending";
        $newQuiz->author_id = auth()->user()->id;
        $newQuiz->save();

        return redirect()->to('/profile/my-quizz');
    }

    public function updateTrueAnswer($newAnswer)
    {
        $this->true_answer = $newAnswer;
    }
}
