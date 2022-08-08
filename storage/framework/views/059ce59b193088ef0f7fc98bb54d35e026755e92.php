<?php $__env->startSection('title'); ?>
Orders &mdash; <?php echo e($setting->admin_title); ?>

<?php $__env->stopSection(); ?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-shopping-cart"></i> STATUS ORDERS
            </div>
            <div class="card-body">
                <form wire:submit.prevent="update">
                    <div class="form-group" wire:ignore>
                        <label>CHANGE STATUS ORDER</label>
                        <input type="hidden" wire:model="invoiceId">
                        <select class="select2 form-control" wire:model="status" required>
                            <option value="">-- STATUS --</option>
                            <option value="pembayaran tidak valid">pembayaran tidak valid</option>
                            <option value="pesanan diproses">pesanan diproses</option>
                            <option value="pesanan dikirim">pesanan dikirim</option>
                            <option value="pesanan selesai">pesanan selesai</option>
                        </select>
                    </div>
                    <button class="btn btn-primary mr-1 btn-submit" type="submit"> UPDATE</button>
                    <button class="btn btn-warning btn-reset" type="reset"> RESET</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        //category
        $('.select2').select2({
            theme: 'bootstrap4',
            width: 'style'
        });
        $('.select2').on('change', function (e) {
            window.livewire.find('<?php echo e($_instance->id); ?>').set('status', e.target.value);
        });
    });
</script><?php /**PATH D:\laravel\sk-store\resources\views/livewire/console/orders/status.blade.php ENDPATH**/ ?>