<?php $__env->startSection('title'); ?>
    <?php echo e($setting->site_title); ?>

<?php $__env->stopSection(); ?>

<div class="mb-5">
    <div class="container-fluid" style="margin-top: 70px;">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $active = "active" ?>
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($active); ?>">
                    <a href="<?php echo e($slider->link); ?>">
                        <img src="<?php echo e(Storage::url('public/sliders/').$slider->image); ?>"
                            class="d-block w-100 rounded-lg">
                    </a>
                </div>
                <?php echo e($active = ""); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <div class="row text-center">
            <?php $__currentLoopData = $global_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-4 col-md-2 mb-4">
                <a href="<?php echo e(route('frontend.category.show', $category->slug)); ?>" class="text-decoration-none text-dark">
                    <div class="card h-100 border-0 shadow p-2 rounded-lg">
                        <div class="card-img">
                            <img src="<?php echo e(Storage::url('public/categories/'.$category->image)); ?>"
                                class="w-50">
                            <div class="title-category mt-2 font-weight-bold"><?php echo e($category->name); ?></div>
                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="container-fluid mt-3">
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
<?php /**PATH D:\laravel\sk-store\resources\views/livewire/frontend/home/index.blade.php ENDPATH**/ ?>