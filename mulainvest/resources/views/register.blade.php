@include('components.header')


<div class="container-fluid d-flex justify-content-center" style="height: 611px; background-color: #0198a3">
  <!-- kiri -->
  <div class="d-flex flex-column justify-content-center align-items-center col-5 py-3">
    <div class="text-white w-75">
      <h3>Selamat Datang <span class="text-warning">Mulavers</span> !</h3>
      <p>Daftarkan diri anda dengan mudah dan mulai investasi</p>
      <img src="images/register.png" width="360px" alt="register" />
    </div>
    <!-- kanan -->
  </div>
  <div class="d-flex flex-column justify-content-center align-items-center bg-white col-5 py-5">
    <img class="pt-5 pb-3" src="images/logoRegist.png" alt="" width="110px" />
    <div class="w-75">
      <h6 class="pt-3 fw-bold">Daftar Akun</h6>

      <!-- form normal -->
      <form class="" action="{{ route('login') }}">
        <div class="mb-3">
          <label for="inputNama" class="form-label" style="font-size: 14px">Nama</label>
          <input type="text" class="form-control form-control-sm" id="inputNama" aria-describedby="emailHelp" required />
        </div>
        <div class="mb-3">
          <label for="inputEmail" class="form-label" style="font-size: 15px">Email address</label>
          <input type="email" class="form-control form-control-sm" id="inputEmail" aria-describedby="emailHelp" required />
          <div id="emailHelp" class="form-text text-black-50" style="font-size: 11px">Data privasi email anda terlindungi</div>
        </div>
        <div class="mb-3">
          <label for="inputName" class="form-label" style="font-size: 15px">Password</label>
          <input type="password" class="form-control form-control-sm" id="inputName" required />
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="loginCheck" required />
          <label class="form-check-label text-black-50" for="loginCheck" style="font-size: 10px"
            >Dengan menekan tombol daftar, saya menyetujui <span><a href="#" class="text-black"> Syarat dan Ketentuan Mulainvest</a></span></label
          >
        </div>

        <button type="submit" class="btn btn-primary col-4 my-2 btn-sm">Daftar Akun</button>
      </form>
      <!-- form normal -->
      <p class="text-center pt-5 pb-3" style="font-size: 14px">Sudah punya akun? <a href="{{ route('login') }}" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Masuk </a></p>
    </div>
  </div>
</div>

<!-- footer login dan register berbeda -->

  
</body>
<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>