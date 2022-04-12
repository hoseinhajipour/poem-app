<?php

namespace App\Components\Pages\Profile;

use App\Models\CoinUseType;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class ViewQuiz extends Component
{

    public $quiz;
    public $quiz_id;

    public function mount($id)
    {
        $this->quiz_id = $id;
    }

    public function route()
    {
        return Route::get('/quiz/{id}')
            ->name('quiz.view')
            ->middleware('auth');
    }

    public function render()
    {
        $this->quiz = Quiz::find($this->quiz_id);
        return view('pages.profile.view-quiz');
    }

    public function ApproveReject()
    {

        if ($this->quiz->status == "pending") {
            $this->quiz->status = "approve";
        } else if ($this->quiz->status == "reject") {
            $this->quiz->status = "approve";
        } else if ($this->quiz->status == "approve") {
            $this->quiz->status = "reject";
        }

        if ($this->quiz->status == "approve") {
            $CoinUseType = CoinUseType::where("id", 12)->first();
            if($CoinUseType){
                $User = User::where("id", $this->quiz->user_id)->first();
                $User->wallet += $CoinUseType->amount;
                $User->save();
            }

        }

        $this->quiz->save();
    }
}
