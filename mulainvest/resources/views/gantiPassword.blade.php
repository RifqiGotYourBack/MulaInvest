@include('components.header')
@include('components.navbar')
<div class="container-fluid py-5 px-5">
    <div class="row justify-content-around">
      <!-- Div Pertama untuk Tabel -->
      <div class="col-3">
        <div class="list-group">
          <a class="list-group-item list-group-item-action active text-center fw-bold" style="background-color: #0198a3" aria-current="true">Profil investor</a>
          <a href="{{ route('profil') }}" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Profil</a>
          <a href="{{ route('bankAkun') }}" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Balance</a>
          <a href="{{ route('gantiPassword') }}" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Ganti Password</a>
          <a href="#" class="list-group-item list-group-item-action" style="background-color: #cee5e6">Bantuan</a>
        </div>
      </div>
      <!-- Div Kedua untuk Form -->
      <div class="col-8 py-5 rounded-3 px-5" style="background-color: #cee5e6">
        <h4 class="pb-4">Ubah Password</h4>

        <form class="text-black">
          <div class="form-group mb-3">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="rakamin@gmail.com" required />
          </div>
          <div class="form-group mb-3">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" required />
          </div>
          <div class="form-group mb-3">
            <label for="inputkonfirmPassword">Konfirmasi Password</label>
            <input type="password" class="form-control" id="inputkonfirmPassword" required />
          </div>
          <div class="d-flex justify-content-end pt-4">
            <button type="submit" class="btn btn-warning btn-outline-dark text-black" style="width: 150px; font-weight: 400" onmouseover="this.style.fontWeight='600'" onmouseout="this.style.fontWeight='400'">Change</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@include('components.footer')

