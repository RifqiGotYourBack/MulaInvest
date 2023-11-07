@include('components.header')
@include('components.navbarTamu')
   

<div class="py-5">
    <!-- hero -->
    <div class="d-flex p-5 justify-content-center" style="height: 560px">
      <div class="col-7 d-flex flex-column justify-content-center me-5">
        <div class="mb-2">
          <h3 style="font-weight: 500">Mulainvest Siap Bikin Pengalaman Investasi Mudah dan Terpercaya</h3>
        </div>
        <div class="mb-5">
          <h5>Awali Investasimu Bersama Mulainvest !</h5>
        </div>
        <div>
          <!-- Button trigger modal -->
         

          <button type="submit" class="btn btn-warning btn-outline-dark btn-md fw-semibold" style="width: 300px" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Investasi Sekarang!</button>

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
        <img src="{{asset('images/hero.png')}}" alt="" width="350px" />
      </div>
    </div>
    <!-- tentang kami -->
    <div class="d-flex py-5 justify-content-center align-items-center" style="background-color: #cee5e6; height: 400px">
      <div class="col-4">
        <h3 class="fw-bold">Tentang MulaInvest</h3>
      </div>
      <div class="col-6">
        <p class="desc_tentang-mulainvest" style="text-align: justify">
          MulaInvest didedikasikan untuk memberikan perlindungan dan keamanan yang tinggi kepada setiap nasabah, menjadikan investasi mereka sebagai prioritas utama. Kami berkomitmen untuk memberikan platform investasi yang transparan, aman, dan terpercaya, sehingga setiap nasabah dapat berinvestasi dengan keyakinan dan fokus pada pertumbuhan kekayaan mereka tanpa khawatir
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

        <div class="card col-3 hoverCard" >

          <div class="card-body d-flex flex-column justify-content-between my-5" style="height: 200px">
            <div>
              <img src="{{asset('images/keamanan.png')}}" alt="keamanan" width="100px" />
            </div>
            <div>
              <h5 class="card-text ">Keamanan Data Maksimum</h5>
            </div>
          </div>
        </div>
        <div class="card col-3 hoverCard" >

          <div class="card-body d-flex flex-column justify-content-between my-5" style="height: 200px">
            <div>
              <img src="{{asset('images/statistik.png')}}" alt="statistik" width="100px" />
            </div>
            <div>
              <h5 class="card-text ">Menyajikan Data <br> Real-time</h5>
            </div>
          </div>
        </div>
        <div class="card col-3 hoverCard" >

          <div class="card-body d-flex flex-column justify-content-between my-5" style="height: 200px">
            <div>
              <img src="{{asset('images/pelayanan.png')}}" alt="pelayanan" width="100px" />
            </div>
            <div>
              <h5 class="card-text ">Keamanan Data Maksimum</h5>
            </div>
          </div>
        </div>
        
      </div>
    </div>

    <!-- softselling -->
    <!-- tentang kami -->
    <div class="d-flex my-5 mx-5 justify-content-center align-items-center bg-secondary-subtle rounded" style="height: 500px">
      <div class="col-4 me-5 text-center rounded" style="background: #0198A3 ">
        <img src="{{asset('images/saham.png')}}" width="350px" alt="saham" />
      </div>
      <div class="col-6">
        <h4>Tiap waktunya saham terus bertumbuh dan berubah, jangan sampai telat menyadarinya!</h4>
        <p class="desc_tentang-mulainvest" style="text-align: justify">
          Tak perlu ragu untuk memulai perjalanan belajar Anda bersama kami. Kami siap mendukung Anda dalam langkah awal di dunia Investasi
        </p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 200px">Lihat Saham</button>

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
    <div class="d-flex flex-column text-center px-5 my-5 justify-content-center" style="height: 1200px">
      <div class="">
        <h3 class="fw-bold">Berita Saham</h3>
      </div>
      <div class="d-flex py-5 justify-content-around">
        <!-- card row 1 -->
        <div class="card col-3">
          <img src="{{asset('images/berita-ihsg.JPEG')}}" class="card-img-top" height="200px" alt="..."  />
          <div class="card-body mx-2">
            <h6 class="card-title fw-semibold" style="text-align: justify">IHSG Hari Ini Ambruk 1,63%, Tapi Lima Saham Catat Cuan Gede</h6>
            <p class="card-text pt-3" style="text-align: justify; font-size: 13px">Indeks harga saham gabungan (IHSG) ambruk pada perdagangan Rabu (1/11/2023). IHSG hari ini jatuh 109,79 poin (1,63 %) ke level 6.642,41. 
              <a href="https://investor.id/market/344780/ihsg-hari-ini-ambruk-163-tapi-lima-sahamcatat-cuan-gede" target="_blank">baca selanjutnya</a></p>
          </div>
        </div>
        
        <div class="card col-3">
          <img src="{{asset('images/berita-goto.jfif')}}" class="card-img-top" height="200px" alt="..." />
          <div class="card-body mx-2">
            <h6 class="card-title fw-semibold" style="text-align: justify">Merah 6 Hari Beruntun, Saham GOTO All Time Low Lagi, Dekati Gocap</h6>
            <p class="card-text pt-3" style="text-align: justify; font-size: 13px">Harga saham emiten e-commerce dan jasa ride-hailing PT GoTo Gojek Tokopedia Tbk (GOTO) kembali menembus level terendah sepanjang masa (all time low/ATL) pada perdagangan sesi I, Senin (16/10/2023). 
              <a href="https://ekbis.sindonews.com/read/587476/38/daftar-10-saham-yang-turun-paling-dalam-hari-ini-1635858684#:~:text=JAKARTA-%20Pada%20perdagangan%20sahamhari%20ini%2C%20Selasa%20%282%2F11%2F2021%29%2C%20ada,atas%206%25%20hingga%20menyentuh%20auto%20rejecion%20bawah%20%28ARB%29.
              " target="_blank">baca selanjutnya</a></p>
          </div>
        </div>

        <div class="card col-3">
          <img src="{{asset('images/berita-10Saham.JPG')}}" class="card-img-top" height="200px" alt="10saham" />
          <div class="card-body mx-2">
            <h6 class="card-title fw-semibold" style="text-align: justify">Daftar 10 saham yang turun paling dalam hari ini</h6>
            <p class="card-text pt-3" style="text-align: justify; font-size: 13px">Pada perdagangan saham hari ini, Selasa (2/11/2021), ada 368 saham melemah sehingga membawa indeks harga saham gabungan ( IHSG ) turun sebesar 0,91% ke
              <a href="https://www.idxchannel.com/market-news/merah-6-hari-beruntun-saham-goto-all-time-low-lagi-dekati-gocap" target="_blank">baca selanjutnya</a></p>
          </div>
        </div>
      
      </div>
      
      <!-- card 2 -->
      <div class="d-flex my-5 justify-content-around">
        <!-- card row 2 -->
        <div class="card col-3">
          <img src="{{asset('images/berita-bank.jfif')}}" class="card-img-top" height="200px" alt="bank" />
          <div class="card-body mx-2">
            <h6 class="card-title fw-semibold" style="text-align: justify">Saham Bank Hari Ini BBCA, BBRI, BMRI, & BBNI Kompak Melesat! Tersengat The Fed</h6>
            <p class="card-text pt-3" style="text-align: justify; font-size: 13px"> Saham bank hari ini, seperti emiten bank jumbo atau kelompok bank bermodal inti (KBMI) IV seperti PT Bank Central Asia Tbk. (BBCA) dan
              <a href="https://www.msn.com/id-id/berita/other/saham-bank-hari-ini-bbca-bbri-bmri-bbni-kompak-melesat-tersengat-the-fed/ar-AA1jgwbf" target="_blank">baca selanjutnya</a></p>
          </div>
        </div>

        <div class="card col-3">
          <img src="{{asset('images/berita-tips.JPG')}}" class="card-img-top" height="200px" alt="goto" />
          <div class="card-body mx-2">
            <h6 class="card-title fw-semibold" style="text-align: justify">6 Strategi Investasi dalam Hal Pengembangan Diri, Wajib Tahu!</h6>
            <p class="card-text pt-3" style="text-align: justify; font-size: 13px">Investasi sering diartikan menanam sejumlah modal untuk memperoleh keuntungan jangka panjang. Seringnya, ini dikaitkan dengan uang dan harta benda. Padahal,
              <a href="https://www.idntimes.com/life/inspiration/mutia-zahra-4/strategi-investasi-untuk-pengembangan-diri-c1c2
              " target="_blank">baca selanjutnya</a></p>
          </div>
        </div>

        <div class="card col-3">
          <img src="{{asset('images/berita-sahampemula.JPG')}}" class="card-img-top" height="200px" alt="goto" />
          <div class="card-body mx-2">
            <h6 class="card-title fw-semibold" style="text-align: justify">8 Rekomendasi Saham Untuk Pemula (2023)</h6>
            <p class="card-text pt-3" style="text-align: justify; font-size: 13px">Saham merupakan instrumen investasi yang menawarkan imbal hasil yang tinggi dengan risiko yang tinggi pula (high risk, high return). Meskipun demikian,
              <a href="https://investbro.id/rekomendasi-saham-untuk-pemula/" target="_blank">baca selanjutnya</a></p>
          </div>
        </div>
      
      </div>
    </div>

    <!-- endcontent -->
  </div>

@include('components.footer')