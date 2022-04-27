<?php

namespace App\Components\Pages\Tournament;

use Livewire\Component;

class Turn extends Component
{
    public $tournament;

    public function render()
    {
        return view('pages.tournament.turn');
    }
}
