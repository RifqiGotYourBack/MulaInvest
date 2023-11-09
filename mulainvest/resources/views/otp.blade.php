@include('components.header')

<div class="container-fluid d-flex justify-content-center" style="height: 611px; background-color: #0198a3">
    <!-- kiri -->
    <div class="d-flex flex-column justify-content-center align-items-center col-5 py-3">
        <div class="text-white w-75">
            <h3>Selamat Datang <span class="text-warning">Mulavers</span> !</h3>
            <p>Periksa Kembali Email Anda Untuk Mengkonfirmasi Akun </p>
            <img src="{{asset('images/verifikasi.png')}}" width="360px" alt="register" />
        </div>
    </div>
    <!-- kanan -->
    <div class="d-flex flex-column justify-content-center align-items-center  bg-white col-5">
        <div class="d-flex flex-column align-items-center justify-content-center col-10 h-75">
            <a href="{{ route('berandaTamu') }}">
                <img src="{{asset('images/logoRegist.png')}}" alt="mulainvest" width="110px" />
            </a>
            <div>
                <div class="py-3">
                    <h5 class="pt-3 fw-semibold text-center">OTP Verifikasi</h5>
                    <h6 style="font-size: 13px">Kode akan dikirim ke email <span
                            class="fw-semibold text-warning">{{ $email }}</span></h6>
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

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- form normal -->
                <!-- form normal -->
                <form class="d-flex flex-column justify-content-center align-items-center py-4" method="post"
                    action="{{ route('verify.otp.submit') }}">
                    @csrf
                    <div class="mb-3 col-12">
                        <input type="hidden" value="{{ $email }}" name="email_hidden">
                        <input type="text" class="form-control form-control-sm" id="otp" aria-describedby="emailHelp"
                            name="otp" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required/>
                    </div>
                    <button type="submit" class="btn btn-primary col-8 mt-3 btn-sm" style="">Verifikasi</button>
                </form>

                <!-- form untuk mengirim ulang -->
                <form class="d-flex flex-column justify-content-center align-items-center" method="post"
                    action="{{ route('resend.otp') }}">
                    @csrf
                    <input type="hidden" value="{{ $email }}" name="email_hidden_resend">
                    <button type="submit" class="btn btn-primary col-8 mt-3 btn-sm" style="">Minta OTP</button>
                </form>

            </div>
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
