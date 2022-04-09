<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentQuiz extends Model
{
    protected $table = "tournament_quizzes";
    use HasFactory;

    public function Quiz()
    {
        return $this->belongsTo(Quiz::class, "quiz_id");
    }
}
