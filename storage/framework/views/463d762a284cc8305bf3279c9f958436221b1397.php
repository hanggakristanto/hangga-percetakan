<style>
    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #171d26;
        border-color: #171d26;
    }
</style>
<div class="list-group">
    <a href="<?php echo e(route('customer.dashboard.index')); ?>" class="list-group-item list-group-item-action <?php echo e(setActive('customer/dashboard')); ?>"><i class="fa fa-tachometer-alt"></i> DASHBOARD</a>
    <a href="<?php echo e(route('customer.orders.index')); ?>" class="list-group-item list-group-item-action <?php echo e(setActive('customer/orders')); ?>"><i class="fa fa-shopping-cart"></i> MY ORDERS</a>
    <a href="<?php echo e(route('customer.profile.index')); ?>" class="list-group-item list-group-item-action <?php echo e(setActive('customer/profile')); ?>"><i class="fa fa-user-circle"></i> MY PROFILE</a>
</div>
<?php /**PATH D:\laravel\sk-store\resources\views/layouts/customer_menu.blade.php ENDPATH**/ ?>