@include('components.header')
@include('components.navbar')
<!-- bagian table -->
<div class="d-flex flex-column align-items-center" style="height: 1000px; background-color: #cee5e653">
    <div class="container-fluid d-flex justify-content-center align-items-center py-5" style="height: 300px">
        <div class="d-flex flex-column justify-content-evenly bg-warning p-4 border border-warning border-3 border-end-0 rounded-start col-3"
            style="height: 150px">
            <div>
                <h4 class="fw-semibold">Nilai Aset Terjual</h4>
            </div>
            <div>
                <h4>Rp.<span>{{ number_format($totalSoldValue, 2) }}</span></h4>
            </div>
        </div>

        <div class="col-6 d-flex justify-content-center align-items-center border border-warning border-3 border-start-0 rounded-end"
            style="height: 150px">

            <div class="col-4 d-flex flex-column text-center justify-content-center center align-items-center">
                <div>
                    <h3>40%</h3>
                </div>
                <div>
                    <h6 onmouseover="this.style.fontWeight='800';this.style.transition='0.15s'; this.style.color='#0198A3'"
                        onmouseout="this.style.fontWeight='600';this.style.transition='0.15s'; this.style.color='black'">
                        Investasi</h6>
                </div>
            </div>

            <div class="col-4 d-flex flex-column text-center justify-content-center center align-items-center">
                <div>
                    <h3 class="fw-semibold">60%</h3>
                </div>
                <div>
                    <h6 onmouseover="this.style.fontWeight='800';this.style.transition='0.15s'; this.style.color='#0198A3'"
                        onmouseout="this.style.fontWeight='600';this.style.transition='0.15s'; this.style.color='black'">
                        Obligasi</h6>
                </div>

            </div>

            <!-- Aset Button -->
            <a href="{{ route('aset') }}" class="btn btn-primary"
                style="background-color: #0198a3; border: none; padding-top: 20px; padding-bottom: 20px; padding-left: 41px; padding-right: 41px;">
                Aset
            </a>

        </div>
    </div>

    @if ($soldAssets->isEmpty())
        <div class="alert alert-warning" role="alert">
            Kamu Belum Memiliki Aset yang Terjual.
        </div>
    @else
        <div class="py-5">
            <table class="table table-bordered table-hover text-center" style="vertical-align: middle; width: 1000px">
                <thead class="table-warning">
                    <tr>
                        <th class="fw-semibold" style="font-size: 15px" scope="col">Kode saham</th>
                        <th class="fw-semibold" style="font-size: 15px" scope="col">Nama Perusahaan</th>
                        <th class="fw-semibold" style="font-size: 15px" scope="col">Jenis Aset</th>
                        <th class="fw-semibold" style="font-size: 15px" scope="col">Jumlah lembar</th>
                        <th class="fw-semibold" style="font-size: 15px" scope="col">Harga(Beli)</th>
                        <th class="fw-semibold" style="font-size: 15px" scope="col">Harga(Jual)</th>
                        <th class="fw-semibold" style="font-size: 15px" scope="col">Margin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($soldAssets as $soldAsset)
                        <tr>
                            <td>{{ $soldAsset->investments->InvestmentID }}</td>
                            <td>{{ $soldAsset->investments->InvestmentName }}</td>
                            <td>{{ $soldAsset->investments->InvestmentType }}</td>
                            <td>{{ $soldAsset->SellAmount }}</td>
                            <td>{{ number_format($soldAsset->assets->BuyPrice, 2) }}</td>
                            <td>{{ number_format($soldAsset->SellPrice, 2) }}</td>
                            <td>{{ number_format((($soldAsset->SellPrice - $soldAsset->assets->BuyPrice) / $soldAsset->assets->BuyPrice) * 100, 2) }}%
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $soldAssets->links() !!}
            </div>

        </div>

    @endif
</div>

@include('components.footer')
