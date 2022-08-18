<?php $__env->startSection('title'); ?>
Payment &mdash; <?php echo e($setting->site_title); ?>

<?php $__env->stopSection(); ?>

<div>

    <div style="margin-top: 100px">
        <div class="container mb-lg-5">

            <div class="row mt-4 mb-4 justify-content-center">

                <div class="col-md-4 text-center">
                    <h3 class="font-weight-bold">TERIMA KASIH</h3>
                    <h5>PESANAN BERHASIL DIBUAT</h5>
                    <hr>
                    <?php echo e($invoice->name); ?>

                    <br>
                    <?php echo e($invoice->address); ?>

                </div>

            </div>

            <div class="row">
                <div class="col-md-6 text-center mb-3">
                    <div class="card border-0 rounded-lg shadow">
                        <div class="card-body">
                            <h4 class="font-weight-bold"><?php echo e($invoice->invoice); ?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-center mb-3">
                    <div class="card border-0 rounded-lg shadow">
                        <div class="card-body">
                            <h4 class="font-weight-bold">TOTAL : <?php echo e(money_id($invoice->grand_total)); ?></h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="alert alert-danger" role="alert">
                        Silahkan lakukan pembayaran ke salah satu rekening dibawah ini, pastikan nominal transfer sesuai
                        dengan <strong>TOTAL</strong>.
                    </div>
                </div>

                <div class="col-md-4 mt-3 text-center">
                    <div class="card h-100 border-0 rounded-lg shadow">
                        <div class="card-body">
                            <img src="<?php echo e(asset('images/payment-bca.png')); ?>" style="width: 150px">
                            <hr>
                            <h6>Sofiduta</h6>
                            <p></p>
                            <h6 class="font-weight-bold">1131458971</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-3 text-center">
                    <div class="card h-100 border-0 rounded-lg shadow">
                        <div class="card-body">
                            <img src="<?php echo e(asset('images/payment-mandiri-syariah.png')); ?>" style="width: 150px">
                            <hr>
                            <h6>Sofiduta</h6>
                            <p></p>
                            <h6 class="font-weight-bold">7130309725</h6>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-3 text-center">
                    <div class="card h-100 border-0 rounded-lg shadow">
                        <div class="card-body">
                            <img src="<?php echo e(asset('images/payment-jenius.png')); ?>" style="width: 150px">
                            <hr>
                            <h6>Sofiduta</h6>
                            <p></p>
                            <h6 class="font-weight-bold">90011961874</h6>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row text-center justify-content-center mt-lg-5 mt-5">
                <div class="col-md-5">
                    Setelah melakukan transfer, silahkan lakukan <strong>konfirmasi pembayaran</strong> melalui tombol
                    dibawah ini :
                    <div class="konfirmasi-pembayaran mt-lg-5">
                        <?php if(Auth::guard('customer')->check()): ?>
                        <?php if($invoice->status == "menunggu pembayaran"): ?>
                        <button data-toggle="modal" data-target="#konfirmasi-pembayaran"
                            class="btn btn-dark btn-lg btn-block mt-3 shadow"> KONFIRMASI PEMBAYARAAN</button>
                        <?php endif; ?>
                        <?php else: ?>
                        <div data-toggle="tooltip" data-placement="bottom" title="Silahkan Masuk Terlebih Dahulu!">
                            <a href="<?php echo e(route('customer.auth.login')); ?>"
                                class="btn btn-dark btn-lg btn-block mt-3 shadow"> KONFIRMASI PEMBAYARAAN</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="konfirmasi-pembayaran" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">KONFIRMASI PEMBAYARAN </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="confirmPayment" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row d-none">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">NAMA LENGKAP</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" readonly
                                        name="name" wire:model="name" placeholder="Nama Lengkap">
                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback" style="display: block">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">NO. TELP / WA</label>
                                    <input type="text" class="form-control" readonly name="phone"
                                        wire:model="phone" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">INVOICE</label>
                            <input type="text" class="form-control" name="invoice" readonly
                                wire:model="invoice_id" placeholder="Invoice" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" wire:ignore>
                                    <label class="font-weight-bold">TRANSFER DARI BANK</label>
                                    <select class="form-control select-bank-from" wire:model="bank_transfer_from" name="bank_transfer_from" required>
                                        <option value="">-- pilih BANK --</option>
                                        <option value="BCA"> BCA </option>
                                        <option value="Bank Mandiri"> Bank Mandiri </option>
                                        <option value="BNI"> BNI </option>
                                        <option value="BRI"> BRI </option>
                                        <option value="CIMB"> CIMB </option>
                                        <option value="BII"> BII </option>
                                        <option value="BJB"> BJB </option>
                                        <option value="BPR"> BPR </option>
                                        <option value="Bukopin"> Bukopin </option>
                                        <option value="Bank Mega"> Bank Mega </option>
                                        <option value="OCBC NISP"> OCBC NISP </option>
                                        <option value="Sinar Mas"> Sinar Mas </option>
                                        <option value="Bank Muamalat"> Bank Muamalat </option>
                                        <option value="Bank Bumi Arta"> Bank Bumi Arta </option>
                                        <option value="Bank Danamon"> Bank Danamon </option>
                                        <option value="Bank Mandiri Syariah"> Bank Mandiri Syariah </option>
                                        <option value="Lainnya"> Lainnya </option>
                                    </select>
                                    <?php $__errorArgs = ['bank_transfer_from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback" style="display: block">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" wire:ignore>
                                    <label class="font-weight-bold">TRANSFER KE BANK</label>
                                    <select class="form-control select-bank-to" wire:model="bank_transfer_to" name="bank_transfer_to" required>
                                        <option value="">-- pilih BANK --</option>
                                        <option value="BCA - 1131458971 - AN. Sofiduta"> BCA - 1131458971 |
                                            AN. Sofiduta</option>
                                        <option value="MANDIRI SYARI'AH - 7130309725 - AN. Sofiduta">
                                            MANDIRI SYARI'AH - 7130309725 | AN. Sofiduta</option>
                                        <option value="JENIUS / BTPN - 90011961874 - AN. Sofiduta"> JENIUS /
                                            BTPN - 90011961874 | AN. Sofiduta</option>
                                    </select>
                                    <?php $__errorArgs = ['bank_transfer_to'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback" style="display: block">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">ATAS NAMA</label>
                                    <input type="text" class="form-control" wire:model="from_name" name="from_name" placeholder="Atas Nama"
                                        required>
                                    <?php $__errorArgs = ['from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback" style="display: block">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">NOMINAL TRANSFER</label>
                                    <input type="number" class="form-control" wire:model="total" name="total"
                                        placeholder="Nominal Transfer" required>
                                    <?php $__errorArgs = ['total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback" style="display: block">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">TANGGAL TRANSFER</label>
                                    <input type="date" class="form-control" wire:model="transfer_date" name="transfer_date" required>
                                    <?php $__errorArgs = ['transfer_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback" style="display: block">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold">BUKTI TRANSFER (<span style="color: red">ukuran file
                                            maksimal 2 MB</span>) </label>
                                    <input type="file" class="form-control" id="image" wire:model="image" name="image" required>
                                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="invalid-feedback" style="display: block">
                                        <?php echo e($message); ?>

                                    </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    <span style="color: red">Format File Didukung : <strong>.PNG</strong>,
                                        <strong>.JPG</strong>, <strong>.JPEG</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">CATATAN</label>
                            <textarea class="form-control" name="note" rows="2" wire:model="note" placeholder="Catatan"><?php echo e($note); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark btn-block shadow">KIRIM BUKTI PEMBAYARAN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        $(".select-bank-from , .select-bank-to").select2({
            theme: 'bootstrap4',
            width: 'style',
        });
        $('.select-bank-from').on('change', function (e) {
            window.livewire.find('<?php echo e($_instance->id); ?>').set('bank_transfer_from', e.target.value);
        });
        $('.select-bank-to').on('change', function (e) {
            window.livewire.find('<?php echo e($_instance->id); ?>').set('bank_transfer_to', e.target.value);
        });
    });
</script><?php /**PATH D:\laravel\sk-store\resources\views/livewire/frontend/payment/index.blade.php ENDPATH**/ ?>