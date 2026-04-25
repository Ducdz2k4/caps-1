@extends('layouts.app')

@section('content')
<div class="form-container">
    <div class="form-heading">
        <a class="title-link">
            <i class="fas fa-user-plus"></i>
            <h3 class="title">Register New Account</h3>
        </a>
    </div>

    {{-- Form gửi dữ liệu đến route register.submit đã cấu hình trong web.php --}}
    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <div class="form--group">
            <label for="fullname" class="form__label">Full Name:</label>
            <div class="form-input">
                <i class="fas fa-id-card" id="icon-custom"></i>
                <input id="fullname" type="text" class="form__input @error('fullname') is-invalid @enderror" 
                       name="fullname" value="{{ old('fullname') }}" required autofocus placeholder="Enter your full name">
                
                @error('fullname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form--group">
            <label for="email" class="form__label">Email Address:</label>
            <div class="form-input">
                <i class="fas fa-envelope" id="icon-custom"></i>
                <input id="email" type="email" class="form__input @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required placeholder="example@gmail.com">
                
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form--group">
            <label for="phone" class="form__label">Phone Number:</label>
            <div class="form-input">
                <i class="fas fa-phone" id="icon-custom"></i>
                <input id="phone" type="text" class="form__input @error('phone') is-invalid @enderror" 
                       name="phone" value="{{ old('phone') }}" required placeholder="0123456789">
                
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="form--group">
            <label for="password" class="form__label">Password:</label>
            <div class="form-input">
                <i class="fas fa-lock" id="icon-custom"></i>
                <input id="password" type="password" class="form__input @error('password') is-invalid @enderror" 
                       name="password" required placeholder="Minimum 6 characters">
                
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-button">
            <button type="submit" class="btn-default btn--success-custom">
                Registration
            </button>
            <a href="{{ route('login') }}" class="btn-default btn--outline ml-2">
                Back to Login
            </a>
        </div>
    </form>
</div>

<style>
   
    .form-container {
        max-width: 500px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .form-heading {
        text-align: center;
        margin-bottom: 25px;
    }

    .title-link {
        text-decoration: none;
        color: #009688;
    }

    .form--group {
        margin-bottom: 20px;
    }

    .form__label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #444;
    }

    .form-input {
        position: relative;
        display: flex;
        align-items: center;
    }

    #icon-custom {
        position: absolute;
        left: 12px;
        color: #009688;
        font-size: 16px;
    }

    .form__input {
        width: 100%;
        padding: 12px 12px 12px 40px;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: border-color 0.3s;
    }

    .form__input:focus {
        border-color: #009688;
        outline: none;
        box-shadow: 0 0 5px rgba(0,150,136,0.2);
    }

    .btn-default {
        padding: 10px 25px;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
    }

    .btn--success-custom {
        background-color: #009688;
        color: white;
        border: none;
    }

    .btn--success-custom:hover {
        background-color: #00796b;
    }

    .btn--outline {
        border: 1px solid #009688;
        color: #009688;
        background: transparent;
    }

    .btn--outline:hover {
        background: rgba(0,150,136,0.1);
    }

    .ml-2 { margin-left: 10px; }

    .invalid-feedback {
        color: #e3342f;
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }

    .text-danger { color: #e3342f; }
</style>
@endsection