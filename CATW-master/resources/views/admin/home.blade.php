@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4 text-align-center ">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Users</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-500">
                                {{ $users->count() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4 text-align-center">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-11 mr-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Courses</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-500">{{ $courses->count() }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4 text-align-center">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-11 mr-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Classes</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-500">{{ $classes->count() }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4 text-align-center">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-11 mr-4">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Lessons</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-500">{{ $lessons->count() }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row justify-content-around">
        <div class="col-md-6 mb-4 text-align-center">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-11 mr-4">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Admins</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-500">{{ $admins->count() }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4 text-align-center">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-11 mr-4">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Managers</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-500">{{ $managers->count() }}</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection