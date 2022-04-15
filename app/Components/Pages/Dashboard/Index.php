<?php

namespace App\Components\Pages\Dashboard;

use App\Models\QuizCategory;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Index extends Component
{
    public $categories = [];
    public $category_id;
    public $tournaments = [];

    public function mount()
    {
        $this->categories = QuizCategory::where("status","active")->get();
    }

    public function render()
    {
        $this->ShowCurrenttournaments();
        return view('pages.dashboard.index');

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
        $otherUser = User::where("id", "!=", auth()->user()->id)->inRandomOrder()->limit(1)->get();
        Session::put('user_id_for_play', $otherUser[0]->id);
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
            $allowPlay = true;

            if ($this->tournaments[$index]->first_user_id == auth()->user()->id) {
                if (isset($this->tournaments[$index]->first_user_true_answer)) {
                    $allowPlay = false;
                }
            }
            if ($this->tournaments[$index]->second_user_id == auth()->user()->id) {
                if (isset($this->tournaments[$index]->second_user_true_answer)) {
                    $allowPlay = false;
                }
            }
            if ($allowPlay) {
                $this->dispatchBrowserEvent('alert',
                    ['type' => 'success', 'message' => 'آماده برای بازی']);
                Session::put('current_tournament', $this->tournaments[$index]->id);
                redirect()->to('/tournament/play');
            } else {
                session()->flash('alert', true);
                session()->flash('type', 'error');
                session()->flash('message', 'نوبت شما تمام شده است');
                /*
                $this->dispatchBrowserEvent('alert',
                    ['type' => 'error',  'message' => 'نوبت شما تمام شده است']);
                */
            }

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
