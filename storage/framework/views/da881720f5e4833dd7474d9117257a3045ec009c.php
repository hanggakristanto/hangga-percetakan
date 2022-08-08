<?php $__env->startSection('title'); ?>
Dashboard &mdash; <?php echo e($setting->site_title); ?>

<?php $__env->stopSection(); ?>

<div style="margin-top: -120px">
    <div class="container-fluid mb-lg-5 mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card border-0 shadow rounded-lg mb-4">
                    <div class="card-body p-3">
                        <h6 class="font-weight-bold"><i class="fa fa-list-ul"></i> MAIN MENU</h6>
                        <hr>
                        <?php echo $__env->make('layouts.customer_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card border-0 shadow rounded-lg">
                    <div class="card-body">
                        <h6 class="font-weight-bold"><i class="fa fa-tachometer-alt"></i> DASHBOARD</h6>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH D:\laravel\sk-store\resources\views/livewire/customer/dashboard/index.blade.php ENDPATH**/ ?>