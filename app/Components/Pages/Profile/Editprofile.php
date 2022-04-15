<?php

namespace App\Components\Pages\Profile;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithFileUploads;

class Editprofile extends Component
{
    use WithFileUploads;
    public $username;
    public $mobile;
    public $email;
    public $bio;

    public $image;

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
        $this->mobile = auth()->user()->mobile;
        $this->email = auth()->user()->email;
        $this->bio = auth()->user()->bio;

        return view('pages.profile.editprofile');
    }

    public function submit()
    {
        $user = auth()->user();


        if ($this->image) {
            $image_path = $this->image->store('users', 'public');
            $user->avatar = $image_path;
        }

        $user->name = $this->username;
        $user->mobile = $this->mobile;
        $user->email = $this->email;
        $user->bio = $this->bio;

        $user->save();

        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => 'با موفقیت ذخیره شد']);
        redirect()->to('/home#slide1');
    }
}
