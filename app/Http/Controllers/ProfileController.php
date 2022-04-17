<?php

namespace App\Http\Controllers;

use App\Models\CoinUseType;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Voyager;

class ProfileController extends Controller
{




    public function UpdateCoinWallet(Request $request)
    {
        $authUser = auth()->user();
        $CoinUseType = CoinUseType::where("id", $request->type_id)->first();
        $this->UpdateUserCoinWallet($request->type_id, $authUser->id);

        return ["status" => "ok",
            "coinUseType" => $CoinUseType,
            "userInfo" => $authUser
        ];
    }

    public function UpdateUserCoinWallet($type_id, $user_id)
    {
        $CoinUseType = CoinUseType::where("id", $type_id)->first();
        $authUser = User::where("id", $user_id)->first();
        if ($CoinUseType->type == "decrease") {
            if ($authUser->coin >= abs($CoinUseType->amount)) {
                $authUser->coin += $CoinUseType->amount;
            }
        } else {
            $authUser->coin += $CoinUseType->amount;
        }
        $authUser->save();
        return ["status" => "ok",
            "coinUseType" => $CoinUseType,
            "userInfo" => $authUser
        ];
    }
}
