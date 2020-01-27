<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $guarded = [];

    // An Answer belongs to a question
    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function responses() {
        return $this->hasMany(SurveyResponse::class);
    }
}
