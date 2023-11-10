@include('components.header')
@include('components.navbar')

<div class="d-flex flex-column align-items-center" style="height: 1000px; background-color: #cee5e653">
    <div class="container-fluid d-flex justify-content-center align-items-center py-5" style="height: 300px">
        <div class="d-flex flex-column justify-content-evenly bg-warning p-4 border border-warning border-3 border-end-0 rounded-start col-3"
            style="height: 150px">
            <div>
                <h4 class="fw-semibold">Nilai Portofolio</h4>
            </div>
            <div>
                <h4>Rp.<span>{{ number_format($totalBalance, 2) }}</span></h4>
            </div>
        </div>

        <div class="col-6 d-flex justify-content-center align-items-center border border-warning border-3 border-start-0 rounded-end"
            style="height: 150px">

            <div class="col-4 d-flex flex-column text-center justify-content-center center align-items-center">
                <div>
                    <h3>{{ number_format($pasarUangPercentage, 2) }}%</h3>
                </div>
                <div>
                    <h6 onmouseover="this.style.fontWeight='800';this.style.transition='0.15s'; this.style.color='#0198A3'"
                        onmouseout="this.style.fontWeight='600';this.style.transition='0.15s'; this.style.color='black'">
                        Pasar Uang
                    </h6>
                </div>
            </div>


            <div class="col-4 d-flex flex-column text-center justify-content-center center align-items-center">
                <div>
                    <h3 class="fw-semibold">{{ number_format($obligasiPercentage, 2) }}%</h3>
                </div>
                <div>
                    <h6 onmouseover="this.style.fontWeight='800';this.style.transition='0.15s'; this.style.color='#0198A3'"
                        onmouseout="this.style.fontWeight='600';this.style.transition='0.15s'; this.style.color='black'">
                        Obligasi
                    </h6>
                </div>
            </div>

            <!-- Aset Terjual Button -->
            <a href="{{ route('aset.terjual') }}" class="btn btn-primary"
                style="background-color: #0198a3; border: none; padding-top: 20px; padding-bottom: 20px;">
                Aset Terjual
            </a>

        </div>

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
    @if ($assets->isEmpty())
        <div class="alert alert-warning" role="alert">
            Kamu Belum Memiliki Aset.
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
                        <th class="fw-semibold" style="font-size: 15px" scope="col">Harga(beli)</th>
                        <th class="fw-semibold" style="font-size: 15px" scope="col">Harga(Live)</th>
                        <th class="fw-semibold" style="font-size: 15px" scope="col">Margin</th>
                        <th class="fw-semibold" style="font-size: 15px" scope="col">Jual</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr>
                            <td>{{ $asset->InvestmentID }}</td>
                            <td>{{ $asset->InvestmentName }}</td>
                            <td>{{ $asset->InvestmentType }}</td>
                            <td>{{ $asset->AssetAmount }}</td>
                            <td>{{ number_format($asset->BuyPrice, 2) }}</td>
                            <td>{{ number_format($asset->LatestPrice, 2) }}</td>
                            <td>0.0%</td>
                            <td>
                                <button type="button" class="btn"
                                    style="background-color: transparent; border: none" data-bs-toggle="modal"
                                    data-bs-target="#sellAsset{{ $asset->AssetID }}" data-bs-whatever="@mdo">
                                    <img src="{{ asset('images/beli.png') }}" width="30px" alt="" />
                                </button>

                                <!-- Modal -->
                                <div class="modal fade text-start" id="sellAsset{{ $asset->AssetID }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background-color: #cee5e6">
                                            <div class="modal-header text-white" style="background-color: #0198a3">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Jual Aset</h1>
                                                <button type="button" class="btn-close me-2" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body my-3 mx-5">
                                                <form method="POST"
                                                    action="{{ route('sellAsset', $asset->AssetID) }}">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label for="SellAmount" class="col-form-label">Jumlah Aset yang
                                                            Dijual</label>
                                                        <input type="number" class="form-control" id="SellAmount"
                                                            name="SellAmount" />
                                                    </div>

                                                    <div class="modal-footer py-4">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <!-- tombol submitnya -->
                                                        <button type="submit"
                                                            class="btn btn-warning text-black border-2"
                                                            style="font-weight: 400">Jual Aset</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $assets->links() }}
        </div>
    @endif

</div>

@include('components.footer')
