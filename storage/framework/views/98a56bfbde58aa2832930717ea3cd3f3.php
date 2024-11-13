<?php $__env->startSection('content'); ?>
<div class="container" style="padding-top: 10rem">

    <div class="col-md-12 bg-dark" >
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Login</h5>
            <h1 class="text-white mb-4">Login</h1>
            <form class="col-md-12">
                <div class="row g-3">

                    <div class="">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                            <label for="email">Your Email</label>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-floating">
                            <input type="password" class="form-control" id="email" placeholder="Your Email">
                            <label for="password">Password</label>
                        </div>
                    </div>



                    <div class="col-md-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Projects\laravel prartice\api_development\resources\views/user/auth/login.blade.php ENDPATH**/ ?>