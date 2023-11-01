@include('components.header')
@include('components.navbarAdmin')


<div>
    <div class="p-5">
      <!-- space -->
      <div class="d-flex justify-content-between py-2">
        <div class="d-flex justify-content-between align-items-center">
          <!-- title -->
          <h4 class="text-center">Admin</h4>
          <!-- end title -->
          <!-- modal -->
          <button type="button" class="btn ms-3 text-white fw-bold" style="background-color: #0198a3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah Data</button>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content" style="background-color: #cee5e6">
                <div class="modal-header text-white" style="background-color: #0198a3">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data</h1>
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
                      <button type="submit" class="btn btn-warning text-black border-2" style="font-weight: 400">Tambahkan Data</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!--end modal  -->
        </div>

        <div>
          <div class="dropdown">
            <button class="btn btn-outline-secondary dropdown-toggle" style="width: 200px" type="button" data-bs-toggle="dropdown" aria-expanded="false">Pilih Kategori</button>
            <ul class="dropdown-menu text-center" style="width: 200px">
              <li><a class="dropdown-item" href="{{ route('admin') }}">Semua</a></li>
              <li><a class="dropdown-item" href="{{ route('pasarUang') }}">Pasar Uang</a></li>
              <li><a class="dropdown-item" href="{{ route('obligasi') }}">Obligasi</a></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- bagian table -->
      <div class="my-4">
        <table class="table table-striped table-bordered table-hover text-center" style="vertical-align: middle">
          <thead style="background-color: #ffc232">
            <tr>
              <th scope="col">No</th>
              <th scope="col">Kode saham</th>
              <th scope="col">Nama Perusahaan</th>
              <th scope="col">Stok</th>
              <th scope="col">Harga/Lot</th>
              <th scope="col">Min.Order</th>
              <th scope="col">Maks.Order</th>
              <th scope="col">Edit/Hapus</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>IDX80</td>
              <td>Bank Rakyat Indonesia (BBRI)</td>
              <td>320</td>
              <td>1000000</td>
              <td>10</td>
              <td>50</td>
              <!-- button crud -->
              <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buttonHapus">
                  <img src="images/hapus.png" class="" width="30px" alt="" />
                </button>

                <!-- Modal -->
                <div class="modal fade" id="buttonHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah kamu yangkin ingin menghapus data ini?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-danger">Ya, Hapus Data</button>
                      </div>
                    </div>
                  </div>
                </div>

                <button type="button" class="btn" style="background-color: transparent; border: none" data-bs-toggle="modal" data-bs-target="#edit" data-bs-whatever="@mdo">
                  <img src="images/edit.png" width="30px" alt="" />
                </button>

                <div class="modal fade text-start" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="background-color: #cee5e6">
                      <div class="modal-header text-white" style="background-color: #0198a3">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Data</h1>
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
                            <button type="submit" class="btn btn-warning text-black border-2" style="font-weight: 400">Ubah Data</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end modal  -->
              </td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>IDX80</td>
              <td>Bank Rakyat Indonesia (BBRI)</td>
              <td>320</td>
              <td>1000000</td>
              <td>10</td>
              <td>50</td>
              <!-- button crud -->
              <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buttonHapus">
                  <img src="images/hapus.png" class="" width="30px" alt="" />
                </button>

                <!-- Modal -->
                <div class="modal fade" id="buttonHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah kamu yangkin ingin menghapus data ini?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-danger">Ya, Hapus Data</button>
                      </div>
                    </div>
                  </div>
                </div>

                <button type="button" class="btn" style="background-color: transparent; border: none" data-bs-toggle="modal" data-bs-target="#edit" data-bs-whatever="@mdo">
                  <img src="images/edit.png" width="30px" alt="" />
                </button>

                <div class="modal fade text-start" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="background-color: #cee5e6">
                      <div class="modal-header text-white" style="background-color: #0198a3">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Data</h1>
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
                            <button type="submit" class="btn btn-warning text-black border-2" style="font-weight: 400">Ubah Data</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end modal  -->
              </td>
            </tr>
            <tr>
              <th scope="row">1</th>
              <td>IDX80</td>
              <td>Bank Rakyat Indonesia (BBRI)</td>
              <td>320</td>
              <td>1000000</td>
              <td>10</td>
              <td>50</td>
              <!-- button crud -->
              <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#buttonHapus">
                  <img src="images/hapus.png" class="" width="30px" alt="" />
                </button>

                <!-- Modal -->
                <div class="modal fade" id="buttonHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <p>Apakah kamu yangkin ingin menghapus data ini?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <button type="button" class="btn btn-danger">Ya, Hapus Data</button>
                      </div>
                    </div>
                  </div>
                </div>

                <button type="button" class="btn" style="background-color: transparent; border: none" data-bs-toggle="modal" data-bs-target="#edit" data-bs-whatever="@mdo">
                  <img src="images/edit.png" width="30px" alt="" />
                </button>

                <div class="modal fade text-start" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="background-color: #cee5e6">
                      <div class="modal-header text-white" style="background-color: #0198a3">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Data</h1>
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
                            <button type="submit" class="btn btn-warning text-black border-2" style="font-weight: 400">Ubah Data</button>
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

    <footer>
      <div class="container-fluid bg-warning mb-0 fixed-bottom">
        <p class="text-black text-center">Mulainvest, 2023 © Kelompok 7 IT Perbankan</p>
      </div>
    </footer>
  </div>

@include('components.footerAdmin')