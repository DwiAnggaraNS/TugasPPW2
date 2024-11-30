<!-- resources/views/auth/adminpage.blade.php -->
@extends('auth.layouts')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Admin Dashboard Welcome Card -->
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Admin Dashboard</h5>
                </div>
                <div class="card-body text-center">
                    <h4 class="fw-bold">Welcome to the Admin Panel</h4>
                    <p class="text-muted">This is a restricted area for administrators only. Please manage responsibly.</p>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-primary mt-3">
                        <i class="fas fa-arrow-left"></i> Back to Dashboard
                    </a>
                </div>
            </div>

            <!-- User Management Card -->
            <div class="card shadow-lg mb-4">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">User Management</h5>
                </div>
                <div class="card-body text-center">
                    <h4 class="fw-bold">Manage Users</h4>
                    <p class="text-muted">Admins can perform CRUD operations on user data, including adding profile pictures.</p>
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
                    <p class="text-muted">Admins can perform CRUD operations on image galleries to maintain visual content.</p>
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
