<?php

namespace App\Components\Pages\Tournament;

use App\Models\CoinUseType;
use App\Models\Quiz;
use App\Models\QuizCategory;
use App\Models\Tournament;
use App\Models\TournamentBoard as TournamentBoardModel;
use App\Models\TournamentQuiz;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class NewTournament extends Component
{
    public function route()
    {
        return Route::get('/tournament/new')
            ->name('Tournament.new')
            ->middleware('auth');
    }

    public function render()
    {
        return view('pages.tournament.new-tournament');
    }

    public function PlayWithRandomPlayer()
    {

        $category = QuizCategory::where('status', 'active')
            ->inRandomOrder()
            ->get()
            ->take(1);

        $otherUser = User::where("id", "!=", auth()->user()->id)->inRandomOrder()->limit(1)->get();

        Session::put('user_id_for_play', $otherUser[0]->id);

        $Tournament = new  Tournament();
        $Tournament->first_user_id = auth()->user()->id;
        $Tournament->second_user_id = $otherUser[0]->id;
        $Tournament->category_id = $otherUser[0]->id;
        $Tournament->status = "play";
        $Tournament->save();

        $questions = Quiz::where("category_id", $category[0]->id)
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

        $TournamentBoard = new TournamentBoardModel();
        $TournamentBoard->tournament_01 = $Tournament->id;
        $TournamentBoard->first_user_id = auth()->user()->id;
        $TournamentBoard->second_user_id = $otherUser[0]->id;
        $TournamentBoard->save();

        Session::put('current_tournament', $Tournament->id);

        //send Notification
        $CoinUseType = CoinUseType::where("name", 'new_tournament')->first();
        $user = auth()->user();
        $user->wallet += $CoinUseType->value;
        $user->save();

        $second_user_id = User::find($Tournament->second_user_id);
        if (isset($second_user_id->token)) {
            $msg = auth()->user()->name . "\n";
            $msg .= "شما را به مسابقه دعوت کرده است";
            $this->sendWebNotification(setting('site.title'), $msg, $second_user_id->token);
        }


        //   return redirect()->to('/tournament/play');


        return redirect()->to('/tournament/ready-for-play/' . $TournamentBoard->id);
    }

    public function GoSearchUserPage()
    {
        return redirect()->to('/search/user-list');
    }


    public function sendWebNotification($title, $message, $notification_id)
    {

        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = [$notification_id];
        $serverKey = setting('firebase.token');
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $title,
                "body" => $message,
            ]
        ];
        $encodedData = json_encode($data);
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        // Execute post
        $result = curl_exec($ch);

        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        // Close connection
        curl_close($ch);
    }
}
