<?php

namespace App\Components\Pages\Tournament;

use App\Models\CoinUseType;
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


        //
        $CoinUseType = CoinUseType::where("name", 'new_tournament')->first();
        $user = auth()->user();
        $user->wallet += $CoinUseType->value;
        $user->save();

        $second_user_id = User::find($Tournament->second_user_id);
        if (isset($second_user_id->token)) {
            $this->sendWebNotification(setting('site.title'), "مسابقه شروع شد", $second_user_id->token);
        }

        redirect()->to('/tournament/play');
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
