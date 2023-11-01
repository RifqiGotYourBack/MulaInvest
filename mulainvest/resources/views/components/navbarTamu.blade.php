<body>
    
    <nav class="navbar navbar-expand-lg px-5" style="background-color: #0198a3">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="images/mulainvest.png" width="80px" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item pe-4">
                <a class="nav-link white fw-medium hoverText" aria-current="page" href="{{ route('berandaTamu') }}">Beranda</a>
              </li>
              <li class="nav-item px-4">
                <a class="nav-link white fw-medium hoverText" href="{{ route('tentang') }}">Tentang</a>
              </li>
              <li class="nav-item ps-4">
                <a class="nav-link white fw-medium hoverText" href="https://wa.me/6285880937403">Tanya kami <img src="images/tanya.png" alt="" width="20px" /></a>
              </li>
            </ul>
          </div>
          <div class="">
            <a class="btn btn-warning btn-sm" href="{{ route('login') }}" role="button">Login as User</a>
            <a class="btn btn-outline-light btn-sm" href="{{ route('loginAdmin') }}" role="button">Login as Admin</a>
          </div>
        </div>
      </nav>
      <!-- content -->