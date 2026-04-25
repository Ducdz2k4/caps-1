@extends('layouts.board')

@section('content')
<div class="course-container">
    <div class="course-heading">
        <a href="#" class="info-title" style=" font-size: 20px;">
            <i class="fas fa-graduation-cap fa-lg fa-fw mr-2 text-gray-400"></i>
            <h5 class="title">Hello: {{ Auth::guard('web')->user()->fullname }}</h5>
        </a>
    </div>
    <div class="info-table-course">
        <div id="minute" style="display: none">{{ $exam->total_time }}</div>
        <table class="table table-st">
            <thead style="background-color: #4268D6; color: #fff;">
                <tr>
                    <th>Course name</th>
                    <th>Exam name</th>
                    <th>Total time</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $exam->course->name }}</td>
                    <td>{{ $exam->name }}</td>
                    <th id="time">{{ $exam->total_time }} Minute</th>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="star-quiz-btn">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="formSelectLevel" action="GET" data-id="{{ $exam->id }}">
                @csrf
                <div class="form-group">
                    <label for="level" style="font-weight: bold;">Level: </label>
                    <select name="level" id="level" style="margin: auto" class="form-control">
                        <option value="Easy" selected="selected">Easy</option>
                        <option value="Medium" >Medium</option>
                        <option value="Hard">Hard</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style= "margin: 0 45%;">Start</button>
            </form>
        </div>
    </div>

    <form id="formQuiz" method="POST" action="{{ route('student.exam.quiz.check',$exam->id) }}">
        @csrf
        <div id="questions" class="multiple-container">

        </div>
    </form>

</div>
@endsection