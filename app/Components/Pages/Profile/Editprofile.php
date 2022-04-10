<?php

namespace App\Components\Pages\Profile;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Editprofile extends Component
{
    public $username;

    public function mount()
    {

    }

    public function route()
    {
        return Route::get('/profile/edit-profile')
            ->name('editProfile')
            ->middleware('auth');
    }

    public function render()
    {
        $this->username = auth()->user()->name;
        return view('pages.profile.editprofile');
    }

    public function submit()
    {
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => 'با موفقیت ذخیره شد']);

        $user = auth()->user();
        $user->name = $this->username;
        $user->save();
        redirect()->to('/home');
    }
}