<header id="header" class="d-flex align-items-center">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="">{{$profil->nama_profil}}</a></h1>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="{{route('index')}}">Beranda</a></li>
        <li><a class="nav-link scrollto" href="#team">Sarana dan Prasarana</a></li>
        <li><a class="nav-link scrollto" href="#why-us">Panduan Peminjaman</a></li>
        <li><a class="nav-link scrollto" href="#contact">Lokasi</a></li>
        @if(Auth::user())
        <li class="dropdown"><a href="#"><span>{{Auth::user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="{{route('profil')}}">{{Auth::user()->name}}</a></li>
            <li><a href="{{route('logout')}}">Logout</a></li>
          </ul>
        </li>
        @else
        <li><a class="getstarted scrollto" href="{{route('login')}}">Login</a></li>
        <li><a class="getstarted scrollto" href="{{route('register')}}">Register</a></li>
        @endif
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>
</header>