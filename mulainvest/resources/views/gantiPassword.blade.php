@include('components.header')
@include('components.navbar')
<div class="container-fluid py-5 px-5">
    <div class="row justify-content-around">
        <!-- Div Pertama untuk Tabel -->
        <div class="col-3">
            <div class="list-group">
                <a class="list-group-item list-group-item-action active text-center fw-bold"
                    style="background-color: #0198a3" aria-current="true">Profil investor</a>
                <a href="{{ route('profil') }}" class="list-group-item list-group-item-action"
                    style="background-color: #cee5e6">Profil</a>
                <a href="{{ route('bankAkun') }}" class="list-group-item list-group-item-action"
                    style="background-color: #cee5e6">Balance</a>
                <a href="{{ route('gantiPassword') }}" class="list-group-item list-group-item-action"
                    style="background-color: #cee5e6">Ganti Password</a>
                <a href="#" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Bantuan</a>
            </div>
        </div>
        <!-- Div Kedua untuk Form -->
        <div class="col-8 py-5 rounded-3 px-5" style="background-color: #cee5e6">
            <h4 class="pb-4">Ubah Password</h4>
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


            <form class="text-black" method="post" action="{{ route('update-password') }}">
                @csrf
                <div class="form-group mb-3">
                    <label for="inputOldPassword">Password Lama</label>
                    <input type="password" class="form-control" name="old_password" id="inputOldPassword" />
                </div>
                <div class="form-group mb-3">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" id="inputPassword" name="password" />
                </div>
                <div class="form-group mb-3">
                    <label for="inputkonfirmPassword">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="inputkonfirmPassword" name="confirm" />
                </div>
                <div class="d-flex justify-content-end pt-4">
                    <button type="submit" class="btn btn-warning btn-outline-dark text-black"
                        style="width: 150px; font-weight: 400" onmouseover="this.style.fontWeight='600'"
                        onmouseout="this.style.fontWeight='400'">Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('components.footer')
