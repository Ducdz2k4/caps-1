@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="form-heading">
        <a href="#" class="title-link">
            <i class="fas fa-user-plus"></i>
            <h3 class="title">Register the course</h3>
        </a>
    </div>
    <form method="POST" action="{{ route('register-course.store',$course->id) }}">
        @csrf
        <div class="form-group">
            <label for="course">Select course:</label>

            <select name="course" id="course" style="margin: auto" class="form__input">
                <option value="{{ $course->id }}" selected>{{ $course->name }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="class">Select start time and schedule:</label>

            <select name="class" id="class" style="margin: auto" class="form__input">
                @foreach ($course->classes as $class)
                    <option value="{{ $class->id }}">{{ $class->start }} {{ $class->schedule }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fullname">Fullname:</label>
            <input id="fullname" type="text" class="form__input @error('fullname') is-invalid @enderror" name="fullname" value="{{ old('fullname') }}" required autocomplete="fullname" autofocus>
            
            @error('fullname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input id="birthday" type="date" class="form__input @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>
            
            @error('birthday')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" type="email" class="form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone number:</label>
            <input id="phone" type="tel" placeholder="0123456789" pattern="0[0-9]{9}" class="form__input @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
            
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        @if(Session::has('message'))
            <div>
                <strong class="text-primary">{{ Session::get('message') }}</strong>
            </div>
        @endif

        <button type="submit" class="btn__default btn--success center__btn" style="margin-top: 20px;">Register</button>
    </form>
</div>
@endsection