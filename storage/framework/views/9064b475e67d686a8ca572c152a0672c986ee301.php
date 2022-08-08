<?php $__env->startSection('title'); ?>
Tag &mdash; <?php echo e($setting->admin_title); ?>

<?php $__env->stopSection(); ?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-tags"></i> TAGS
            </div>
            <div class="card-body">

                <form action="" method="GET">
                    <div class="input-group">
                        <div class="input-group-append">
                            <a href="<?php echo e(route('console.tags.create')); ?>" class="btn btn-dark"><i
                                    class="fa fa-plus-circle"></i>
                                ADD
                            </a>
                        </div>
                        <input type="text" wire:model="search" placeholder="cari sesuatu disini..." class="form-control">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> SEARCH
                            </button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">NO.</th>
                                <th scope="col">TAG</th>
                                <th scope="col">OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th class="text-center" scope="row"><?php echo e(++$no + ($tags->currentPage()-1) * $tags->perPage()); ?></th>
                                <td><?php echo e($tag->name); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('console.tags.edit', $tag->id)); ?>"
                                        class="btn btn-sm btn-primary">EDIT</a>
                                    <button wire:click="destroy(<?php echo e($tag->id); ?>)" class="btn btn-sm btn-danger">DELETE</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($tags->links()); ?>

                </div>

            </div>
        </div>
    </div>
</div><?php /**PATH D:\laravel\sk-store\resources\views/livewire/console/tags/index.blade.php ENDPATH**/ ?>