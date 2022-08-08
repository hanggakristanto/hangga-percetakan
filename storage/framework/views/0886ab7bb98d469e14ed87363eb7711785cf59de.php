<?php $__env->startSection('title'); ?>
Orders &mdash; <?php echo e($setting->admin_title); ?>

<?php $__env->stopSection(); ?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-shopping-cart"></i> ORDERS
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
                            <th scope="col">STATUS</th>
                            <th scope="col" class="text-center">DATE</th>
                            <th scope="col" style="width: 17%;text-align: center">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row" style="text-align: center"><?php echo e(++$no + ($invoices->currentPage()-1) * $invoices->perPage()); ?></th>
                                <td><?php echo e($invoice->invoice); ?></td>
                                <td class="text-right"><?php echo e(money_id($invoice->grand_total)); ?></td>
                                <td class="text-center">
                                    <?php if($invoice->status == "menunggu pembayaran"): ?>
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-circle-notch fa-spin"></i> <?php echo e($invoice->status); ?></button>
                                    <?php elseif($invoice->status == "menunggu konfirmasi"): ?>
                                        <button class="btn btn-sm btn-warning"><i class="fa fa-spinner fa-spin"></i> <?php echo e($invoice->status); ?></button>
                                    <?php elseif($invoice->status == "pembayaran tidak valid"): ?>
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i> <?php echo e($invoice->status); ?></button>
                                    <?php elseif($invoice->status == "pesanan diproses"): ?>
                                        <button class="btn btn-sm btn-info"><i class="fa fa-hourglass-start"></i> <?php echo e($invoice->status); ?></button>
                                    <?php elseif($invoice->status == "pesanan dikirim"): ?>
                                        <button class="btn btn-sm btn-primary"><i class="fa fa-truck"></i> <?php echo e($invoice->status); ?></button>
                                    <?php elseif($invoice->status == "pesanan selesai"): ?>
                                        <button class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i> <?php echo e($invoice->status); ?></button>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(TanggalID("j M Y", $invoice->created_at)); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('console.orders.show', $invoice->id)); ?>" class="btn btn-sm btn-primary">
                                        <i class="fa fa-list-ul"></i>
                                    </a>
                                    <a href="<?php echo e(route('console.orders.status', $invoice->id)); ?>" class="btn btn-sm btn-success">
                                        <i class="fa fa-exchange-alt"></i>
                                    </a>
                                    <a href="<?php echo e(route('console.orders.receipt', $invoice->id)); ?>" class="btn btn-sm btn-warning">
                                        <i class="fa fa-truck"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div style="text-align: center">
                        <?php echo e($invoices->links()); ?>

                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</div><?php /**PATH D:\laravel\sk-store\resources\views/livewire/console/orders/index.blade.php ENDPATH**/ ?>