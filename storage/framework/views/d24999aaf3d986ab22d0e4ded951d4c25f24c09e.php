<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="shortcut icon" href="<?php echo e(Storage::url('public/logo/'.$setting->logo)); ?>" type="image/x-icon" />
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://raw.githack.com/ttskch/select2-bootstrap4-theme/master/dist/select2-bootstrap4.css" rel="stylesheet" />    
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="<?php echo e(mix('js/app.js')); ?>"></script>
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>

<body style="background-color: #e2e8f0;">

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark text-white mb-5"
        style="background-color: #171d26!important;">
        <a href="/" class="navbar-brand font-weight-bold"><i class="fa fa-carrot"></i> Sofiduta</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-sk">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar-sk">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fa fa-list-ul"></i> CATEGORIES
                    </a>
                    <div class="dropdown-menu border-0 shadow-sm dropdown-menu-right"
                        aria-labelledby="navbarDropdownMenuLink">
                        <?php $__currentLoopData = $global_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="dropdown-item" href="<?php echo e(route('frontend.category.show', $category->slug)); ?>"><img
                                src="<?php echo e(Storage::url('public/categories/'.$category->image)); ?>" class="rounded"
                                style="width: 20px"> <?php echo e($category->name); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </li>
            </ul>
            <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('frontend.search.index', [])->dom;
} elseif ($_instance->childHasBeenRendered('SbpuuIX')) {
    $componentId = $_instance->getRenderedChildComponentId('SbpuuIX');
    $componentTag = $_instance->getRenderedChildComponentTagName('SbpuuIX');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SbpuuIX');
} else {
    $response = \Livewire\Livewire::mount('frontend.search.index', []);
    $dom = $response->dom;
    $_instance->logRenderedChild('SbpuuIX', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
            <ul class="nav navbar-nav navbar-right ml-auto">
                <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('frontend.cart.header', [])->dom;
} elseif ($_instance->childHasBeenRendered('QJ4QeTD')) {
    $componentId = $_instance->getRenderedChildComponentId('QJ4QeTD');
    $componentTag = $_instance->getRenderedChildComponentTagName('QJ4QeTD');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('QJ4QeTD');
} else {
    $response = \Livewire\Livewire::mount('frontend.cart.header', []);
    $dom = $response->dom;
    $_instance->logRenderedChild('QJ4QeTD', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>

                <?php if(Auth::guard('customer')->check()): ?>
                <ul class="navbar-nav d-none d-md-block ml-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle font-weight-bold text-white" href="#" id="navbarDropdown"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle"></i> <?php echo e(Auth::guard('customer')->user()->name); ?>

                        </a>
                        <div class="dropdown-menu border-0 shadow" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo e(route('customer.dashboard.index')); ?>"><i
                                    class="fa fa-tachometer-alt"></i> DASHBOARD</a>
                            <a class="dropdown-item" href="<?php echo e(route('customer.orders.index')); ?>"><i class="fa fa-shopping-cart"></i> MY ORDERS</a>
                            <div class="dropdown-divider"></div>
                            <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount('customer.auth.logout', [])->dom;
} elseif ($_instance->childHasBeenRendered('Pnyh4F2')) {
    $componentId = $_instance->getRenderedChildComponentId('Pnyh4F2');
    $componentTag = $_instance->getRenderedChildComponentTagName('Pnyh4F2');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Pnyh4F2');
} else {
    $response = \Livewire\Livewire::mount('customer.auth.logout', []);
    $dom = $response->dom;
    $_instance->logRenderedChild('Pnyh4F2', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
                        </div>
                </ul>
                <?php else: ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('customer.auth.login')); ?>" class="btn btn-md shadow btn-outline-dark btn-block"
                        style="color: #fff;background-color: #343a40;border-color: #343a40;"><i
                            class="fa fa-user-circle"></i> ACCOUNT</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <?php if(Auth::guard('customer')->check() && request()->segment(1) == "customer"): ?>
    <div class="jumbotron rounded-0" style="background-color: #566479;padding-bottom:8rem">
        <div class="container">
        </div>
    </div>
    <?php endif; ?>

    <div class="container-fluid mb-5">

        <?php echo $__env->yieldContent('content'); ?>

    </div>

    <script>
        <?php if(session()->has('success')): ?>
            toastr.success('<?php echo e(session('success')); ?>')
        <?php elseif(session()->has('error')): ?>
            toastr.error('<?php echo e(session('error')); ?>')
        <?php endif; ?>

        window.livewire.on('alert', param => {
            toastr[param['type']](param['message']);
            toastr.options.preventDuplicates = true;
        });
    </script>
</body>
</html><?php /**PATH D:\laravel\sk-store\resources\views/layouts/frontend.blade.php ENDPATH**/ ?>