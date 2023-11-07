@include('components.header')
@include('components.navbar')

<div>
    <div class="d-flex flex-column justify-content-center text-center bg-secondary-subtle" style="height: 260px">
      <h2 class="">Frequently Asked Questions
    </h2>
    </div>

    <div class="d-flex flex-column text-center px-5 my-5 justify-content-center" >
        
        <div class="d-flex py-5 justify-content-around">
        
          <div class="card border-warning mb-3 col-3 border-2" >
            <div class="card-header fw-bold bg-warning ">
                <img src="{{asset('images/keamanan.png')}}" width="30px" alt="keamanan">
                Keamanan
            </div>
            <div class="card-body ">
              <h6 class="card-title fw-semibold" style="text-align: justify">Bagimana Mulainvest melindungi data pribadi dan finansial pengguna?
            </h6>
              <p class="card-text" style="font-size: 12px; text-align: justify">Kami mengambil serangkaian tindakan keamanan yang ketat untuk melindungi data pribadi dan finansial pengguna kami. Ini termasuk enkripsi data yang kuat, pemantauan aktif terhadap aktivitas mencurigakan, dan praktik keamanan siber terbaik.</p>
            </div>
          </div>

          <div class="card border-warning mb-3 col-3 border-2" >
            <div class="card-header fw-bold bg-warning ">
                <img src="{{asset('images/layanan.png')}}" width="30px" alt="layanan">
                Layanan
            </div>
            <div class="card-body">
              <h6 class="card-title fw-semibold" style="text-align: justify">Apa pilihan portofolio investasi yang tersedia di MulaiInvest ?
            </h6>
            <p class="card-text" style="font-size: 12px; text-align: justify">MulaiInvest menawarkan berbagai pilihan portofolio investasi, termasuk saham, obligasi, reksa dana, dan investasi real estate. Anda dapat memilih portofolio yang sesuai dengan tujuan dan toleransi risiko Anda. Anda juga dapat berkonsultasi dengan penasihat investasi kami untuk rekomendasi yang lebih spesifik.
            </p>
            </div>
          </div>

          <div class="card border-warning mb-3 col-3 border-2" >
            <div class="card-header fw-bold bg-warning ">
                <img src="{{asset('images/administrasi.png')}}" width="30px" alt="administrasi">
                Administrasi
            </div>
            <div class="card-body">
              <h6 class="card-title fw-semibold" style="text-align: justify">kemanakah saya harus melaporkan kendala penggunaan platform?
            </h6>
            <p class="card-text" style="font-size: 12px; text-align: justify">Jika Anda mengalami kendala atau masalah teknis, silakan kunjungi menu "Tanya Kami" di halaman beranda untuk melaporkannya. Tim kami akan dengan senang hati membantu Anda.
            </p>
            </div>
          </div>
        
        </div>

        <div class="d-flex py-5 justify-content-around">
        
            <div class="card border-warning mb-3 col-3 border-2" >
              <div class="card-header fw-bold bg-warning ">
                  <img src="{{asset('images/layanan.png')}}" width="30px" alt="layanan">
                  Layanan
              </div>
              <div class="card-body ">
                <h6 class="card-title fw-semibold" style="text-align: justify">Apakah Mulainvest dapat membantu seseorang yang ingin memulai berinvestasi?
              </h6>
                <p class="card-text" style="font-size: 12px; text-align: justify">Tentu! MulaiInvest siap membantu Anda dalam pengalaman investasi pertama Anda. Kami menyediakan panduan dan dukungan yang komprehensif untuk membantu Anda memulai. Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau butuh bantuan lebih lanjut.
                </p>
              </div>
            </div>
  
            <div class="card border-warning mb-3 col-3 border-2" >
              <div class="card-header fw-bold bg-warning ">
                  <img src="{{asset('images/keamanan.png')}}" width="30px" alt="keamanan">
                  Keamanan
              </div>
              <div class="card-body">
                <h6 class="card-title fw-semibold" style="text-align: justify">Bagaimana MulaiInvest memastikan bahwa akun pengguna aman dari akses yang tidak sah?
              </h6>
              <p class="card-text" style="font-size: 12px; text-align: justify">Kami menjaga keamanan akun pengguna dari awal saat pendaftaran hingga transaksi sukses dilakukan. Kami juga menerapkan sistem keamanan ganda pada setiap aktivitas penting, yang mendapat dukungan dari tim keamanan kami yang sangat berpengalaman.
              </p>
              </div>
            </div>
  
            <div class="card border-warning mb-3 col-3 border-2" >
              <div class="card-header fw-bold bg-warning ">
                  <img src="{{asset('images/administrasi.png')}}" width="30px" alt="administrasi">
                  Administrasi
              </div>
              <div class="card-body">
                <h6 class="card-title fw-semibold" style="text-align: justify">Bagaimana proses administrasi akun di MulaiInvest?
              </h6>
              <p class="card-text" style="font-size: 12px; text-align: justify">Proses administrasi akun di MulaiInvest mudah dilakukan melalui panel akun Anda, di mana Anda dapat mengelola kata sandi, melihat saldo, dan mengelola saham yang ada miliki. Jika ada pertanyaan, hubungi tim Layanan Pelanggan melalui menu "Tanya Kami."
              </p>
              </div>
            </div>
          
          </div>
    </div>
</div>

@include('components.footer')