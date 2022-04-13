<?php

namespace App\Components\Pages\User;

use App\Models\message;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Chat extends Component
{
    public $user_to;
    public $messages = [];

    public $newText;

    public function mount($id)
    {
        $this->user_to = User::find($id);
    }

    public function route()
    {
        return Route::get('/chat/{id}')
            ->name('chat')
            ->middleware('auth');
    }

    private $message;

    public function render()
    {
        $from = auth()->user()->id;
        $to = $this->user_to->id;

        $this->messages = (new \App\Models\message)->newQuery()
            ->whereRaw("((from_id = $from AND to_id = $to )OR(from_id = $to AND to_id = $from))")
            ->with('fromUser')
            ->with('toUser')
            ->get();

        return view('pages.user.chat');
    }

    public function SendNewMessage()
    {
        $newMsg = new message();
        $newMsg->from_id = auth()->user()->id;
        $newMsg->to_id = $this->user_to->id;
        $newMsg->text = $this->newText;

        $newMsg->save();

        $this->newText = "";
    }

}
