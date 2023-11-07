@include('components.header')


<div class="container-fluid d-flex justify-content-center" style="height: 611px; background-color: #0198a3">
    <div class="d-flex flex-column justify-content-center align-items-center col-5 py-3">
        <div class="text-white w-75">
            <h3>Selamat Datang <span class="text-warning">Mulavers</span> !</h3>
            <p>Segera ambil langkah awal dalam investasi beersama mulainvest</p>
            <img src="images/login.png" width="360px" alt="login.png" />
        </div>
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center bg-white col-5 py-5">
        <img src="images/logoRegist.png" alt="" width="110px" />
        <div class="py-3 w-75">
            <h6 class="pt-3 fw-bold">Masuk</h6>
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

            <!-- form normal -->
            <form class="pt-3" method="post" action="{{ route('login-store') }}">
                @csrf
                <div class="mb-3">
                    <label for="inputEmail" class="form-label" style="font-size: 14px">Email address</label>
                    <input type="email" class="form-control form-control-sm" id="inputEmail"
                        aria-describedby="emailHelp" name="email" />
                    <div id="emailHelp" class="form-text text-black-50" style="font-size: 11px">Data privasi email anda
                        terlindungi</div>
                </div>
                <div class="mb-3">
                    <label for="inputName" class="form-label" style="font-size: 14px">Password</label>
                    <input type="password" class="form-control form-control-sm" id="inputName" name="password" />
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="loginCheck" required />
                    <label class="form-check-label text-black-50" for="loginCheck" style="font-size: 10px">Dengan
                        menekan tombol masuk, saya menyetujui <span><a href="#" class="text-black"> Syarat dan Ketentuan
                                Mulainvest</a></span></label>
                </div>

                <button type="submit" class="btn btn-primary col-4 my-2 btn-sm">Masuk</button>
            </form>
            <!-- form normal -->
            <p class="text-center pt-5" style="font-size: 14px">Belum punya akun? <a href="{{ route('register') }}"
                    class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Daftar
                    Akun</a></p>
        </div>
    </div>
</div>

<!-- footer login dan register berbeda -->


</body>
<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
