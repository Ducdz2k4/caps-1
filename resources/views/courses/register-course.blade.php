@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="form-heading">
        <a href="#" class="title-link">
            <i class="fas fa-user-plus"></i>
            <h3 class="title">Register the course</h3>
        </a>
    </div>

    {{--  FORM QUAN TRỌNG --}}
    <form method="POST" action="{{ route('register-course.store', $course->id) }}">
        @csrf

        {{-- COURSE --}}
        <div class="form-group">
            <label for="course">Select course:</label>
            <select name="course" id="course" class="form__input">
                <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
            </select>
        </div>

        {{-- CLASS --}}
        <div class="form-group">
            <label for="class">Select start time and schedule:</label>
            <select name="class" id="class" class="form__input">
                @foreach ($course->classes as $class)
                    <option value="{{ $class->id }}">
                        {{ $class->start }} {{ $class->schedule }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- FULLNAME --}}
        <div class="form-group">
            <label for="fullname">Fullname:</label>
            <input type="text" name="fullname" class="form__input" required>
        </div>

        {{-- BIRTHDAY --}}
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday" class="form__input" required>
        </div>

        {{-- EMAIL --}}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form__input" required>
        </div>

        {{-- PHONE --}}
        <div class="form-group">
            <label for="phone">Phone number:</label>
            <input type="text" name="phone" class="form__input" required>
        </div>

        {{-- MESSAGE --}}
        @if(Session::has('message'))
            <div>
                <strong class="text-primary">{{ Session::get('message') }}</strong>
            </div>
        @endif

        {{-- BUTTON --}}
        <button type="submit" class="btn__default btn--success center__btn">
            Register
        </button>
    </form>
</div>
@endsection