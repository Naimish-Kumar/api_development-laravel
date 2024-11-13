@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-sm bg-gradient-to-r from-emerald-500 to-teal-600">
        <a class="navbar-brand" href="#">
            <img class="h-12 w-auto object-contain transform hover:scale-110 transition-transform duration-300 rounded-lg shadow-md"
                src="{{ asset('images/logo.png') }}" alt="Logo" style="filter: none;">
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
            data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link text-white hover:bg-white/10 rounded-lg px-4 py-2 flex items-center" href="#">
                        <i class="fas fa-home mr-2"></i>Home
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white hover:bg-white/10 rounded-lg px-4 py-2 flex items-center" href="#">
                        <i class="fas fa-cogs mr-2"></i>Services
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white hover:bg-white/10 rounded-lg px-4 py-2 flex items-center" href="#">
                        <i class="fas fa-box-open mr-2"></i>Products
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white hover:bg-white/10 rounded-lg px-4 py-2 flex items-center" href="#">
                        <i class="fas fa-info-circle mr-2"></i>About Us
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white hover:bg-white/10 rounded-lg px-4 py-2 flex items-center" href="#">
                        <i class="fas fa-envelope mr-2"></i>Contact Us
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <style>
        .navbar {
            padding: 0rem 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        img {
            height: 50px;
            width: auto;
        }

        .nav-link {
            margin: 0 0.5rem;
            transition: all 0.3s ease;
            color: black !important;
            font-weight: 500;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 5px;
            padding: 0.5rem;
            font-family: 'Poppins', sans-serif;
        }

        .nav-link:hover {
            transform: translateY(-2px);
            color: orangered !important;
            font-weight: 500;
            font-size: 1.02rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 5px;
            padding: 0.5rem;
            font-family: 'Poppins', sans-serif;
        }
    </style>
    @endsection
