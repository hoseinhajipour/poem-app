<?php

namespace App\Components\Pages\Tournament;

use App\Models\CoinUseType;
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
    public $true_answer = 0;

    public $ChancePercent = false;
    public $RemoveTwoAnswer = false;
    public $EnableTwoChanceClick = false;

    public $showPrecents = false;
    public $TwochanceClick = 0;
    protected $listeners = [
        'helepr_RemoveTwoAnswer'
    ];

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

        $this->dispatchBrowserEvent('clear_history', '');
    }

    public function render()
    {
        $this->current_question = $this->questions[$this->current_question_index]->quiz;
        return view('pages.tournament.play');
    }

    public function SelectAnswer($Answer_id)
    {
        if ($this->current_question->true_answer == $Answer_id) {
            $this->true_answer++;
        }
        $this->dispatchBrowserEvent('ShowNextQuest', null);
    }

    public function ContinueGame()
    {
        //reset
        $this->showPrecents = false;
        $this->TwochanceClick=0;
        //end-reset

        $this->current_question_index++;
        if ($this->current_question_index >= count($this->questions)) {
            $this->current_question_index = count($this->questions) - 1;
            $this->checkWinner();
        }
    }

    public function checkWinner()
    {
        if ($this->tournament->first_user_id == auth()->user()->id) {
            $this->tournament->first_user_true_answer = $this->true_answer;
        } else {
            $this->tournament->second_user_true_answer = $this->true_answer;
        }
        if (isset($this->tournament->first_user_true_answer) && isset($this->tournament->second_user_true_answer)) {

            if ($this->tournament->first_user_true_answer > $this->tournament->second_user_true_answer) {
                $this->tournament->winner_user_id = $this->tournament->first_user_id;
                $this->tournament->status = "complete";
            } else if ($this->tournament->first_user_true_answer < $this->tournament->second_user_true_answer) {
                $this->tournament->winner_user_id = $this->tournament->second_user_id;
                $this->tournament->status = "complete";
            } else {
                $this->tournament->winner_user_id = -1;
                $this->tournament->status = "equal";
            }
        }
        $this->tournament->save();

        redirect()->to('/home');
    }

    public function LikeQuest()
    {
        $this->questions[$this->current_question_index]->Quiz->like++;
        $this->questions[$this->current_question_index]->Quiz->save();
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => 'نظر شما با موفقیت ثبت شد']);
    }

    public function DislikeQuest()
    {
        $this->questions[$this->current_question_index]->Quiz->dislike++;

        $this->questions[$this->current_question_index]->Quiz->save();
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => 'نظر شما با موفقیت ثبت شد']);
    }

    public function UseHeleper($name)
    {
        if ($name == "helepr_RemoveTwoAnswer") {
            $this->RemoveTwoAnswer = true;
        }
        if ($name == "helepr_ChancePercent") {
            $this->ChancePercent = true;
            $this->showPrecents = true;
        }
        if ($name == "helepr_EnableTwoChance") {
            $this->EnableTwoChanceClick = true;
        }
        $CoinUseType = CoinUseType::where("name", $name)->first();
        $user = auth()->user();
        if ($user->wallet >= $CoinUseType->value) {
            $user->wallet += $CoinUseType->value;
            $user->save();
            $this->emitTo('util.header', '$refresh');
        } else {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'موجودی ناکافی']);
        }

    }

    public function helepr_RemoveTwoAnswer()
    {
        $this->UseHeleper('helepr_RemoveTwoAnswer');
    }
}
