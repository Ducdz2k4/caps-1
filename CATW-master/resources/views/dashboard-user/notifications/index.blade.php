@extends('layouts.board')

@section('content')
<div class="container mt-4">

    <!-- Header -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body d-flex align-items-center bg-light rounded">
            <i class="far fa-envelope fa-2x text-primary mr-3"></i>
            <h4 class="mb-0 text-primary">Notification</h4>
        </div>
    </div>

    <!-- Notification Options -->
    <div class="row">

        <!-- Private -->
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0 h-100 text-center p-4 hover-card"
                 data-toggle="modal" data-target="#modalPrivate"
                 style="cursor:pointer;">
                 
                <i class="fas fa-user fa-2x text-success mb-2"></i>
                <h5>Specific Notification</h5>
                <p class="text-muted">Your personal notifications</p>
            </div>
        </div>

        <!-- General -->
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0 h-100 text-center p-4 hover-card"
                 data-toggle="modal" data-target="#modalGeneral"
                 style="cursor:pointer;">
                 
                <i class="fas fa-users fa-2x text-info mb-2"></i>
                <h5>General Notification</h5>
                <p class="text-muted">All course announcements</p>
            </div>
        </div>

    </div>
</div>

<!-- ================= MODAL PRIVATE ================= -->
<div class="modal fade" id="modalPrivate">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0">

            <div class="modal-header text-white"
                 style="background: linear-gradient(45deg, #43e97b, #38f9d7);">
                <h5 class="modal-title">Specific Notification</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                @forelse ($note_privates as $note)
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="text-success">{{ $note->title }}</h5>
                            <p class="mb-0">{{ $note->content }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center">No notifications</p>
                @endforelse
            </div>

            <div class="modal-footer">
                <button class="btn btn-outline-success" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- ================= MODAL GENERAL ================= -->
<div class="modal fade" id="modalGeneral">
    <div class="modal-dialog modal-lg">
        <div class="modal-content border-0">

            <div class="modal-header text-white"
                 style="background: linear-gradient(45deg, #4facfe, #00f2fe);">
                <h5 class="modal-title">General Notification</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                @forelse ($note_generals as $note)
                    <div class="card mb-3 border-0 shadow-sm">
                        <div class="card-body">
                            <small class="text-muted">
                                {{ $note->class->course->name }}
                            </small>
                            <h5 class="text-info">{{ $note->title }}</h5>
                            <p class="mb-0">{{ $note->content }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-muted text-center">No notifications</p>
                @endforelse
            </div>

            <div class="modal-footer">
                <button class="btn btn-outline-primary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

@endsection