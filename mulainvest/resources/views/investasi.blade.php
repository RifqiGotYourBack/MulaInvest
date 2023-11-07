@include('components.header')
@include('components.navbar')

<div class="d-flex flex-column align-items-center" style="background-color: #cee5e653; min-height: 500px">
    <div class="col-7 py-5">
      <div class="container-fluid">
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-warning d-flex justify-content-center align-items-center" type="submit">
            <div class="col-8 px-2">Cari</div>
            <div class="col-4">
              <img src="{{asset('images/cari.png')}}" width="22px" alt="cari" />
            </div>
          </button>
        </form>
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
            <thead style="background-color: #ffc232">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode saham</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Tersedia</th>
                    <th scope="col">Harga/Lot</th>
                    <th scope="col">Min.Order</th>
                    <th scope="col">Maks.Order</th>
                    <th scope="col">Beli</th>
                </tr>
            </thead>
            <tbody>
                @foreach($investments as $investment)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $investment->InvestmentID }}</td>
                    <td>{{ $investment->InvestmentName }}</td>
                    <td>{{ $investment->InvestmentType }}</td>
                    <td>{{ $investment->Stock }}</td>
                    <td>{{ $investment->InvestmentPrice }}</td>
                    <td>{{ $investment->MinimumOrder }}</td>
                    <td>{{ $investment->MaximumOrder }}</td>
                    <!-- button crud -->
                    <td>
                        <button type="button" class="btn" style="background-color: transparent; border: none"
                            data-bs-toggle="modal" data-bs-target="#buyAsset{{ $investment->InvestmentID }}"
                            data-bs-whatever="@mdo">
                            <img src="{{asset('images/beli.png')}}" width="30px" alt="" />
                        </button>

                        <!-- Modal -->
                        <div class="modal fade text-start" id="buyAsset{{ $investment->InvestmentID }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #cee5e6">
                                    <div class="modal-header text-white" style="background-color: #0198a3">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Beli Saham</h1>
                                        <button type="button" class="btn-close me-2" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                        <!-- Modal -->
                        <div class="modal fade text-start" id="buyAsset{{ $investment->InvestmentID }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="background-color: #cee5e6">
                                    <div class="modal-header text-white" style="background-color: #0198a3">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Beli Saham</h1>
                                        <button type="button" class="btn-close me-2" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body my-3 mx-5">
                                        <form method="POST" action="{{ route('buyAsset', $investment->InvestmentID) }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="BuyAmount" class="col-form-label">Jumlah Saham yang
                                                    Dibeli</label>
                                                <input type="number" class="form-control" id="BuyAmount"
                                                    name="BuyAmount" />
                                            </div>
                                    <div class="modal-body my-3 mx-5">
                                        <form method="POST" action="{{ route('buyAsset', $investment->InvestmentID) }}">
                                            @csrf

                                            <div class="mb-3">
                                                <label for="BuyAmount" class="col-form-label">Jumlah Saham yang
                                                    Dibeli</label>
                                                <input type="number" class="form-control" id="BuyAmount"
                                                    name="BuyAmount" />
                                            </div>

                                            <div class="modal-footer py-4">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <!-- tombol submitnya -->
                                                <button type="submit" class="btn btn-warning text-black border-2"
                                                    style="font-weight: 400">Beli Saham</button>
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
        {{ $investments->links() }}
    </div>
</div>
</div>
                                            <div class="modal-footer py-4">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                                <!-- tombol submitnya -->
                                                <button type="submit" class="btn btn-warning text-black border-2"
                                                    style="font-weight: 400">Beli Saham</button>
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
        {{ $investments->links() }}
    </div>
</div>
</div>

@include('components.footer')
