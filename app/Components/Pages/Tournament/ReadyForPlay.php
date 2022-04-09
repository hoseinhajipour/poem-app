<?php

namespace App\Components\Pages\Tournament;

use App\Models\Quiz;
use App\Models\Tournament;
use App\Models\TournamentQuiz;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ReadyForPlay extends Component
{
    public $matchUser;
    public $countDown = 3;
    public $category_id;

    public function mount()
    {

    }

    public function route()
    {
        return Route::get('/tournament/ready-for-play')
            ->name('Tournament.ReadyForPlay')
            ->middleware('auth');
    }


    public function render()
    {
        $this->matchUser = User::find(Session::get('user_id_for_play'));
        $this->category_id = Session::get('curent_category_id');

        return view('pages.tournament.ready-for-play');
    }

    public function countDownForPlay()
    {
        $this->countDown--;
        if ($this->countDown <= 0) {
            $this->CreateNewTournament();
            return "play";
        } else {
            return $this->countDown;
        }
    }

    public function CreateNewTournament()
    {
        $Tournament = new  Tournament();
        $Tournament->first_user_id = auth()->user()->id;
        $Tournament->second_user_id = $this->matchUser->id;
        $Tournament->status = "play";
        $Tournament->save();

        $questions = Quiz::where("category_id", $this->category_id)
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

        Session::put('current_tournament', $Tournament->id);

        redirect()->to('/tournament/play');
    }
}
