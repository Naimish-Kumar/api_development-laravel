@extends('layouts.app')

@section('content')
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center"
        style="background: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);">
        <div class="col-md-6 col-lg-4 py-5">
            <div class="card shadow-lg border-0 rounded-3 hover-effect"
                style="backdrop-filter: blur(10px); background-color: rgba(255, 255, 255, 0.95);">
                <div class="card-header text-white text-center py-4"
                    style="background: linear-gradient(45deg, #2193b0, #6dd5ed);">
                    <i class="fas fa-user-shield fa-3x mb-3 animate__animated animate__fadeIn"></i>
                    <h2 class="font-weight-bold text-shadow">Admin Register</h2>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('admin.register') }}" method="POST"
                        class="bg-white rounded-lg transform transition-all duration-300 ease-in-out">
                        @csrf
                        <div class="input-group mb-4 hover-lift">
                            <span class="input-group-text text-white border-0"
                                style="background: linear-gradient(45deg,  #2193b0, #6dd5ed);">
                                <i class="fas fa-user"></i>
                            </span>
                            <input type="text" name="name" required
                                class="form-control form-control-lg border-start-0 shadow-none"
                                placeholder="Enter your name" style="transition: all 0.3s ease;">
                        </div>

                        <div class="input-group mb-4 hover-lift">
                            <span class="input-group-text text-white border-0"
                                style="background: linear-gradient(45deg,  #2193b0, #6dd5ed);">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email" name="email" required
                                class="form-control form-control-lg border-start-0 shadow-none"
                                placeholder="Enter your email" style="transition: all 0.3s ease;">
                        </div>

                        <div class="input-group mb-4 hover-lift">
                            <span class="input-group-text text-white border-0"
                                style="background: linear-gradient(45deg,  #2193b0, #6dd5ed);">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password" required
                                class="form-control form-control-lg border-start-0 shadow-none"
                                placeholder="Enter your Password" style="transition: all 0.3s ease;">
                        </div>

                        <button type="submit"
                            class="btn text-white btn-lg w-100 text-uppercase fw-bold position-relative overflow-hidden mb-3"
                            style="background: linear-gradient(45deg, #2193b0, #6dd5ed); transition: all 0.3s ease;">
                            <i class="fas fa-sign-in-alt me-2"></i>Register
                            <div class="ripple"></div>
                        </button>

                        <div class="text-center">
                            <p class="mb-0">Already have an account?
                                <a href="{{ route('admin.login') }}" class="text-decoration-none"
                                    style="color:  #2193b0;">Login here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .hover-lift:hover {
            transform: translateY(-2px);
            transition: transform 0.3s ease;
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .form-control:focus {
            border-color: #C850C0;
            box-shadow: 0 0 0 0.2rem rgba(200, 80, 192, 0.25);
        }

        .ripple {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #4158D0, #C850C0);
            opacity: 0;
            transition: all 0.3s ease;
        }

        button:hover .ripple {
            opacity: 0.2;
            transform: scale(1.1);
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
@endsection
