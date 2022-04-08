<?php

namespace App\Components\Pages\Search;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Userlist extends Component
{
    public $users=[];

    public function route()
    {
        return Route::get('/search/user-list')
            ->name('search.user-list')
            ->middleware('auth');
    }

    public function render()
    {
        $this->users = User::all();
        return view('pages.search.userlist');
    }
}
