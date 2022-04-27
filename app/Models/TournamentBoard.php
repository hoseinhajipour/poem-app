<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentBoard extends Model
{
    public $table = "tournament_boards";
    use HasFactory;

    public function tournament01()
    {
        return $this->belongsTo(Tournament::class, "tournament_01")
            ->with('category')
            ->with('firstUser')
            ->with('secondUser');
    }

    public function tournament02()
    {
        return $this->belongsTo(Tournament::class, "tournament_02")
            ->with('category');
    }

    public function tournament03()
    {
        return $this->belongsTo(Tournament::class, "tournament_03")
            ->with('category');
    }

    public function tournament04()
    {
        return $this->belongsTo(Tournament::class, "tournament_04")
            ->with('category');
    }

    public function tournament05()
    {
        return $this->belongsTo(Tournament::class, "tournament_05")
            ->with('category');
    }

    public function tournament06()
    {
        return $this->belongsTo(Tournament::class, "tournament_06")
            ->with('category');
    }

    public function firstUser()
    {
        return $this->belongsTo(User::class, "first_user_id");
    }

    public function secondUser()
    {
        return $this->belongsTo(User::class, "second_user_id");
    }
}
