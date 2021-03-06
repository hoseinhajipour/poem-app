<?php

namespace App\Components\Pages\Tournament;

use App\Http\Controllers\SendNotificationController;
use App\Models\CoinUseType;
use App\Models\Tournament;
use App\Models\TournamentBoard as TournamentBoardModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

    public $hide_answer01 = false;
    public $hide_answer02 = false;
    public $hide_answer03 = false;
    public $hide_answer04 = false;
    public $precents = [];

    public $TournamentBoard;

    public function route()
    {
        return Route::get('/tournament/play/{id}')
            ->name('Tournament.Play')
            ->middleware('auth');
    }

    public function mount(Request $request)
    {
        $this->precents[0] = 0;
        $this->precents[1] = 0;
        $this->precents[2] = 0;
        $this->precents[3] = 0;

        $current_tournament = $request->id;
        $this->tournament = Tournament::where("id", $current_tournament)
            ->with("quizzes")
            ->with("firstUser")
            ->with("secondUser")
            ->first();
        $this->questions = $this->tournament->quizzes;


        $this->TournamentBoard = TournamentBoardModel::find($request->b);
        $this->dispatchBrowserEvent('start_timer_progress', null);
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
        $this->dispatchBrowserEvent('Stop_timer_progress', null);
        $this->dispatchBrowserEvent('ShowNextQuest', null);
    }

    public function ContinueGame()
    {
        //reset
        $this->showPrecents = false;
        $this->TwochanceClick = 0;
        $this->hide_answer01 = false;
        $this->hide_answer02 = false;
        $this->hide_answer03 = false;
        $this->hide_answer04 = false;
        //end reset

        $this->current_question_index++;
        if ($this->current_question_index >= count($this->questions)) {
            $this->dispatchBrowserEvent('Stop_timer_progress', null);
            $this->current_question_index = count($this->questions) - 1;
            $this->checkWinner();
        } else {
            $this->dispatchBrowserEvent('start_timer_progress', null);
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

        if (isset($this->tournament->first_user_true_answer) && isset($this->tournament->second_user_true_answer)) {
            if ($this->tournament->first_user_true_answer > $this->tournament->second_user_true_answer) {
                $this->TournamentBoard->first_user_win++;
            }
            if ($this->tournament->first_user_true_answer == $this->tournament->second_user_true_answer) {
                $this->TournamentBoard->first_user_win++;
                $this->TournamentBoard->second_user_win++;
            } else {
                $this->TournamentBoard->second_user_win++;
            }
            $this->TournamentBoard->save();
        }

        // Session::remove("current_tournament");

        return redirect()->to('/tournament/board/' . $this->TournamentBoard->id);
        // return redirect()->to('/home');
    }

    public function LikeQuest()
    {
        $this->questions[$this->current_question_index]->Quiz->like++;
        $this->questions[$this->current_question_index]->Quiz->save();
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => '?????? ?????? ???? ???????????? ?????? ????']);
    }

    public function DislikeQuest()
    {
        $this->questions[$this->current_question_index]->Quiz->dislike++;

        $this->questions[$this->current_question_index]->Quiz->save();
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => '?????? ?????? ???? ???????????? ?????? ????']);
    }

    public function UseHeleper($name)
    {
        $CoinUseType = CoinUseType::where("name", $name)->first();
        $user = auth()->user();
        if ($user->wallet >= $CoinUseType->value) {
            $user->wallet += $CoinUseType->value;
            $user->save();
            $this->emitTo('util.header', '$refresh');
        } else {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => '???????????? ????????????']);
        }
    }

    public function RemoveTwoAnswer_btn()
    {
        $array = [1, 2, 3, 4];
        array_splice($array, $this->current_question->true_answer - 1, 1);
        $second_rm = rand(0, count($array) - 1);
        array_splice($array, $second_rm, 1);

        foreach ($array as $btn) {
            if ($btn == 1) {
                $this->hide_answer01 = true;
            }
            if ($btn == 2) {
                $this->hide_answer02 = true;
            }
            if ($btn == 3) {
                $this->hide_answer03 = true;
            }
            if ($btn == 4) {
                $this->hide_answer04 = true;
            }
        }
        $this->RemoveTwoAnswer = true;
        $this->UseHeleper('helepr_RemoveTwoAnswer');
    }

    public function ChancePercent_btn()
    {
        $this->ChancePercent = true;
        $this->showPrecents = true;

        for ($i = 0; $i < 4; $i++) {
            if ($i == ($this->current_question->true_answer - 1)) {
                $per = rand(45, 85);
                $this->precents[$i] = $per;
            } else {
                $per = rand(5, 50);
                $this->precents[$i] = $per;
            }
        }
        $this->UseHeleper('helepr_EnableTwoChance');
    }

    public function EnableTwoChance_btn()
    {
        $this->TwochanceClick = 1;
        $this->EnableTwoChanceClick = true;
        $this->dispatchBrowserEvent('TwochanceClickUpdate', '');
        $this->UseHeleper('helepr_EnableTwoChance');
    }


}
