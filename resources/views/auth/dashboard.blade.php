<!-- resources/views/auth/dashboard.blade.php -->
@extends('auth.layouts')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Dashboard Header -->
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Dashboard</h5>
                </div>
                <div class="card-body">
                    <!-- Success Message -->
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Error Message -->
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Admin Page Link -->
                    <div class="text-center mt-4">
                        <h4 class="fw-bold">Go to Admin Page</h4>
                        <a href="{{ route('adminpage') }}" class="btn btn-outline-primary mt-3">
                            <i class="fas fa-lock"></i> Access Admin Panel
                        </a>
                    </div>
                </div>
            </div>

            <!-- User Management Card -->
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">User Management</h5>
                </div>
                <div class="card-body text-center">
                    <h4 class="fw-bold">Manage Users</h4>
                    <p class="text-muted">You can perform CRUD operations on user data, including adding profile pictures.</p>
                    <a href="{{ route('datausers.index') }}" class="btn btn-outline-success mt-3">
                        <i class="fas fa-users"></i> Go to User Management
                    </a>
                </div>
            </div>

            <!-- Gallery Management Card -->
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Gallery Management</h5>
                </div>
                <div class="card-body text-center">
                    <h4 class="fw-bold">Manage Image Galleries</h4>
                    <p class="text-muted">You can perform CRUD operations on image galleries to maintain visual content.</p>
                    <a href="{{ route('gallery.index') }}" class="btn btn-outline-info mt-3">
                        <i class="fas fa-images"></i> Go to Gallery Management
                    </a>
                </div>
            </div>
            <br><br><br>

        </div>
    </div>
</div>
@endsection
