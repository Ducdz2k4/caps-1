@extends('layouts.board')

@section('content')
<style>
    .dashboard-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 12px !important;
        border: none !important;
    }
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
    }
    .icon-box {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }
    .bg-soft-primary { background-color: rgba(78, 115, 223, 0.1); color: #4e73df; }
    .bg-soft-success { background-color: rgba(28, 200, 138, 0.1); color: #1cc88a; }
    .bg-soft-info { background-color: rgba(54, 185, 204, 0.1); color: #36b9cc; }
    .bg-soft-warning { background-color: rgba(246, 194, 62, 0.1); color: #f6c23e; }
    
    .progress {
        border-radius: 10px;
        background-color: #eaecf4;
        overflow: hidden;
    }
    .progress-bar {
        border-radius: 10px;
    }
</style>

<div class="container-fluid py-4">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 font-weight-bold">Welcome</h1>
    </div>

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" href="{{ route('student.notification.index') }}">
                <div class="card shadow-sm h-100 py-2 dashboard-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    General Notification</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $note_generals->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <div class="icon-box bg-soft-primary">
                                    <i class="fas fa-bell"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" href="{{ route('student.notification.index') }}">
                <div class="card shadow-sm h-100 py-2 dashboard-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Specific Notification</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $note_privates->count() }}</div>
                            </div>
                            <div class="col-auto">
                                <div class="icon-box bg-soft-success">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" href="{{ route('student.exam.index') }}">
                <div class="card shadow-sm h-100 py-2 dashboard-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Exam Progress</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $percent_exam }}%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: {{ $percent_exam }}%" aria-valuenow="{{ $percent_exam }}" aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="icon-box bg-soft-info">
                                    <i class="fas fa-clipboard-list"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a class="text-decoration-none" href="{{ route('student.class.index') }}">
                <div class="card shadow-sm h-100 py-2 dashboard-card">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Classes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ Auth::guard('web')->user()->classes->count() }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="icon-box bg-soft-warning">
                                    <i class="fas fa-book"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 dashboard-card">
                <div class="card-header bg-white py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Your Courses Progress</h6>
                </div>
                <div class="card-body">
                    @foreach (Auth::guard('web')->user()->classes as $class)
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="font-weight-bold text-dark">{{ $class->course->name }}</span>
                            <span class="badge badge-pill badge-light font-weight-bold text-primary">{{ $class->percentExamComplete() }}%</span>
                        </div>
                        <div class="progress mb-2" style="height: 10px;">
                            <div class="progress-bar bg-gradient-primary shadow-none"
                                role="progressbar"
                                style="width: {{ $class->percentExamComplete() }}%">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection