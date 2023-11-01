<body>
  
<nav class="navbar navbar-expand-lg px-5" style="background-color: #0198a3">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('beranda') }}">
      <img src="images/mulainvest.png" width="80px" alt="mulainvest" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item pe-4">
          <a class="nav-link white fw-medium hoverText" aria-current="page" href="{{ route('beranda') }}">Beranda</a>
        </li>
        <li class="nav-item px-4">
          <a class="nav-link white fw-medium hoverText" href="{{ route('tentang') }}">Tentang</a>
        </li>
        <li class="nav-item px-4">
          <a class="nav-link white fw-medium hoverText" href="{{ route('investasi') }}">Investasi</a>
        </li>
        <li class="nav-item px-4">
          <a class="nav-link white fw-medium hoverText" href="{{ route('aset') }}">Aset</a>
        </li>
        <li class="nav-item ps-4">
          <a class="nav-link white fw-medium hoverText" href="https://wa.me/6285880937403" target="_blank">Tanya kami <img src="images/tanya.png" alt="" width="20px" /></a>
        </li>
      </ul>
    </div>
    <div class="">
      <ul class="navbar-nav justify-content-center">
        <li class="nav-item dropdown">
          <img src="images/profilNav.png" width="50 px" alt="Profile Image" class="nav-link dropdown-toggle text-white profile-image" href="profile-image" role="button" data-bs-toggle="dropdown" aria-expanded="false" />
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="{{ route('profil') }}">
                <img class="me-2" src="images/profil.png" alt="profil-logo" width="23px" />
                Profil</a
              >
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('bankAkun') }}">
                <img class="me-2" src="images/saldo.png" alt="saldo" width="23px" />
                Saldo</a
              >
            </li>
            <li>
              <a class="dropdown-item" href="{{ route('gantiPassword') }}">
                <img class="me-2" class="me-2" src="images/gantiPass.png" alt="gantipass" width="23px" />
                Ganti Password</a
              >
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <img class="me-2" src="images/bantuan.png" alt="bantuan" width="23px" />
                Bantuan</a
              >
            </li>
            <li><hr class="dropdown-divider" /></li>
            <li>
              <a class="dropdown-item" href="{{ route('berandaTamu') }}">
                <img class="me-2" src="images/keluar.png" alt="keluar" width="23px" />
                Keluar</a
              >
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- content -->