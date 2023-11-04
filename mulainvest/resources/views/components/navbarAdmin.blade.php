<header class="sticky-top">
    <nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #0198a3">
      <div class="container-fluid">
        <div class="w-sidenav">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidenavMenu"
            aria-controls="sidenavMenu" aria-expanded="false" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2 w-5 h-5" width="24"
              height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
              stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
              <line x1="4" y1="6" x2="20" y2="6"></line>
              <line x1="4" y1="12" x2="20" y2="12"></line>
              <line x1="4" y1="18" x2="20" y2="18"></line>
            </svg>
          </button>



          <div class="ms-0 ms-lg-4 me-4">

            <a href="" class="navbar-brand hidden-dark">
              <img src="images/mulainvest.png" width="70px">
            </a>

          </div>
        </div>

        {{-- Navbar Admin --}}
        <div class="navbar-right">
          <ul class="navbar-nav nav-tabs ms-auto">
            </li>
            <li class="nav-item dropdown">
                <span class="nav-link dropdown-toggle nav-link-avatar d-none d-md-block  text-white" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">Admin</span>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="{{ route('logout') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 icon icon-tabler icon-tabler-logout"
                      width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                      <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                    </svg>
                    <span>Keluar</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
