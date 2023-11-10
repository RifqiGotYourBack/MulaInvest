@include('components.header')
@include('components.navbar')

<div class="d-flex flex-column align-items-center" style="background-color: #cee5e653; min-height: 500px">
    <div class="col-7 py-5 justify-content-center align-items-center">
        <h1>Riwayat Transaksi</h1>
    </div>

    @if ($errors->any() || session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                @if (session('error'))
                    <li>{{ session('error') }}</li>
                @endif
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- bagian table -->
    <div class="my-4">
        <table class="table table-striped table-bordered table-hover text-center" style="vertical-align: middle">
            <thead style="background-color: #ffc02d">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Transaksi</th>
                    <th scope="col">Jenis Transaksi</th>
                    <th scope="col">Jumlah Dipesan</th>
                    <th scope="col">Nominal Transaksi</th>
                    <th scope="col">Tanggal Transaksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactionHistories as $transaction)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaction->TransactionID }}</td>
                        <td>{{ $transaction->TransactionType }}</td>
                        <td>{{ $transaction->TransactionAmount }}</td>
                        <td>{{ number_format($transaction->TransactionValue, 2) }}</td>
                        <td>{{ $transaction->TransactionDate->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $transactionHistories->links() !!}
    </div>
</div>
</div>

@include('components.footer')
