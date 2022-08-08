<?php $__env->startSection('title'); ?>
Sliders &mdash; <?php echo e($setting->admin_title); ?>

<?php $__env->stopSection(); ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-laptop"></i> SLIDERS
            </div>
            <div class="card-body">
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">NO.</th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th class="text-center" scope="row">
                                    <?php echo e(++$no + ($sliders->currentPage()-1) * $sliders->perPage()); ?></th>
                                <td class="text-center">
                                    <img src="<?php echo e(Storage::url('public/sliders/'.$slider->image)); ?>" class="w-100 rounded" style="height: 200px">
                                    <br>
                                    <p class="mt-2"><?php echo e($slider->link); ?></p>
                                </td>
                                <td class="text-center">
                                    <button wire:click="destroy(<?php echo e($slider->id); ?>)"
                                        class="btn btn-sm btn-danger">DELETE</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($sliders->links()); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <?php if(session()->has('error_image')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error_image')); ?>

        </div>
        <?php endif; ?>
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-image"></i> UPLOAD SLIDER
            </div>
            <div class="card-body">
                <?php if($image): ?>
                <div class="text-center">
                    <img src="<?php echo e($image); ?>" alt="" style="height: 250px;width:100%;object-fit:cover"
                        class="img-thumbnail">
                    <p>PREVIEW</p>
                </div>
                <?php else: ?>
                <div class="text-center">
                    <img src="<?php echo e(asset('images/image.png')); ?>" alt="" style="height: 250px;width:100%;object-fit:cover"
                        class="img-thumbnail">
                    <p>PREVIEW</p>
                </div>
                <?php endif; ?>
                <hr>
                <form wire:submit.prevent="store">
                    <div class="form-group">
                        <input type="file" id="image" class="form-control" wire:change="$emit('fileChoosen')" required>
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
                        <label>Link Slider</label>
                        <input type="text" class="form-control" wire:model.lazy="link" placeholder="Link Slider">
                        <?php $__errorArgs = ['link'];
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

                    <button type="submit" class="btn btn-primary btn-block mt-4">UPLOAD</button>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    window.livewire.on('fileChoosen', () => {
        let inputField = document.getElementById('image')
        let file = inputField.files[0]
        let reader = new FileReader();
        reader.onloadend = () => {
            window.livewire.emit('fileUpload', reader.result)
        }
        reader.readAsDataURL(file);
    })
</script><?php /**PATH D:\laravel\sk-store\resources\views/livewire/console/sliders/index.blade.php ENDPATH**/ ?>