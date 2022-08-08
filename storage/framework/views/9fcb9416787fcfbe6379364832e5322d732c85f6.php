<?php $__env->startSection('title'); ?>
Users &mdash; <?php echo e($setting->admin_title); ?>

<?php $__env->stopSection(); ?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-users"></i> USERS
            </div>
            <div class="card-body">

                <form action="" method="GET">
                    <div class="input-group">
                        <div class="input-group-append">
                            <a href="<?php echo e(route('console.users.create')); ?>" class="btn btn-dark"><i
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
                                <th scope="col">EMAIL ADDRESS</th>
                                <th scope="col">FULL NAME</th>
                                <th scope="col">OPTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th class="text-center" scope="row"><?php echo e(++$no + ($users->currentPage()-1) * $users->perPage()); ?></th>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e($user->name); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('console.users.edit', $user->id)); ?>"
                                        class="btn btn-sm btn-primary">EDIT</a>
                                    <button wire:click="destroy(<?php echo e($user->id); ?>)" class="btn btn-sm btn-danger">DELETE</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($users->links()); ?>

                </div>

            </div>
        </div>
    </div>
</div><?php /**PATH D:\laravel\sk-store\resources\views/livewire/console/users/index.blade.php ENDPATH**/ ?>