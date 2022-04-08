<?php

namespace App\Components\Pages\User;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class UserInfo extends Component
{
    public $user;

    public function route()
    {
        return Route::get('/user/{id}')
            ->name('search.user-list')
            ->middleware('auth');
    }

    public function mount($id)
    {
        $this->user = User::find($id);
    }

    public function render()
    {
        return view('pages.user.user-info');
    }
}
