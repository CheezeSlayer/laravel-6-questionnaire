<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $guarded = [];

    //A question belongs to a questionnaire
    public function questionnaire() {
        return $this->belongsTo(Questionnaire::class);
    }

    //A question has many answers
    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function responses() {
        return $this->hasMany(SurveyResponse::class);
    }
}
