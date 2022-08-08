<?php $__env->startSection('title'); ?>
Orders &mdash; <?php echo e($setting->admin_title); ?>

<?php $__env->stopSection(); ?>

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded-lg">
            <div class="card-header">
                <i class="fa fa-shopping-cart"></i> DETAIL ORDERS
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <td style="width: 25%">
                            NO. INVOICE
                        </td>
                        <td style="width: 1%">:</td>
                        <td>
                            <?php echo e($invoice->invoice); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            NAMA LENGKAP
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo e($invoice->name); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            NO. TELP / WA
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo e($invoice->phone); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            KURIR / SERVICE / COST
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo e(strtoupper($invoice->courier)); ?> | <?php echo e($invoice->service); ?> - <?php echo e(money_id($invoice->cost_courier)); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            PROVINSI
                        </td>
                        <td>:</td>
                        <td>
                            <?php
                                $response = Http::withHeaders([
                                    'accept' => 'application/json',
                                    'authorization' => env('RUANGAPI_KEY'),
                                    'content-type' => 'application/json',
                                ])->get('https://ruangapi.com/api/v1/cities',[
                                    'province' => $invoice->province
                                ]);

                                echo $response['data']['province']['name'];

                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            KOTA / KABUPATEN
                        </td>
                        <td>:</td>
                        <td>
                            <?php
                                $response = Http::withHeaders([
                                    'accept' => 'application/json',
                                    'authorization' => env('RUANGAPI_KEY'),
                                    'content-type' => 'application/json',
                                ])->get('https://ruangapi.com/api/v1/cities',[
                                    'province' => $invoice->province,
                                    'id'       => $invoice->city 
                                ]);

                                echo $response['data']['results']['name'];

                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            KECAMATAN
                        </td>
                        <td>:</td>
                        <td>
                            <?php
                                $response = Http::withHeaders([
                                    'accept' => 'application/json',
                                    'authorization' => env('RUANGAPI_KEY'),
                                    'content-type' => 'application/json',
                                ])->get('https://ruangapi.com/api/v1/districts', [
                                    'city' => $invoice->city,
                                    'id'   => $invoice->district
                                ]);

                                echo $response['data']['results']['name'];

                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ALAMAT LENGKAP
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo e($invoice->address); ?>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            TOTAL PEMBELIAN
                        </td>
                        <td>:</td>
                        <td>
                            <?php echo e(money_id($invoice->grand_total)); ?>

                        </td>
                    </tr>
                </table>

                <hr>

                <table class="table"
                               style="border-style: solid !important;border-color: rgb(198, 206, 214) !important;">
                            <tbody>

                            <?php $__currentLoopData = $invoice->order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php
                                    $harga_set = $order->price * $order->discount / 100;
                                    $harga_diskon = $order->price - $harga_set;
                                ?>

                                <tr style="background: #edf2f7;">
                                    <td class="b-none" width="15%">
                                        <div class="wrapper-image-cart">
                                            <img
                                                src="<?php echo e(Storage::url('public/products/').$order->image); ?>"
                                                style="width: 100%;border-radius: .5rem">
                                        </div>
                                    </td>
                                    <td class="b-none">
                                        <h5><b><?php echo e($order->product_name); ?></b></h5>
                                        <table class="table-borderless" style="font-size: 14px">
                                            <tr>
                                                <td style="padding: .20rem">PRICE</td>
                                                <td style="padding: .20rem">:</td>
                                                <td style="padding: .20rem"><?php echo e(money_id($harga_diskon)); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="padding: .20rem">QTY</td>
                                                <td style="padding: .20rem">:</td>
                                                <td style="padding: .20rem"><b><?php echo e($order->unit_weight); ?>

                                                        <?php echo e($order->unit); ?></b></td>
                                            </tr>
                                        </table>

                                    </td>
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>

                        </table>

                        <a href="<?php echo e(route('console.orders.index')); ?>" class="btn btn-dark btn-md"><i class="fa fa-long-arrow-alt-left"></i>
                            KEMBALI</a>

            </div>
        </div>
    </div>
</div><?php /**PATH D:\laravel\sk-store\resources\views/livewire/console/orders/show.blade.php ENDPATH**/ ?>