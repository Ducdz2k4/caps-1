<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Course Online</title>
    <style>
        
        body { font-family: sans-serif; background-color: #f4f4f4; padding: 20px; }
        .register-container { max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; color: #555; }
        input[type="text"], input[type="email"], input[type="date"], select {
            width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
        }
        button { width: 100%; padding: 12px; background-color: #007bff; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; margin-top: 10px;}
        button:hover { background-color: #0056b3; }
        .error-message { color: red; font-size: 14px; margin-top: 5px; }
    </style>
</head>
<body>

<div class="register-container">
    <h2>REGISTRATION</h2>

    @if ($errors->any())
        <div style="background: #ffdddd; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            <ul style="color: red; margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.submit') }}" method="POST">
        @csrf <div class="form-group">
            <label>Choose a course:</label>
            <select name="course_id" required>
                <option value="">-- Select a course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Choose a schedule:</label>
            <select name="class_id" required>
                <option value="">-- Select a schedule --</option>
                @foreach($classrooms as $class)
                    <option value="{{ $class->id }}">{{ $class->schedule }} (Start: {{ $class->start }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>First and last name:</label>
            <input type="text" name="fullname" value="{{ old('fullname') }}" required placeholder="Enter your full name">
        </div>

        <div class="form-group">
            <label>Date of birth:</label>
            <input type="date" name="birthday" value="{{ old('birthday') }}" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required placeholder="Enter your email">
        </div>

        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="address" value="{{ old('address') }}" placeholder="Enter your address">
        </div>

        <div class="form-group">
            <label>Phone:</label>
            <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="Enter your phone number">
        </div>

        <button type="submit">REGISTRATION</button>
    </form>
</div>

</body>
</html>