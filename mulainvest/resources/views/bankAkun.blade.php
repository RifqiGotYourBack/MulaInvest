@include('components.header')
@include('components.navbar')
<div class="container-fluid py-5 px-5">
    <div class="row justify-content-around">
        <!-- Div Pertama untuk Tabel -->
        <div class="col-3">
            <div class="list-group">
                <a class="list-group-item list-group-item-action active text-center fw-bold"
                    style="background-color: #0198a3" aria-current="true">Balance</a>
                <a href="{{ route('profil') }}" class="list-group-item list-group-item-action hoverSidebar"
                    style="background-color: #cee5e6">Profil</a>
                <a href="{{ route('bankAkun') }}" class="list-group-item list-group-item-action hoverSidebar"
                    style="background-color: #cee5e6">Bank Akun</a>
                <a href="{{ route('topUp') }}" class="list-group-item list-group-item-action hoverSidebar"
                    style="background-color: #cee5e6">Top Up</a>
                <a href="{{ route('faq') }}" class="list-group-item list-group-item-action hoverSidebar"
                    style="background-color: #cee5e6">FAQ</a>
            </div>
        </div>
        <!-- Div Kedua untuk Form -->
        <div class="col-8 rounded-3 p-0" style="background-color: #cee5e6">
            <div class="row m-1 rounded">
                <div class="col-6 align-items-center text-center rounded-start text-white"
                    style="background-color: #0198a3">
                    <h5 class="m-3">Saldo</h5>
                    <p>Rp. <span>{{ number_format($user->Balance, 2) }}</span></p>
                </div>
                <div class="col-6 d-flex justify-content-evenly align-items-center text-white rounded-end"
                    style="background-color: #0198a3">
                    <a href="{{ route('investasi') }}" class="d-flex flex-column align-items-center text-white">
                        <img src="{{ asset('images/investasi.png') }}" width="40px" alt="investasi" />
                        <h6>Investasi</h6>
                    </a>

                    <a href="{{ route('aset') }}" class="d-flex flex-column align-items-center text-white">
                        <img src="{{ asset('images/aset.png') }}" width="38px" alt="ae=set" />
                        <h6>Aset</h6>
                    </a>
                </div>
            </div>
            <div class="py-5 px-5">
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

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form class="text-black" method="post" action="{{ route('update-bank-account') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="inputNamaBank">Nama Bank</label>
                        <input type="text" class="form-control" id="inputNamaBank" placeholder="Bank Rakamin"
                            name="bank_name" value="{{ old('bank_name', optional($bankAccount)->BankName) }}" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="inputRekening">No.Rekening</label>
                        <input type="tel" class="form-control" id="inputRekening" inputmode="numeric"
                            placeholder="001122394" oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                            name="bank_account_number"
                            value="{{ old('bank_account_number', optional($bankAccount)->BankAccountNumber) }}" />
                    </div>
                    <div class="d-flex justify-content-end ">
                        <button type="submit" class="btn btn-warning btn-outline-dark mt-2" style="width: 150px"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('components.footer')
