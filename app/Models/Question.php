<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Option;
use App\Models\QuestionReponse;
use Illuminate\Support\Facades\Auth;


class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'quiz_id',
        'question_text',
    ];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function userResponse()
    {
        return $this->hasOne(QuizResponse::class, 'question_id')
                    ->where('user_id', Auth::id());
    }
    
}
