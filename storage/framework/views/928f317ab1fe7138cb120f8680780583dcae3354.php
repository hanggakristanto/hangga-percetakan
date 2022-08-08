<div>
    <li class="nav-item ml-3 mr-3">
        <a href="<?php echo e(route('frontend.cart.index')); ?>" class="btn btn-md shadow btn-outline-dark btn-block" style="color: #333;background-color: #fff;border-color: #fff;"><i class="fa fa-shopping-cart"></i> <?php echo e($cartTotal); ?> | <?php echo e(money_id($cartTotalPrice)); ?></a>
    </li>
</div>
<?php /**PATH D:\laravel\sk-store\resources\views/livewire/frontend/cart/header.blade.php ENDPATH**/ ?>