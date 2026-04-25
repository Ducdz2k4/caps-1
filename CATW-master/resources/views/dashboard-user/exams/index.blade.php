@extends('layouts.board')

@section('content')
<div class="container mt-4">

    <!-- Header -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body d-flex align-items-center bg-light rounded">
            <i class="fas fa-user-graduate fa-2x text-primary mr-3"></i>
            <h4 class="mb-0 text-primary">
                Hello, {{ Auth::guard('web')->user()->fullname }}
            </h4>
        </div>
    </div>

    <!-- List Class -->
    @foreach (Auth::guard('web')->user()->classes as $class)

    <div class="card shadow-sm mb-4 border-0">
        
        <!-- Course Title -->
        <div class="card-header text-white text-center"
             style="background: linear-gradient(45deg, #4facfe, #00f2fe);">
            <h5 class="mb-0">
                <i class="fas fa-book mr-2"></i>
                {{ $class->course->name }}
            </h5>
        </div>

        <!-- Table -->
        <div class="card-body p-0">
            <table class="table table-hover mb-0 text-center">
                
                <!-- đổi màu tại đây -->
                <thead style="background-color: #e3f2fd;">
                    <tr>
                        <th>Schedule</th>
                        <th>Score</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($class->course->exams as $exam)

                    @php
                        $score = $exam->scores
                            ->where('id', Auth::guard('web')->user()->id)
                            ->first()->pivot->score ?? null;
                    @endphp

                    <tr>
                        <td>{{ $exam->name }}</td>

                        <td>
                            @if($score)
                                <span class="badge badge-success">
                                    {{ $score }}
                                </span>
                            @else
                                <span class="badge badge-light border">
                                    No point
                                </span>
                            @endif
                        </td>

                        <td>
                            @if (!$score && $exam->status == 'UnLock')
                                <a href="{{ route('student.exam.quiz',$exam->id) }}"
                                   class="btn btn-sm btn-info">
                                   Take Exam
                                </a>
                            @else
                                <button class="btn btn-sm btn-outline-secondary" disabled>
                                    Done
                                </button>
                            @endif
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endforeach

</div>
@endsection