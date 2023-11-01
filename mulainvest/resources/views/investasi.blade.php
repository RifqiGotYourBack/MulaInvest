@include('components.header')
@include('components.navbar')
    
<div class="d-flex flex-column align-items-center" style="background-color: #cee5e653; min-height: 500px">
    <div class="col-7 py-5">
      <div class="container-fluid">
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-warning d-flex justify-content-center align-items-center" type="submit">
            <div class="col-8 px-2">Cari</div>
            <div class="col-4">
              <img src="images/cari.png" width="22px" alt="" />
            </div>
          </button>
        </form>
      </div>
    </div>

    <!-- bagian table -->
    <div class="">
      <table class="table table-bordered table-hover text-center" style="vertical-align: middle">
        <thead class="table-warning">
          <tr>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Kode saham</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Nama Perusahaan</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Return/tahun</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Stok</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Harga/Lot(Rp)</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Min.Order(Lot)</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Maks.Order(Lot)</th>
            <th class="fw-semibold" style="font-size: 15px" scope="col">Beli</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>IDX80</td>
            <td>
              <img class="px-2" src="images/bri.png" width="60px" alt="" />
              Bank Rakyat Indonesia (BBRI)
            </td>
            <td>12,96%</td>
            <td>320</td>
            <td>1000000</td>
            <td>10</td>
            <td>50</td>
            <!-- button crud -->
            <td>
              <!-- Button trigger modal -->

              <button type="button" class="btn" style="background-color: transparent; border: none" data-bs-toggle="modal" data-bs-target="#edit" data-bs-whatever="@mdo">
                <img src="images/beli.png " width="30px" alt="" />
              </button>

              <div class="modal fade text-start" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" style="background-color: #cee5e6">
                    <div class="modal-header text-white" style="background-color: #0198a3">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Beli Saham</h1>
                      <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body my-3 mx-5">
                      <form>
                        <div class="mb-3">
                          <label for="namaPerusahaan" class="col-form-label">Nama Perusahaan</label>
                          <input type="text" class="form-control" id="namaPerusahaan" />
                        </div>

                        <!-- form kanan kiri -->
                        <div class="row">
                          <div class="container">
                            <div class="row">
                              <!-- Kolom Kiri (Nama) -->
                              <div class="col-6 mb-3">
                                <div class="form-group">
                                  <label for="kodeSaham">Kode Saham</label>
                                  <input type="text" class="form-control" id="kodeSaham" placeholder="" />
                                </div>
                              </div>
                              <!-- Kolom Kanan (Tanggal Lahir) -->
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="hargaLot">Harga/Lot</label>
                                  <input type="tel" class="form-control" id="hargaLot" required inputmode="numeric" oninput="this.value = this.value.replace(/[^0-9]/g, '')" />
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- form 3 kolom -->
                        <div class="row">
                          <!-- Kolom Kiri (stok) -->
                          <div class="col-4 mb-3">
                            <div class="form-group">
                              <label for="stok">Stok</label>
                              <input type="number" class="form-control" id="stok" placeholder="" />
                            </div>
                          </div>
                          <!-- Kolom Tengah (min.order) -->
                          <div class="col-4 mb-3">
                            <div class="form-group">
                              <label for="minOrder">Min.Order</label>
                              <input type="number" class="form-control" id="minOrder" />
                            </div>
                          </div>
                          <!-- Kolom Kanan (maks.order) -->
                          <div class="col-4 mb-3">
                            <div class="form-group">
                              <label for="maksOrder">Maks.Order</label>
                              <input type="number" class="form-control" id="maksOrder" />
                            </div>
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="message-text" class="col-form-label">Deskripsi</label>
                          <textarea class="form-control" id="message-text"></textarea>
                        </div>
                        <div class="modal-footer py-4">
                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                          <!-- tombol submitnya -->
                          <button type="submit" class="btn btn-warning text-black border-2" style="font-weight: 400">Beli Saham</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--end modal  -->
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

@include('components.footer')

