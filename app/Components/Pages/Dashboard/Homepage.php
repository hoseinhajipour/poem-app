<?php

namespace App\Components\Pages\Dashboard;

use App\Models\QuizCategory;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Homepage extends Component
{
    public $categories = [];
    public $category_id;
    public $tournaments = [];

    public function route()
    {
        return Route::get('/home')
            ->name('home')
            ->middleware('auth');
    }

    public function mount()
    {
        $this->categories = QuizCategory::all();
    }

    public function render()
    {
        $this->ShowCurrenttournaments();
        return view('pages.dashboard.homepage');
    }

    public function Rewardincrement()
    {
        $user = auth()->user();
        $user->wallet += 100;
        $user->save();
        $this->redirect('#');
    }

    public function SelectCategory($id)
    {
        $this->category_id = $id;
    }

    public function GoSearchUserPage()
    {
        Session::put('curent_category_id', $this->category_id);
        return redirect()->to('/search/user-list');
    }

    public function PlayWithRandomPlayer()
    {
        Session::put('curent_category_id', $this->category_id);
        $otherUser = User::where("id", "!=", auth()->user()->id)->inRandomOrder()->get()->first();
        Session::put('user_id_for_play', $otherUser->id);
        return redirect()->to('/tournament/ready-for-play');
    }

    public function ShowCurrenttournaments()
    {
        $this->tournaments = Tournament::where("first_user_id", auth()->user()->id)
            ->OrWhere("second_user_id", auth()->user()->id)
            ->with("firstUser")
            ->with("secondUser")
            ->latest()
            ->get();
    }

    public function PlayTournament($index)
    {
        if ($this->tournaments[$index]->status == "play") {
            Session::put('current_tournament', $this->tournaments[$index]->id);
            redirect()->to('/tournament/play');
        }
    }

    public function checkStatus($index)
    {
        if ($this->tournaments[$index]->status == "play") {
            return "btn-success";
        } else if ($this->tournaments[$index]->status == "equal") {
            return "btn-warning";
        } else {
            return "btn-default";
        }
    }
}
