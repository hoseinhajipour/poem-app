<?php

namespace App\Components\Pages\User;

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class UserInfo extends Component
{
    public $user;
    public $followStatus = "دنبال کردن";

    public $follower_count;
    public $following_count;

    public function route()
    {
        return Route::get('/user/{id}')
            ->name('search.user-list')
            ->middleware('auth');
    }

    public function mount($id)
    {
        $this->user = User::find($id);
        if (auth()->user()->following()->find($this->user->id)) {
            $this->followStatus = "دنبال نکردن";
        }
    }

    public function render()
    {
        $this->following_count = $this->user->following()->get()->count();
        $this->follower_count = $this->user->followers()->get()->count();
        return view('pages.user.user-info');
    }

    public function followUnfollow()
    {
        if (auth()->user()->following()->find($this->user->id)) {
            auth()->user()->following()->detach($this->user);
            $this->followStatus = "دنبال کردن";
        } else {
            auth()->user()->following()->attach($this->user);
            $this->followStatus = "دنبال نکردن";
        }
    }

    public function getAllFollowers()
    {
        $a_followers = $this->user->followers()->get();
    }

    public function GoChatPage()
    {
        $this->redirect('/chat/' . $this->user->id);
    }
}
