@extends('layouts.app')

@section('content')
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center"
        style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 rounded-lg hover-effect">
                <div class="card-header text-white text-center py-4"
                    style="background: linear-gradient(45deg, #2193b0, #6dd5ed);">
                    <i class="fas fa-user-shield fa-3x mb-3"></i>
                    <h2 class="font-weight-bold">Admin Login</h2>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('admin.login') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text text-white"
                                    style="background: linear-gradient(45deg, #2193b0, #6dd5ed);">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" name="email" id="email"
                                    class="form-control form-control-lg border-start-0" placeholder="Enter your email"
                                    required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="input-group">
                                <span class="input-group-text text-white"
                                    style="background: linear-gradient(45deg, #2193b0, #6dd5ed);">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" id="password"
                                    class="form-control form-control-lg border-start-0" placeholder="Enter your password"
                                    required>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn text-white btn-lg text-uppercase fw-bold"
                                style="background: linear-gradient(45deg, #2193b0, #6dd5ed);">
                                <i class="fas fa-sign-in-alt me-2"></i> Sign In
                            </button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <p class="mb-0">Don't have an account? <a href="{{ route('admin.register') }}"
                                class="text-decoration-none" style="color: #2193b0;">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
