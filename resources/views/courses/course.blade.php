use Illuminate\Support\Str;

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>COURSE</h2>

    <div class="row">
        @foreach($courses as $course)
        <div class="col-md-4">
            <div style="border:1px solid #ddd; padding:15px; margin-bottom:20px;">
                
                <img src="/storage/{{ $course->url_image }}" 
                     style="width:100%; height:200px; object-fit:cover;">

                <h3>{{ $course->name }}</h3>

                <p>Price: ${{ number_format($course->price, 2) }}</p>

                <p>{{ Str::limit($course->description, 100) }}</p>

                <a href="{{ route('course.show', $course->id) }}" 
                   class="btn btn-primary">
                    View detail
                </a>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection