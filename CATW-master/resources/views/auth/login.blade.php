@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="form-heading">
        <a class="title-link">
            <i class="fas fa-angle-double-down"></i>
            <h3 class="title">Login to Course Online</h3>
        </a>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form--group">
            <label for="email" class="form__label">Email:</label>
            <div class="form-input">
                <i class="fas fa-user" id="icon-custom"></i>
                <input id="email" type="email" class="form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form--group">
            <label for="pwd">Password:</label>
            <div class="form-input">
                <i class="fas fa-lock" id="icon-custom"></i>
                <input id="password" type="password" class="form__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @if(isset($error))
            <span>
                <strong class="text-danger">{{ $error }}</strong>
            </span>
        @endif
        <div class="form-button">
            <button  class="btn-default btn--success">Login</button>
            
            @if (Route::has('password.request'))
             <a href="{{ route('password.request') }}" class="btn-default btn--success ml-3 text-light">
                {{ __('Forgot Your Password?') }}
             </a>
            @endif
        </div>
        

    </form>
   
</div>
@endsection
