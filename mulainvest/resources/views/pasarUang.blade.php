@include('components.header')
@include('components.navbarAdmin')
@include('components.sidebar')


<div class="p-5">

    <!-- space -->
    <div class="d-flex justify-content-between align-content-center py-2">
        <div class="d-flex justify-content-between align-items-center">
            <!-- title -->
            <h4 class="text-center">Admin</h4>
            <!-- end title -->
            <!-- modal -->
            <button type="button" class="btn ms-4 text-white fw-bold btn-sm" style="background-color: #0198a3"
                data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                <img src="{{ asset('images/tambahData.png') }}" width="25px" alt="tambah data">
                Tambah Data</button>

            <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="background-color: #cee5e6">
                        <div class="modal-header text-white" style="background-color: #0198a3">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data</h1>
                            <button type="button" class="btn-close me-2" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>

                        <div class="modal-body my-3 mx-5">
                            <form method="POST" action="{{ route('storeInvestment') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="InvestmentName" class="col-form-label">Nama Perusahaan</label>
                                    <input type="text" class="form-control" id="InvestmentName" name="InvestmentName"
                                        required />
                                </div>

                                <!-- Tersedia & harga -->
                                <div class="row">

                                    <!-- Tersedia (Ya/Tidak) -->
                                    <div class="col-6 mb-3">
                                        <label for="Stock" class="col-form-label">Tersedia</label>
                                        <input type="number" class="form-control" id="Stock" name="Stock"
                                            required />
                                    </div>

                                    <!-- Harga -->
                                    <div class="col-6 mb-3">
                                        <label for="InvestmentPrice" class="col-form-label">Harga</label>
                                        <input type="text" class="form-control" id="InvestmentPrice"
                                            name="InvestmentPrice" required />
                                    </div>

                                </div>

                                <!-- Tipe Investasi -->
                                <div class="mb-3">
                                    <label for="InvestmentType" class="col-form-label">Tipe Investasi</label>
                                    <select class="form-control" id="InvestmentType" name="InvestmentType" required>
                                        <option value="">-- Pilih Tipe Investasi --</option>
                                        <option value="Pasar Uang">Pasar Uang</option>
                                        <option value="Obligasi">Obligasi</option>
                                    </select>
                                </div>


                                <!-- Minimum Order dan Maximum Order -->
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="MinimumOrder" class="form-label">Minimum Order</label>
                                        <input type="number" class="form-control" id="MinimumOrder" name="MinimumOrder"
                                            required />
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="MaximumOrder" class="form-label">Maksimum Order</label>
                                        <input type="number" class="form-control" id="MaximumOrder" name="MaximumOrder"
                                            required />
                                    </div>
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="InvestmentDescription" class="col-form-label">Deskripsi</label>
                                    <textarea class="form-control" id="InvestmentDescription" name="InvestmentDescription"></textarea>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-warning">Tambahkan Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--end modal  -->
        </div>

        <div>
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" style="width: 200px" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false">Pilih Kategori</button>
                <ul class="dropdown-menu text-center" style="width: 200px">
                    <li><a class="dropdown-item" href="{{ route('investasiAdmin') }}">Semua</a></li>
                    <li><a class="dropdown-item" href="{{ route('pasarUang') }}">Pasar Uang</a></li>
                    <li><a class="dropdown-item" href="{{ route('obligasi') }}">Obligasi</a></li>
                </ul>
            </div>
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
    @if ($Investments->isEmpty())
        <div class="alert alert-warning" role="alert">
            Tidak Ada Aset Terdaftar.
        </div>
    @else
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
                        <th scope="col">Edit/Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($investments as $investment)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $investment->InvestmentID }}</td>
                            <td>{{ $investment->InvestmentName }}</td>
                            <td>{{ $investment->InvestmentType }}</td>
                            <td>{{ $investment->Stock }}</td>
                            <td>{{ $investment->Stock }}</td>
                            <td>{{ $investment->InvestmentPrice }}</td>
                            <td>{{ $investment->MinimumOrder }}</td>
                            <td>{{ $investment->MaximumOrder }}</td>
                            <!-- button crud -->
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#buttonHapus{{ $investment->InvestmentID }}">
                                    <img src="{{ asset('images/hapus.png') }}" class="" width="30px"
                                        alt="" />
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="buttonHapus{{ $investment->InvestmentID }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah kamu yangkin ingin menghapus data ini?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tidak</button>
                                                <form
                                                    action="{{ route('deleteInvestment', $investment->InvestmentID) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Ya, Hapus
                                                        Data</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn"
                                    style="background-color: transparent; border: none" data-bs-toggle="modal"
                                    data-bs-target="#edit" data-bs-whatever="@mdo">
                                    <img src="{{ asset('images/edit.png') }}" width="30px" alt="" />
                                </button>

                                <div class="modal fade text-start" id="edit" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content" style="background-color: #cee5e6">
                                            <div class="modal-header text-white" style="background-color: #0198a3">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Data
                                                </h1>
                                                <button type="button" class="btn-close me-2" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body my-3 mx-5">
                                                <form method="POST"
                                                    action="{{ route('updateInvestment', $investment->InvestmentID) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="InvestmentName" class="col-form-label">Nama
                                                            Perusahaan</label>
                                                        <input type="text" class="form-control"
                                                            id="InvestmentName" name="InvestmentName"
                                                            value="{{ $investment->InvestmentName }}" />
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="Stock"
                                                                class="col-form-label">Tersedia</label>
                                                            <input type="text" class="form-control" id="Stock"
                                                                name="Stock" value="{{ $investment->Stock }}" />
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label for="InvestmentPrice" class="col-form-label">Harga
                                                                Investasi</label>
                                                            <input type="text" class="form-control"
                                                                id="InvestmentPrice" name="InvestmentPrice"
                                                                value="{{ $investment->InvestmentPrice }}" />
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="InvestmentType" class="col-form-label">Tipe
                                                            Investasi</label>
                                                        <select class="form-control" id="InvestmentType"
                                                            name="InvestmentType" required>
                                                            <option value="">-- Pilih Tipe Investasi --</option>
                                                            <option value="Pasar Uang">Pasar Uang</option>
                                                            <option value="Obligasi">Obligasi</option>
                                                        </select>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label for="MinimumOrder" class="col-form-label">Minimun
                                                                Order</label>
                                                            <input type="number" class="form-control"
                                                                id="MinimumOrder" name="MinimumOrder"
                                                                value="{{ $investment->MinimumOrder }}" />
                                                        </div>

                                                        <div class="col-6 mb-3">
                                                            <label for="MaximumOrder" class="col-form-label">Maksimum
                                                                Order</label>
                                                            <input type="number" class="form-control"
                                                                id="MaximumOrder" name="MaximumOrder"
                                                                value="{{ $investment->MaximumOrder }}" />
                                                        </div>
                                                    </div>

                                                    <!-- Tambahkan input lain sesuai dengan atribut yang ingin diedit -->

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        <button type="submit" class="btn btn-warning">Ubah
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end modal  -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $investments->links() }}
        </div>
</div>

<footer>
    <div class="container-fluid bg-warning mb-0 fixed-bottom">
        <p class="text-black text-center">Mulainvest, 2023 © Kelompok 7 IT Perbankan</p>
    </div>
</footer>
</div>

@include('components.footerAdmin')

<script>
    // Untuk pesan sukses
    if (document.querySelector('.alert-success')) {
        setTimeout(function() {
            document.querySelector('.alert-success').style.display = 'none';
        }, 5000); // Pesan sukses akan hilang setelah 5 detik (5000 milidetik)
    }

    // Untuk pesan kesalahan
    if (document.querySelector('.alert-danger')) {
        setTimeout(function() {
            document.querySelector('.alert-danger').style.display = 'none';
        }, 5000); // Pesan kesalahan akan hilang setelah 5 detik (5000 milidetik)
    }
</script>
