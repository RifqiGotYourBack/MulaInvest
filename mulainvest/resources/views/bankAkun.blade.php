@include('components.header')
@include('components.navbar')
<div class="container-fluid py-5 px-5">
    <div class="row justify-content-around">
      <!-- Div Pertama untuk Tabel -->
      <div class="col-3">
        <div class="list-group">
          <a class="list-group-item list-group-item-action active text-center fw-bold" style="background-color: #0198a3" aria-current="true">Balance</a>
          <a href="{{ route('profil') }}" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Profil</a>
          <a href="{{ route('bankAkun') }}" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Bank Akun</a>
          <a href="{{ route('topUp') }}" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Top Up</a>
          <a href="#" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Bantuan</a>
        </div>
      </div>
      <!-- Div Kedua untuk Form -->
      <div class="col-8 rounded-3 p-0" style="background-color: #cee5e6">
        <div class="row m-1 rounded">
          <div class="col-6 align-items-center text-center rounded-start text-white" style="background-color: #0198a3">
            <h5 class="m-3">Balance</h5>
            <p>Rp. <span>10000000</span></p>
          </div>
          <div class="col-6 d-flex justify-content-evenly align-items-center text-white rounded-end" style="background-color: #0198a3">
            <a href="{{ route('investasi') }}" class="d-flex flex-column align-items-center text-white">
              <img src="assets/aset.png" width="40px" alt="" />
              <h6>Investasi</h6>
            </a>

            <a href="{{ route('aset') }}" class="d-flex flex-column align-items-center text-white">
              <img src="assets/topup.png" width="38px" alt="" />
              <h6>Aset</h6>
            </a>
          </div>
        </div>
        <div class="py-5 px-5">
          <form class="text-black">
            <div class="form-group mb-3">
              <label for="inputNamaBank">Nama Bank</label>
              <input type="text" class="form-control" id="inputNamaBank" placeholder="Bank Rakamin" />
            </div>
            <div class="form-group mb-3">
              <label for="inputRekening">No.Rekening</label>
              <input type="tel" class="form-control" id="inputRekening" inputmode="numeric" placeholder="001122394" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
            </div>
            <div class="form-group mb-3">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail" placeholder="rakamin@gmail.com" required />
            </div>
            <div class="d-flex justify-content-end pt-4">
              <button type="submit" class="btn btn-warning btn-outline-dark text-black" style="width: 150px; font-weight: 400" onmouseover="this.style.fontWeight='600'" onmouseout="this.style.fontWeight='400'">Change</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@include('components.footer')

