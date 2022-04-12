<?php

namespace App\Http\Controllers;

use App\Models\CoinUseType;
use App\Models\Quiz;
use App\Models\Quizz;
use App\Models\QuizzCategory;
use App\Models\User;
use Illuminate\Http\Request;

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
            $CoinUseType = CoinUseType::where("id", 12)->first();
            $authUser = User::where("id", $Quizz->user_id)->first();
            $authUser->coin += $CoinUseType->amount;
            $authUser->save();
        }

        $Quizz->save();
        return redirect()->back();
    }


}
