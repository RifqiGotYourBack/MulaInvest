<footer>
    <div class="container-fluid" style="background-color: #0198a3">
        <div class="d-flex justify-content-around py-4">
            <div class="col-5 d-flex align-items-center px-5">
                <div><img src="images/mulainvest.png" alt="mulainvest" width="80px" /></div>
                <div class="text-white px-3 mt-3 w-100">
                    <p style="font-size: 12px; text-align: justify">MulaInvest adalah platform investasi online yang
                        mengutamakan keamanan data pengguna. Dengan pengalaman yang mudah, terutama untuk pemula,
                        platform ini memudahkan akses ke investasi dengan aman dan tanpa kesulitan.
                    </p>
                </div>
            </div>
            <div class="col-7 px-5 d-flex justify-content-end">
                <div class="d-flex flex-column text-white" style="font-size: 15px">
                    <h5 class="">Menu</h5>
                    <a class="text-white link-body-emphasis link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="{{ route('beranda') }}"> Beranda </a>
                    <a class="text-white link-body-emphasis link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="{{ route('tentang') }}"> Tentang </a>
                    <a class="text-white link-body-emphasis link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="{{ route('investasi') }}"> Investasi </a>
                    <a class="text-white link-body-emphasis link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="{{ route('aset') }}"> Aset </a>

                    <a class="text-white link-body-emphasis text-white link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="https://api.whatsapp.com/send/?phone=6285880937403" target="_blank">
                        Tanya Kami
                    </a>
                </div>

                <div class="d-flex flex-column mx-5 text-white" style="font-size: 15px">
                    <h5>Layanan</h5>

                    <a class="text-white link-body-emphasis link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="#"> Artikel </a>
                    <a class="text-white link-body-emphasis link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                        href="{{ route('faq') }}"> FAQ </a>
                </div>

                <div class="d-flex flex-column ms-5">
                    <img src="images/Googleplay.png" alt="Google Play" width="108px" />
                    <img src="images/appstore.png" alt="App Store" width="108px" />
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center" style="background-color: rgba(255, 194, 50, 1)">
        <p class="text-copywrite text-white mb-0">Mulainvest, 2023 &copy; Kelompok 7 IT Perbankan</p>
    </div>
</footer>
</body>
<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
