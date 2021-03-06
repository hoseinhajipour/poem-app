<?php

namespace App\Components\Pages\Tournament;

use App\Models\Quiz;
use App\Models\QuizCategory;
use App\Models\Tournament;
use App\Models\TournamentBoard as TournamentBoardModel;
use App\Models\TournamentQuiz;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class SelectCategory extends Component
{
    public $categories = [];
    public $TournamentBoard;

    public function mount($id)
    {
        $this->TournamentBoard = TournamentBoardModel::find($id);
        $this->categories = QuizCategory::where('status', 'active')
            ->inRandomOrder()
            ->get()
            ->take(3);
    }

    public function route()
    {
        return Route::get('/tournament/select-category/{id}')
            ->name('Tournament.SelectCategory')
            ->middleware('auth');
    }

    public function UpdateCategory()
    {
        $this->categories = QuizCategory::where('status', 'active')
            ->inRandomOrder()
            ->get()
            ->take(3);
    }

    public function newtournament($id)
    {
        $Tournament = new  Tournament();
        $Tournament->first_user_id = $this->TournamentBoard->first_user_id;
        $Tournament->second_user_id = $this->TournamentBoard->second_user_id;
        $Tournament->category_id = $id;
        $Tournament->status = "play";
        $Tournament->save();

        $questions = Quiz::where("category_id", $id)
            ->where('status', 'approve')
            ->inRandomOrder()
            ->get()
            ->take(setting('gamesetting.quiz_count_per_tournament'));

        foreach ($questions as $quest) {
            $appendQuizz = new TournamentQuiz();
            $appendQuizz->tournament_id = $Tournament->id;
            $appendQuizz->quiz_id = $quest->id;
            $appendQuizz->save();
        }

        //switch next category_selector
        if ($this->TournamentBoard->user_category_selector == $this->TournamentBoard->first_user_id) {
            $this->TournamentBoard->user_category_selector = $this->TournamentBoard->second_user_id;
        } else {
            $this->TournamentBoard->user_category_selector = $this->TournamentBoard->first_user_id;
        }

        $this->TournamentBoard->current_turn++;
        $this->TournamentBoard->setAttribute('tournament_0' . $this->TournamentBoard->current_turn, $Tournament->id);
        $this->TournamentBoard->save();

        return redirect()->to('/tournament/play/' . $Tournament->id . '?b=' . $this->TournamentBoard->id);
        //  return redirect()->to('/tournament/play');
    }

    public function render()
    {
        return view('pages.tournament.select-category');
    }
}
