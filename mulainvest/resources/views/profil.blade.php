@include('components.header')
@include('components.navbar')
   
<div class="container-fluid py-5 px-5">
    <div class="row justify-content-around">
      <!-- Div Pertama untuk Tabel -->
      <div class="col-3">
        <div class="list-group">
          <a class="list-group-item list-group-item-action active text-center fw-bold" style="background-color: #0198a3" aria-current="true"> Profil investor </a>
          <a href="{{ route('profil') }}" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Profil</a>
          <a href="{{ route('bankAkun') }}" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Balance</a>
          <a href="{{ route('gantiPassword') }}" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Ganti Password</a>
          <a href="{{ route('bantuan') }}" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Bantuan</a>
        </div>
      </div>
      <!-- Div Kedua untuk Form -->
      <div class="row col-8 py-5 rounded-3" style="background-color: #0198a3">
        <div class="col-md-2 text-white">
          <h5 class="text-center pb-3">My Profile</h5>
          <div class="text-center">
            <img src="assets/profile.png" class="text-center" alt="" width="60px" />
          </div>
        </div>

        <div class="col-md-9 p-3 rounded-3 ms-4" style="background-color: #cee5e6">
          <form class="text-black px-4 py-3">
            <div class="form-group mb-3">
              <label for="inputNama">Nama</label>
              <input type="text" class="form-control" id="inputNama" value="Rakamin Halilintar" placeholder="Masukkan nama" required />
            </div>
            <!-- form kanan kiri -->
            <div class="row">
              <div class="container">
                <div class="row">
                  <!-- Kolom Kiri (Nama) -->
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="inputNama">No.Handphone</label>
                      <input type="" class="form-control" id="inputPhone" placeholder="Masukkan nomor" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                    </div>
                  </div>
                  <!-- Kolom Kanan (Tanggal Lahir) -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="inputTanggalLahir">Tanggal Lahir:</label>
                      <input type="date" class="form-control" id="inputTanggalLahir" required />
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group mb-3">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control" id="inputEmail " placeholder="Masukkan Email" required />
            </div>
            <div class="form-group">
              <label for="inputAlamat">Alamat</label>
              <input type="text" class="form-control" id="inputAlamat" placeholder="Jln. xx" />
            </div>
            <div class="d-flex justify-content-end pt-4">
              <button type="submit" class="btn btn-warning btn-outline-dark text-black" style="width: 150px; font-weight: 400" onmouseover="this.style.fontWeight='600'" onmouseout="this.style.fontWeight='400'">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@include('components.footer')

