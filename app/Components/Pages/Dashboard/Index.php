<?php

namespace App\Components\Pages\Dashboard;

use App\Models\TournamentBoard as TournamentBoardModel;
use Livewire\Component;

class Index extends Component
{

    public $tournaments = [];

    public function mount()
    {

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

    public function NewPlayGame()
    {
        return redirect()->to('/tournament/new');
    }


    public function ShowCurrenttournaments()
    {
        $this->tournaments = TournamentBoardModel::where("first_user_id", auth()->user()->id)
            ->OrWhere("second_user_id", auth()->user()->id)
            ->with("firstUser")
            ->with("secondUser")
            ->latest()
            ->get();
    }

    public function PlayTournament($index)
    {
        if ($this->tournaments[$index]->endgame == false) {
            return redirect()->to('/tournament/board/' . $this->tournaments[$index]->id);
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
