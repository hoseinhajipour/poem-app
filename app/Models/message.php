<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    public function fromUser() {
        return $this->belongsTo(User::class,'from');
    }
    public function toUser() {
        return $this->belongsTo(User::class,'to');
    }
    public function user() {
        return $this->belongsTo(User::class, 'to');
    }



}
