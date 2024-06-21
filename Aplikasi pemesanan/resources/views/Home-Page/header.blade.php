<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm  sticky-top">
    <div class="container-fluid">
        <img src="{{ asset('img/logo.png') }}" alt="twentyfour photo">  
    <button class="navbar-toggler  shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active me-2" aria-current="page" href="{{ route('home' )}}">Home</a>
        </li>
        <li class="nav-item">
        @auth 
            <a class="nav-link me-2" href="{{ route('account.daftar_order')}}">Daftar Order</a>
        @endauth
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{ route('account.menu_booking')}}">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('account.about')}}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-2" href="{{ route('account.Gallery')}}">Gallery</a>
        </li>
      </ul>
      <div class="d-flex me-4">
      @guest
      <a href="{{ route('account.login' )}}" class="btn btn-secondary me-lg-2 me-3">Login</a>
      <a href="{{ route('account.register' )}}" class="btn btn-outline-dark">register</a>
      @else
      <div class="btn-group">
        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
        Hallo, {{ Auth::user()->name }}
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{ route('account.logout') }}">Logout</a></li>
        </ul>
      </div>
    @endguest
      </div>
    </div>
  </div>
</nav>