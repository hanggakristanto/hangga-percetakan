<?php $__env->startSection('title'); ?>
Add Category &mdash; <?php echo e($setting->admin_title); ?>

<?php $__env->stopSection(); ?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <?php if(session()->has('error_image')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error_image')); ?>

        </div>
        <?php endif; ?>
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-folder"></i> ADD CATEGORY
            </div>
            <div class="card-body">
                <form wire:submit.prevent="store" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-12">
                            <?php if($image): ?>
                            <div class="text-center">
                                <img src="<?php echo e($image->temporaryUrl()); ?>" alt="" style="height: 150px;width:150px;object-fit:cover"
                                    class="img-thumbnail">
                                    <p>PREVIEW</p>
                            </div>
                            <?php else: ?>
                                <div class="text-center">
                                <img src="<?php echo e(asset('images/image.png')); ?>" alt="" style="height: 150px;width:150px;object-fit:cover"
                                    class="img-thumbnail">
                                    <p>PREVIEW</p>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" id="image" class="form-control" wire:model="image"
                                    required>
                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" wire:model.lazy="name"
                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Fullname">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback">
                                    <?php echo e($message); ?>

                                </div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">SAVE</button>
                    <button type="reset" class="btn btn-warning">RESET</button>
                </form>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\laravel\sk-store\resources\views/livewire/console/categories/create.blade.php ENDPATH**/ ?>