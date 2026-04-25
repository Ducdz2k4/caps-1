@extends('layouts.board')

@section('content')
<div class="container mt-4">

    <div class="mb-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-graduation-cap fa-lg text-primary mr-2"></i>
            <h4 class="mb-0">
                Hello, {{ Auth::guard('web')->user()->fullname }}
            </h4>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded">
        <div class="card-header text-white" style="background: linear-gradient(45deg, #4268D6, #224abe);">
            <strong>Your Classes</strong>
        </div>

        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="text-white" style="background-color: #4268D6;">
                    <tr>
                        <th>Course name</th>
                        <th>Schedule</th>
                        <th>Start time</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (Auth::guard('web')->user()->classes as $class)
                    <tr>
                        <td class="font-weight-bold">
                            {{ $class->course->name }}
                        </td>

                        <td>{{ $class->schedule }}</td>

                        <td>{{ $class->start }}</td>

                        <td class="text-center">
                            <a class="btn btn-sm btn-success mr-1"
                               href="{{ route('student.lesson.show',$class->course->id) }}">
                                <i class="fas fa-book-open"></i> Lessons
                            </a>

                            <a class="btn btn-sm btn-info"
                               href="{{ route('student.class.show',$class->id) }}">
                                <i class="fas fa-chart-bar"></i> Score
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection