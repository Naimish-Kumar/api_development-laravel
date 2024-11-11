<?php $__env->startSection('content'); ?>
    <!-- Admin Header -->
    <div class="container-fluid bg-dark text-white p-3 mb-4">
        <div class="row">
            <div class="col-md-6">
                <h4>Welcome, <?php echo e(auth()->user()->name); ?></h4>
                <small><?php echo e(auth()->user()->email); ?></small>
            </div>
            <div class="col-md-6 text-end">
                <form action="<?php echo e(route('admin.logout')); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text">Manage your product categories</p>
                        <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-primary">Manage Categories</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Subcategories</h5>
                        <p class="card-text">Manage your product subcategories</p>
                        <a href="<?php echo e(route('subcategories.index')); ?>" class="btn btn-primary">Manage Subcategories</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">Manage your products inventory</p>
                        <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">Manage Products</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Categories</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Subcategories</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\My Projects\laravel prartice\api_development\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>