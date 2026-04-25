@extends('layouts.board')

@section('content')
<div class="container mt-4">

    <!-- Back button -->
    <div class="mb-3">
        <a href="{{ route('student.lesson.show',$lesson->course->id) }}"
           class="btn btn-outline-primary">
            <i class="fas fa-arrow-left mr-1"></i> Back
        </a>
    </div>

    <!-- Lesson Header -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <h4 class="text-primary mb-2">
                {{ $lesson->title }}
            </h4>

            <p class="text-muted mb-1">
                Course: <strong>{{ $lesson->course->name }}</strong>
            </p>

        </div>
    </div>

    <!-- Video -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header text-white"
             style="background: linear-gradient(45deg, #4facfe, #00f2fe);">
            <h5 class="mb-0">
                <i class="fas fa-play-circle mr-2"></i>
                Lesson Video
            </h5>
        </div>

        <div class="card-body text-center">
            <div class="embed-responsive embed-responsive-16by9">
                {!! $lesson->link_video !!}
            </div>
        </div>
    </div>

    <!-- Description -->
    <div class="card shadow-sm border-0">
        <div class="card-header text-white"
             style="background: linear-gradient(45deg, #43e97b, #38f9d7);">
            <h5 class="mb-0">
                <i class="fas fa-align-left mr-2"></i>
                Description
            </h5>
        </div>

        <div class="card-body">
            <p class="mb-0">
                {{ $lesson->description }}
            </p>
        </div>
    </div>

</div>
@endsection