@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ $questionnaire->title }}</h1>

            <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
                @csrf  
                <!-- $key holds the index number of array which starts at zero -->
                @foreach($questionnaire->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{$key + 1}}</strong> {{ $question->question }}</div>
                        
                        <div class="card-body">
                            
                            @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                <!-- Wrapping the label tag around the answers allows answer text to be clicked to activate radio button -->
                                    <label for="answer{{ $answer->id }}">
                                        <li class="list-group-item">
                                            <!-- if an old value of responses.$key.answer_id exists (from a previous submit) matching an $answer->id,
                                                then leave that input checked.  If not, don't check -->
                                            <input class="mr-2" type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}"
                                                    {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : '' }}
                                                    value="{{ $answer->id }}">
                                                {{$answer->answer}}

                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>
                        </div> 
                    </div>
                @endforeach

            
                <div class="card mt-4">
                    <div class="card-header">Your Information</div>

                    <div class="card-body">
                        @csrf

                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input name="survey[name]" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Your Name">
                            <small id="nameHelp" class="form-text text-muted">Hello!  What's your name?</small>

                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input name="survey[email]" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                            <small id="emailHelp" class="form-text text-muted">Your Email Please!.</small>

                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <button class="btn btn-dark" type="submit">Complete Survey</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
