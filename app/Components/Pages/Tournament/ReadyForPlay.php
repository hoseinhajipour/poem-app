<?php

namespace App\Components\Pages\Tournament;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ReadyForPlay extends Component
{
    public $matchUser;
    public $countDown = 3;

    public function route()
    {
        return Route::get('/tournament/ready-for-play')
            ->name('Tournament.ReadyForPlay')
            ->middleware('auth');
    }

    public function render()
    {
        $this->matchUser = User::find(Session::get('user_id_for_play'));
        return view('pages.tournament.ready-for-play');
    }

    public function countDownForPlay()
    {
        $this->countDown--;
        if ($this->countDown <= 0) {
            redirect()->to('/tournament/play');
            return "play";
        } else {
            return $this->countDown;
        }
    }
}
