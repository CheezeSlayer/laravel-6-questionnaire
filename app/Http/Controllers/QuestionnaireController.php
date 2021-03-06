<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function create() {
        return view('questionnaire.create');
    }

    public function store() {
        $data = request()->validate([
            'title' => 'required',
            'purpose' => 'required'
        ]);

        $questionnaire = auth()->user()->questionnaire()->create($data);

        return redirect('/questionnaires/'.$questionnaire->id);
    }

    public function show(\App\Questionnaire $questionnaire) {
        // Load answers of the questions of the questionnaire as is defined in questionnaire -> question -> answer modals.  
        $questionnaire->load('questions.answers.responses');

        // dd($questionnaire);

        return view('questionnaire.show', compact('questionnaire'));
    }
}
