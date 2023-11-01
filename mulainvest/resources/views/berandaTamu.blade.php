@include('components.header')
@include('components.navbarTamu')
   

<div class="py-5">
    <!-- hero -->
    <div class="d-flex p-5 justify-content-center" style="height: 560px">
      <div class="col-7 d-flex flex-column justify-content-center me-5">
        <div class="mb-2">
          <h3 style="font-weight: 500">Mulainvest Siap Bikin Pengalaman Investasi Simple dan Terpercaya</h3>
        </div>
        <div class="mb-5">
          <h5>Awali Investasimu Bersama Mulainvest !</h5>
        </div>
        <div>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-warning fw-semibold" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 200px">Investasi Sekarang!</button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Selamat Datang di Mulainvest</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Untuk mulai investasi silahkan login terlebih dahulu</div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- hero -->
      <div class="col-3">
        <img src="images/hero.png" alt="" width="350px" />
      </div>
    </div>
    <!-- tentang kami -->
    <div class="d-flex py-5 justify-content-center align-items-center" style="background-color: #cee5e6; height: 400px">
      <div class="col-4">
        <h3 class="fw-bold">Tentang MulaInvest</h3>
      </div>
      <div class="col-6">
        <p class="desc_tentang-mulainvest" style="text-align: justify">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates explicabo sunt nihil sit ipsam quia aspernatur veniam eum necessitatibus dolor natus saepe laboriosam voluptatum corrupti, unde expedita, excepturi, quisquam
          velit?
        </p>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 200px">Lanjut Baca</button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Selamat Datang di Mulainvest</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">Untuk mulai investasi silahkan login terlebih dahulu</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- fitur kami -->
    <div class="d-flex flex-column text-center px-5 py-5 align-content-center justify-content-center" style="height: 700px">
      <div class="pt-5">
        <h3 class="fw-bold">Hal yang didapatkan di MulaInvest</h3>
      </div>
      <div class="d-flex py-5 justify-content-around">
        <!-- card 1 -->

        <div class="card col-3">
          <div class="card-body d-flex flex-column justify-content-evenly my-5">
            <div>
              <img src="images/icon.png" alt="" width="100px" />
            </div>
            <div>
              <h3 class="card-text">GG gaming.</h3>
            </div>
          </div>
        </div>
        <div class="card col-3">
          <div class="card-body d-flex flex-column justify-content-evenly my-5">
            <div>
              <img src="images/icon.png" alt="" width="100px" />
            </div>
            <div>
              <h3 class="card-text">GG gaming.</h3>
            </div>
          </div>
        </div>
        <div class="card col-3">
          <div class="card-body d-flex flex-column justify-content-evenly my-5">
            <div>
              <img src="images/icon.png" alt="" width="100px" />
            </div>
            <div>
              <h3 class="card-text">GG gaming.</h3>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- softselling -->
    <!-- tentang kami -->
    <div class="d-flex py-5 mx-5 justify-content-center align-items-center bg-secondary-subtle rounded" style="height: 500px">
      <div class="col-4 me-5 bg-black text-center rounded">
        <img src="images/sahamCard.png" width="350px" alt="" />
      </div>
      <div class="col-6">
        <h4>Tiap waktunya saham terus bertumbuh dan berubah, jangan sampai telat menyadarinya!</h4>
        <p class="desc_tentang-mulainvest" style="text-align: justify">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates explicabo sunt nihil sit ipsam quia aspernatur veniam eum necessitatibus dolor natus saepe laboriosam voluptatum corrupti, unde expedita, excepturi, quisquam
          velit?
        </p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 200px">Lanjut Baca</button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Selamat Datang di Mulainvest</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">Untuk mulai investasi silahkan login terlebih dahulu</div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- berita terkini -->
    <!-- Berita Saham -->
    <div class="d-flex flex-column text-center px-5 py-5 justify-content-center" style="height: 1100px">
      <div class="">
        <h3 class="fw-bold">Berita Saham</h3>
      </div>
      <div class="d-flex py-5 justify-content-around">
        <!-- card 1 -->

        <div class="card col-3">
          <img src="images/artikel1.jfif" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5>artikel1</h5>
            <p class="card-text" style="text-align: justify">Some quick example text to build on the card title and make up the bulk of <a href="URL_tujuan">baca selanjutnya</a></p>
          </div>
        </div>
        <div class="card col-3">
          <img src="images/artikel1.jfif" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5>artikel1</h5>
            <p class="card-text" style="text-align: justify">Some quick example text to build on the card title and make up the bulk of <a href="URL_tujuan">baca selanjutnya</a></p>
          </div>
        </div>
        <div class="card col-3">
          <img src="images/artikel1.jfif" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5>artikel1</h5>
            <p class="card-text" style="text-align: justify">Some quick example text to build on the card title and make up the bulk of <a href="URL_tujuan">baca selanjutnya</a></p>
          </div>
        </div>
      </div>
      <div class="d-flex justify-content-around">
        <!-- card 1 -->

        <div class="card col-3">
          <img src="images/artikel1.jfif" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5>artikel1</h5>
            <p class="card-text" style="text-align: justify">Some quick example text to build on the card title and make up the bulk of <a href="URL_tujuan">baca selanjutnya</a></p>
          </div>
        </div>
        <div class="card col-3">
          <img src="images/artikel1.jfif" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5>artikel1</h5>
            <p class="card-text" style="text-align: justify">Some quick example text to build on the card title and make up the bulk of <a href="URL_tujuan">baca selanjutnya</a></p>
          </div>
        </div>
        <div class="card col-3">
          <img src="images/artikel1.jfif" class="card-img-top" alt="..." />
          <div class="card-body">
            <h5>artikel1</h5>
            <p class="card-text" style="text-align: justify">Some quick example text to build on the card title and make up the bulk of <a href="URL_tujuan">baca selanjutnya</a></p>
          </div>
        </div>
      </div>
    </div>

    <!-- endcontent -->
  </div>

@include('components.footer')