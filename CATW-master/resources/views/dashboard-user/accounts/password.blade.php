@extends('layouts.board')

@section('content')
<div class="container mt-4">

    <div class="card shadow-sm border-0">

        <!-- Header -->
        <div class="card-header text-white"
             style="background: linear-gradient(45deg, #4facfe, #00f2fe);">
            <h5 class="mb-0">
                <i class="fas fa-key mr-2"></i>
                Change Password
            </h5>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('student.account.update-password') }}">
                @csrf

                <!-- Old Password -->
                <div class="form-group">
                    <label>Old password</label>
                    <input type="password"
                           name="old_password"
                           class="form-control @error('old_password') is-invalid @enderror">

                    @error('old_password')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="form-group">
                    <label>New password</label>
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror">

                    @error('password')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirm -->
                <div class="form-group">
                    <label>Confirm password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control @error('password_confirmation') is-invalid @enderror">

                    @error('password_confirmation')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Messages -->
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <!-- Button -->
                <div class="text-right">
                    <button type="submit" class="btn btn-info px-4">
                        Update Password
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection