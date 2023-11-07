@include('components.header')
@include('components.navbar')
   
<div>
    <div class="container-fluid py-5 px-5">
      <div class="row justify-content-around">
        <!-- Div Pertama untuk Tabel -->
        <div class="col-3">
          <div class="list-group">
            <a class="list-group-item list-group-item-action active text-center fw-bold" style="background-color: #0198a3" aria-current="true">Balance</a>
            <a href="{{ route('profil') }}" class="list-group-item list-group-item-action hoverSidebar" style="background-color: #cee5e6">Profil</a>
            <a href="{{ route('bankAkun') }}" class="list-group-item list-group-item-action hoverSidebar" style="background-color: #cee5e6">Bank Akun</a>
            <a href="{{ route('topUp') }}" class="list-group-item list-group-item-action hoverSidebar" style="background-color: #cee5e6">Top Up</a>
            <a href="{{ route('faq') }}" class="list-group-item list-group-item-action hoverSidebar" style="background-color: #cee5e6">FAQ</a>
          </div>
        </div>
        <!-- Div Kedua untuk Form -->
        <div class="col-8 py-5 rounded-3 px-5" style="background-color: #cee5e6">
          <h4 class="pb-4">Top Up</h4>
          <form class="text-black">
            <div class="form-group mb-3">
              <label for="inputNama">Nominal Top Up</label>
              <input type="tel" class="form-control" id="inputPhone" placeholder="100000000" inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required />
            </div>
            <div class="form-group mb-3">
              <label for="inputMetode" class="form-label">Metode Pembayaran</label>
              <select id="inputMetode" class="form-select">
                <option disabled selected>--Pilih Metode Pembayaran--</option>
                <option>Gopay</option>
                <option>Shopee</option>
                <option>
                  Pinjam dulu seratus</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label for="inputkonfirmPassword">Password Akun</label>
              <input type="password" class="form-control" id="inputkonfirmPassword" required />
            </div>
            <div class="d-flex justify-content-end">
              <!-- <button type="submit" class="btn btn-warning btn-outline-dark mt-5 text-black" style="width: 150px">Top Up</button> -->

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-warning btn-outline-dark mt-5" style="width: 150px" data-bs-toggle="modal" data-bs-target="#exampleModal">Top Up</button>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Top Up</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Apakah anda yakin melanjutkan transaksi?</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">cancel</button>

                      <button type="submit" class="btn btn-outline-primary" style="width: 150px">Confirm</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- batas -->
            </div>
          </form>
        </div>
      </div>
    </div>

    <footer>
      <div class="container-fluid bg-warning mb-0">
        <p class="text-black text-center">Mulainvest, 2023 © Kelompok 7 IT Perbankan</p>
      </div>
    </footer>
  </div>

@include('components.footer')

