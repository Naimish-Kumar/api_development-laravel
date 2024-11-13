@extends('layouts.app')
@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-6">
                    <div class="row g-3">
                        <div class="col-12 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('images/menu-1.jpg')}}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4">Check Wings</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos erat ipsum et lorem et sit, sed stet lorem sit.</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                        eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h3>Price: $ 15 </h3>
                            </div>
                        </div>

                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>

@endauth
