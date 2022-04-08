<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'description', 'answer01'
        , 'answer02', 'answer03', 'answer04'
        , 'true_answer', 'music', 'image'
        , 'video', 'author_id', 'type'
        , 'status', 'category_id'];
}
