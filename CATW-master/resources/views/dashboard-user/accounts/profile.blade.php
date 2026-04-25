@extends('layouts.board')

@section('content')
<div class="container mt-4">

    <div class="card shadow-sm border-0">

        <!-- Header -->
        <div class="card-header text-white"
             style="background: linear-gradient(45deg, #4facfe, #00f2fe);">
            <h5 class="mb-0">
                <i class="fas fa-user-circle mr-2"></i>
                Your Information
            </h5>
        </div>

        <div class="card-body">

            <form method="POST" action="{{ route('student.account.update-profile') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <!-- LEFT: Avatar -->
                    <div class="col-md-4 text-center mb-3">
                        <img id="blah"
                             src="{{ Auth::guard('web')->user()->url_avatar }}"
                             class="img-fluid rounded-circle shadow"
                             style="width:150px; height:150px; object-fit:cover;">

                        <div class="mt-3">
                            <input type="file"
                                   name="url_avatar"
                                   class="form-control @error('url_avatar') is-invalid @enderror"
                                   id="imgInp">
                        </div>

                        @error('url_avatar')
                            <span class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- RIGHT: Form -->
                    <div class="col-md-8">

                        <!-- Fullname -->
                        <div class="form-group">
                            <label>Fullname</label>
                            <input type="text"
                                   name="fullname"
                                   class="form-control @error('fullname') is-invalid @enderror"
                                   value="{{ Auth::guard('web')->user()->fullname }}">

                            @error('fullname')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Birthday -->
                        <div class="form-group">
                            <label>Birthday</label>
                            <input type="date"
                                   name="birthday"
                                   class="form-control @error('birthday') is-invalid @enderror"
                                   value="{{ Auth::guard('web')->user()->birthday }}">

                            @error('birthday')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label>Phone number</label>
                            <input type="tel"
                                   name="phone"
                                   placeholder="0123456789"
                                   pattern="0[0-9]{9}"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ Auth::guard('web')->user()->phone }}">

                            @error('phone')
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Message -->
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                        <!-- Button -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-info px-4">
                                Update Profile
                            </button>
                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>
</div>

<!-- Preview ảnh -->
<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>

@endsection