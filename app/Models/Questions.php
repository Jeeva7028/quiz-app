<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';

    protected $fillable = ['quiz_id', 'question_text', 'option_1', 'option_2', 'option_3', 'option_4', 'correct_answer',];
}