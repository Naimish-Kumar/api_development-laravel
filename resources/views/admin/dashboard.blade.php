@extends('layouts.app')
@section('content')
    <!-- Admin Header -->
    <div class="container-fluid bg-dark text-white p-3 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h4>Welcome, {{ auth()->user()->name }}</h4>
                <small>{{ auth()->user()->email }}</small>
            </div>
            <div class="col-md-6 text-end">
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>




@endsection
