<?php $__env->startSection('title'); ?>
<?php echo e($category_name); ?> &mdash; <?php echo e($setting->site_title); ?>

<?php $__env->stopSection(); ?>

<div class="mb-5">
    <div class="container-fluid" style="margin-top: 80px;">


            <div class="jumbotron rounded-lg shadow" style="background-color: #566479;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="card border-0 shadow rounded-full">
                            <div class="card-body">
                                <img src="<?php echo e(Storage::url('public/categories/'.$category_image)); ?>" style="width: 70px">
                            </div>
                        </div>
                    </div>
                    <div class="text-center text-white mt-3 font-weight-bold" style="font-size: 24px"><?php echo e($category_name); ?></div>
                </div>
            </div>


        <div class="row">

            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php
            $harga_set = $product->price * $product->discount / 100;
            $harga_diskon = $product->price - $harga_set;
            ?>

            <div class="col-6 col-md-3 mb-4">
                <div class="card h-100 border-0 shadow rounded-md">
                    <div class="card-img">
                        <img src="<?php echo e(Storage::url('public/products/'.$product->image)); ?>" class="w-100 rounded-t-md"
                            style="height: 15em;object-fit:cover">
                    </div>
                    <div class="card-body">
                        <div class="card-title font-weight-bold" style="font-size:20px">
                            <?php echo e($product->title); ?>

                        </div>
                        <div class="satuan" style="color: #999"><?php echo e($product->unit_weight); ?> <?php echo e($product->unit); ?></div>

                        <?php if($product->discount > 0): ?>
                        <div class="discount mt-2" style="color: #999"><s><?php echo e(money_id($product->price)); ?></s> <span
                                style="background-color: #F69C07" class="badge badge-pill badge-warning text-white">Save
                                <?php echo e($product->discount); ?> %</span>
                        </div>
                        <?php endif; ?>

                        <div class="price font-weight-bold mt-3" style="color: #47b04b;font-size:20px">
                            <?php echo e(money_id($harga_diskon)); ?></div>
                        <button wire:click="addToCart(<?php echo e($product->id); ?>)" class="btn btn-success btn-md mt-3 btn-block shadow-md">Beli</button>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row justify-content-center mt-5">
            <?php if($products->hasMorePages()): ?>
                <button wire:click="loadMore()" class="btn btn-dark btn-lg shadow-md">Load More</button>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH D:\laravel\sk-store\resources\views/livewire/frontend/category/show.blade.php ENDPATH**/ ?>