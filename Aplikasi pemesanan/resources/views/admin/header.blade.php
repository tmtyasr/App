<div class="container-fluid db-bg text-light d-flex align-items-center justify-content-between px-lg-4 py-lg-2 sticky-top">
    <img src="{{ asset('img/logo.png') }}" alt="twentyfour photo"> 
        <div class="btn-group">
        <button class="btn db-bg dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Hallo, {{ Auth::guard('admin')->user()->name }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{ route('admin.logout') }}">Logout</a></li>
        </ul>
      </div>
    </div>

    <!-- Sidebar -->

    <div class="col-lg-2 db-bg border-top border-3 border-light" id="dashboard-menu">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid flex-lg-column align-items-stretch">
      <h4 class="mt-2 text-dark fw-bold">ADMIN PANEL</h4>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="adminDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{route('admin.dashboard')}}"><i class="bi bi-speedometer2"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{route('admin.booking')}}"><i class="bi bi-card-list"></i> Daftar Pemesanan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{route('admin.menu_booking')}}"><i class="bi bi-list-ul"></i> Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{route('admin.user')}}"><i class="bi bi-people"></i> Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{route('admin.laporan')}}"><i class="bi bi-file-earmark-bar-graph"></i> Laporan Pemesanan</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

    