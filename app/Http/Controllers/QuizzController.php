<?php

namespace App\Http\Controllers;

use App\Models\CoinUseType;
use App\Models\Quiz;
use App\Models\Quizz;
use App\Models\QuizzCategory;
use App\Models\User;

class QuizzController extends Controller
{


    public function ApproveQuizze()
    {
        $Quizz = Quiz::where('id', \request("id"))->first();

        if ($Quizz->status == "pending") {
            $Quizz->status = "approve";
        } else if ($Quizz->status == "reject") {
            $Quizz->status = "approve";
        } else if ($Quizz->status == "approve") {
            $Quizz->status = "reject";
        }

        if ($Quizz->status == "approve") {
            $CoinUseType = CoinUseType::where("name", "approve_quiz")->first();
            $authUser = User::find($Quizz->author_id);
            $authUser->wallet += $CoinUseType->amount;
            $authUser->save();
        }

        $Quizz->save();
        return redirect()->back();
    }


}
