<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question_id',
        'answer',
        'introvert_score'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
