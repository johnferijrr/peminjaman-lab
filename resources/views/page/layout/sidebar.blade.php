<?php  
$profil=DB::table('profil')->get();
?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        @foreach($profil as $prf)
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="">{{$prf->nama_profil}}</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        @endforeach
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                @if(Auth::user()->level=="Admin")
                <li class="sidebar-item active ">
                    <a href="{{route('home')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="{{route('profil_lapangan')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Profil Web</span>
                    </a>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="dripicons dripicons-user-group"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{route('pengguna')}}">Admin</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{route('user')}}">Mahasiswa</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="dripicons dripicons-suitcase"></i>
                        <span>Data Sarana</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{route('lapangan')}}">Barang</a>
                        </li>
                    </ul>
                </li>
                

                

                <li class="sidebar-item  ">
                    <a href="{{route('sewa')}}" class='sidebar-link'>
                        <i class="bi bi-hourglass"></i>
                        <span>Data Peminjaman</span>
                    </a>
                </li>
                <li class="sidebar-item  ">
                    <a href="{{route('laporan')}}" class='sidebar-link'>
                        <i class="dripicons dripicons-document"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                @endif
                @if(Auth::user()->level=="Penyewa")
                <li class="sidebar-item active ">
                    <a href="{{route('index')}}#team" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Boking Sarana</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="dripicons dripicons-user-id"></i>
                        <span>Data Profil</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{route('profil')}}">Profil</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="dripicons dripicons-suitcase"></i>
                        <span>Data Sewa</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{route('data_sewa')}}">Sewa Lapangan</a>
                        </li>
                    </ul>
                </li>
                @endif

                <li class="sidebar-title">Sign-Out</li>

                <li class="sidebar-item  ">
                    <a href="{{route('logout')}}" class='sidebar-link'>
                        <i class="dripicons dripicons-exit"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>