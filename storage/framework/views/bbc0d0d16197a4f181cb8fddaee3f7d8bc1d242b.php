<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="shortcut icon" href="<?php echo e(Storage::url('public/logo/'.$setting->logo)); ?>" type="image/x-icon"/>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">    
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo \Livewire\Livewire::scripts(); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="<?php echo e(mix('js/app.js')); ?>"></script>    
    <style>
        body{
            font-family: 'Quicksand', sans-serif;
        }
    </style>
</head>

<body style="background-color: #e2e8f0;">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="text-center mb-4">
                    <img src="<?php echo e(Storage::url('public/logo/'.$setting->logo)); ?>" style="width: 100px;background-color: #fff;border-radius: 50%;padding: 8px;">
                    <h3 class="font-weight-bold mt-2">Sofiduta</h3>
                </div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
    
    <script>
        <?php if(session()->has('success')): ?>
            toastr.success('<?php echo e(session('success')); ?>')
        <?php elseif(session()->has('error')): ?>
            toastr.error('<?php echo e(session('error')); ?>')
        <?php endif; ?>
    </script>
</body>

</html><?php /**PATH D:\laravel\sk-store\resources\views/layouts/auth.blade.php ENDPATH**/ ?>