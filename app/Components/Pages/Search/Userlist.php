<?php

namespace App\Components\Pages\Search;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Userlist extends Component
{
    public $users = [];
    public $username = "";

    public $currentUser;

    public function route()
    {
        return Route::get('/search/user-list')
            ->name('search.user-list')
            ->middleware('auth');
    }

    public function render()
    {
        $this->users = User::where("name", "LIKE", "%$this->username%")
            ->where("id", "!=", 2)
            ->where("id", "!=", auth()->user()->id)
            ->orderby('score', 'desc')
            ->get();
        return view('pages.search.userlist');
        //->layout('layouts.layout-full');
    }

    public function SelectUser($userid)
    {
        $this->currentUser = $userid;
    }

    public function showCurrentUserProfile()
    {
        return redirect()->to('/user/' . $this->currentUser);
    }

    public function PlayWithCurrentUser()
    {
        Session::put("user_id_for_play", $this->currentUser);
        return redirect()->to('/tournament/ready-for-play');
    }
}
