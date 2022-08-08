<?php $__env->startSection('title'); ?>
Payment &mdash; <?php echo e($setting->admin_title); ?>

<?php $__env->stopSection(); ?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-credit-card"></i> PAYMENT
            </div>
            <div class="card-body">

                <form action="" method="GET">
                    <div class="input-group">
                        <input type="text" wire:model="search" placeholder="cari sesuatu disini..." class="form-control">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> SEARCH
                            </button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" style="text-align: center;width: 6%">NO.</th>
                            <th scope="col">NO. INVOICE</th>
                            <th scope="col">GRAND TOTAL</th>
                            <th scope="col">DATE</th>
                            <th scope="col" style="width: 15%;text-align: center">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row" style="text-align: center"><?php echo e(++$no + ($payments->currentPage()-1) * $payments->perPage()); ?></th>
                                <td><?php echo e($payment->invoice); ?></td>
                                <td class="text-right"><?php echo e(money_id($payment->total)); ?></td>
                                <td><?php echo e(TanggalID("j M Y", $payment->created_at)); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('console.payment.show', $payment->id)); ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-list-ul"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div style="text-align: center">
                        <?php echo e($payments->links()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div><?php /**PATH D:\laravel\sk-store\resources\views/livewire/console/payment/index.blade.php ENDPATH**/ ?>