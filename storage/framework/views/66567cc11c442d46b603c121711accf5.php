<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <title>restoren</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Favicon -->
      <link href="<?php echo e(asset('favicon.ico')); ?>" rel="icon">

      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

      <!-- Icon Font Stylesheet -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

      <!-- Libraries Stylesheet -->
      <link href="<?php echo e(asset('lib/animate/animate.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
      <link href="<?php echo e(asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')); ?>" rel="stylesheet" />

      <!-- Customized Bootstrap Stylesheet -->
      <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

      <!-- Template Stylesheet -->
      <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="<?php echo e(url('/')); ?>" class="nav-item nav-link active">Home</a>
                        <a href="<?php echo e(url('/about')); ?>" class="nav-item nav-link">About</a>
                        <a href="<?php echo e(url('/service')); ?>" class="nav-item nav-link">Service</a>
                        <a href="<?php echo e(url('/menu')); ?>" class="nav-item nav-link">Menu</a>
                        <a href="<?php echo e(url('/cart')); ?>" class="nav-item nav-link"><i
                                class="fa-sharp fa-solid fa-cart-shopping"></i>Cart</a>


                        <a href="<?php echo e(url('/contact')); ?>" class="nav-item nav-link">Contact</a>
                        <a href="<?php echo e(url('/login')); ?>" class="nav-item nav-link">Login</a>
                        <a href="<?php echo e(url('/register')); ?>" class="nav-item nav-link">Register</a>
                    </div>

                </div>
            </nav>

        </div>
        <!-- Navbar & Hero End -->
<?php /**PATH D:\My Projects\laravel prartice\api_development\resources\views/partials/header.blade.php ENDPATH**/ ?>