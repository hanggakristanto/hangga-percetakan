<?php $__env->startSection('title'); ?>
My Orders &mdash; <?php echo e($setting->site_title); ?>

<?php $__env->stopSection(); ?>

<div style="margin-top: -120px">
    <div class="container-fluid mb-lg-5 mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card border-0 shadow rounded-lg mb-4">
                    <div class="card-body p-3">
                        <h6 class="font-weight-bold"><i class="fa fa-list-ul"></i> MAIN MENU</h6>
                        <hr>
                        <?php echo $__env->make('layouts.customer_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card border-0 shadow rounded-lg">
                    <div class="card-body">
                        <h6 class="font-weight-bold"><i class="fa fa-shopping-cart"></i> MY ORDERS</h6>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center" style="text-align: center;width: 6%">NO.
                                        </th>
                                        <th scope="col" class="text-center">INVOICE</th>
                                        <th scope="col" class="text-center">GRAND TOTAL</th>
                                        <th scope="col" class="text-center">STATUS</th>
                                        <th scope="col" class="text-center" style="width: 15%;text-align: center">
                                            OPTIONS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <th scope="row" style="text-align: center">
                                            <?php echo e(++$no + ($invoices->currentPage()-1) * $invoices->perPage()); ?></th>
                                        <td><?php echo e($invoice->invoice); ?></td>
                                        <td class="text-right"><?php echo e(money_id($invoice->grand_total)); ?></td>
                                        <td class="text-center">
                                            <?php if($invoice->status == "menunggu pembayaran"): ?>
                                            <button class="btn btn-sm btn-danger"><i
                                                    class="fa fa-circle-notch fa-spin"></i>
                                                <?php echo e($invoice->status); ?></button>
                                            <?php elseif($invoice->status == "menunggu konfirmasi"): ?>
                                            <button class="btn btn-sm btn-warning"><i class="fa fa-spinner fa-spin"></i>
                                                <?php echo e($invoice->status); ?></button>
                                            <?php elseif($invoice->status == "pembayaran tidak valid"): ?>
                                            <button class="btn btn-sm btn-danger"><i class="fa fa-times-circle"></i>
                                                <?php echo e($invoice->status); ?></button>
                                            <?php elseif($invoice->status == "pesanan diproses"): ?>
                                            <button class="btn btn-sm btn-info"><i class="fa fa-hourglass-start"></i>
                                                <?php echo e($invoice->status); ?></button>
                                            <?php elseif($invoice->status == "pesanan dikirim"): ?>
                                            <button class="btn btn-sm btn-primary"><i class="fa fa-truck"></i>
                                                <?php echo e($invoice->status); ?></button>
                                            <?php elseif($invoice->status == "pesanan selesai"): ?>
                                            <button class="btn btn-sm btn-success"><i class="fa fa-check-circle"></i>
                                                <?php echo e($invoice->status); ?></button>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center" style="width: 20%">
                                            <a href="<?php echo e(route('customer.orders.show', $invoice->id)); ?>"
                                                data-toggle="tooltip" data-placement="top" title="Detail"
                                                class="btn btn-sm btn-primary">
                                                <i class="fa fa-list-ul"></i>
                                            </a>
                                            <?php if($invoice->status == "menunggu pembayaran" || $invoice->status ==
                                            "pembayaran tidak valid"): ?>
                                            <a href="<?php echo e(route('frontend.payment.index', $invoice->invoice)); ?>"
                                                data-toggle="tooltip" data-placement="top" title="Konfirmasi Pembayaran"
                                                class="btn btn-sm btn-success">
                                                <i class="fa fa-credit-card"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if($invoice->no_resi != ""): ?>
                                            <span data-toggle="tooltip" data-placement="top"
                                                title="Tracking Order Progress">
                                                <button data-courier="<?php echo e(strtolower($invoice->courier)); ?>"
                                                    data-resi="<?php echo e($invoice->no_resi); ?>"
                                                    class="btn btn-tracking btn-sm btn-primary">
                                                    <i class="fa fa-truck"></i>
                                                </button>
                                            </span>
                                            <?php endif; ?>
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
    </div>
</div>

<!-- Modal Tracking -->
<div class="modal fade" id="tracking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-truck"></i> TRACKING STATUS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <h6 class="font-weight-bold"><i class="fa fa-info-circle"></i> IINFORMATION SHIPPING</h6>
                    <table class="table table-bordered">
                        <tr>
                            <td class="w-25">STATUS</td>
                            <td>
                                <div class="font-weight-bold" id="status"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25">NO. RESI</td>
                            <td>
                                <div class="font-weight-bold" id="no_resi"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25">COURIER</td>
                            <td>
                                <div class="font-weight-bold" id="courier"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25">SERVICE</td>
                            <td>
                                <div class="font-weight-bold" id="service"></div>
                            </td>
                        </tr>
                        <tr>
                            <td class="w-25">DELIVERY TO</td>
                            <td>
                                <div class="font-weight-bold" id="receiver_address"></div>
                            </td>
                        </tr>
                    </table>

                    <h6 class="font-weight-bold mt-4"><i class="fa fa-truck"></i> INFORMATION STATUS TRACKING </h6>
                    <table class="table table-bordered" id="detail-tracking"></table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.btn-tracking').click(function () {

        let courier = $(this).data('courier');
        let no_resi = $(this).data('resi');
        let token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: "/waybill",
            data: {
                _token: token,
                courier: courier,
                no_resi: no_resi,
            },
            type: "POST",
            dataType: "json",
            success: function (response) {
                console.log(response);

                //append on html modal
                $('#status').html(response.data.delivery_status.status);
                $('#no_resi').html(no_resi);
                $('#courier').html(courier.toUpperCase());
                $('#service').html(response.data.courier.service_code);
                $('#receiver_address').html(response.data.waybill.receiver_address);

                //detail tracking
                $.each(response.data.details, function (key, value) {
                    $('#detail-tracking').append('<tr>' +
                        '<td class="w-25">' +
                        value.shipping_date + ' ' + value.shipping_time +
                        '</td>' +
                        '<td>' +
                        value.shipping_description + '[' + value.city_name + ']' +
                        '</td>' +
                        '</tr>');
                });
                $("#tracking").modal('show');
            }
        });

    })
</script><?php /**PATH D:\laravel\sk-store\resources\views/livewire/customer/orders/index.blade.php ENDPATH**/ ?>