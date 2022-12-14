@section('title')
Payment &mdash; {{ $setting->admin_title }}
@endsection

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
                        @foreach ($payments as $no => $payment)
                            <tr>
                                <th scope="row" style="text-align: center">{{ ++$no + ($payments->currentPage()-1) * $payments->perPage() }}</th>
                                <td>{{ $payment->invoice }}</td>
                                <td class="text-right">{{ money_id($payment->total) }}</td>
                                <td>{{ TanggalID("j M Y", $payment->created_at) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('console.payment.show', $payment->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-list-ul"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="text-align: center">
                        {{ $payments->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>