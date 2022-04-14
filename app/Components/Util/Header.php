<?php

namespace App\Components\Util;

use Livewire\Component;

class Header extends Component
{
    protected $listeners = [
        '$refresh'
    ];
    public function render()
    {
        return view('util.header');
    }
}
