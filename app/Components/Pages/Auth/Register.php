<?php

namespace App\Components\Pages\Auth;


use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Lukeraymonddowning\Honey\Traits\WithHoney;


class Register extends Component
{
    use WithHoney;

    public $name, $email, $password;

    public function route()
    {
        return Route::get('/register')
            ->name('register')
            ->middleware('guest');
    }

    public function render()
    {
        return view('pages.auth.register');
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],
        ];
    }

    public function register()
    {
        $this->validate();

        /*
        if (!$this->honeyPasses()) {
            return null;
        }
        */

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        Auth::login($user, true);

        return redirect()->to(RouteServiceProvider::HOME);
    }
}
