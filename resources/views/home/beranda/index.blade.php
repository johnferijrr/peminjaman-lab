@extends('home/layout/app')
@foreach($profil as $profil)
@section('title',"$profil->nama_profil - $profil->jenis_apk")
@section('content')
<section id="hero" style="background-image: url({{asset('futsal-banner.jpg')}});background-size: 100% 100%;background-repeat: no-repeat;">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <div class="carousel-inner" role="listbox">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container">
          <div class="container">
            <h2 class="animate__animated animate__fadeInDown">E-SARPRAS VOKASI<span>Web <br>{{$profil->nama_profil}}</span></h2>
            <!-- <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Panduan</a> -->
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Hero -->

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
  <div class="container">

    <div class="row no-gutters text-center">

      <div class="col-lg-3 col-md-6 content-item">
        <span>01</span>
        <h4>Registrasi</h4>
        <p>Lakukan Pendaftaran untuk User Baru</p>
      </div>

      <div class="col-lg-3 col-md-6 content-item">
        <span>02</span>
        <h4>Login</h4>
        <p>Lakukan Login dan Lakukan Peminjaman Sarana</p>
      </div>

      <div class="col-lg-3 col-md-6 content-item">
        <span>03</span>
        <h4>Isi Data</h4>
        <p>Lakukan pengisian data sesuai kebutuhan</p>
      </div>

      <div class="col-lg-3 col-md-6 content-item">
        <span>04</span>
        <h4>Proses Konfirmasi</h4>
        <p>Setelah mengisi data di lakukan, tunggu Admin untuk Konfirmasi status peminjaman anda</p>
      </div>

    </div>

  </div>
</section><!-- End Why Us Section -->

<section id="team" class="team section-bg">
  <div class="container">

    <div class="section-title">
      <h2>Sarana dan Prasarana</h2>
    </div>

    <div class="row">
      @foreach($lapangan as $lp)
      <div class="col-lg-3 col-md-6 align-items-stretch">
        <div class="member">
          <img src="{{asset('gambar')}}/{{$lp->gambar}}" alt="">
          <h4>{{$lp->nama_jenis}}</h4>
          <span>
           {{number_format($lp->harga,0,",",".")}} - {{$lp->nama_lap}}
         </span>
         <p>
          <a href="{{route('boking',['id_lapangan'=>$lp->id_lapangan,'gambar'=>$lp->gambar])}}"><span class="badge" style="background: #f73859;">Klik untuk Sewa</span></a>
        </p>
        <div class="social">
          <a href="{{route('visit',$lp->id_lapangan)}}" style="float: left;">Lihat Sarana</a>
          <!-- <a href="" style="float: right;">Cek Boking Sarana</a> -->
        </div>
      </div>
    </div>
    @endforeach
  </div>

</div>
</section>

<!-- ======= Cta Section ======= -->
<section id="cta" class="cta">
  <div class="container">

    <div class="row">
      <div class="col-lg-9 text-center text-lg-start">
        <h3>Sudah punya Akun ?</h3>
        <p> Mahasiswa bisa masuk dengan login <br> Klik <b>Login</b> di samping</p>
      </div>
      <div class="col-lg-3 cta-btn-container text-center">
        <a class="cta-btn align-middle" href="{{route('login')}}">Login</a>
      </div>
    </div>

  </div>
</section><!-- End Cta Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container">

    <div class="section-title">
      <h2>Sekolah Vokasi UGM</h2>
    </div>

    <div class="row">

      <div class="col-lg-12 d-flex align-items-stretch">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Lokasi:</h4>
            <p>
              <?php
              $array = explode(PHP_EOL, $profil->lokasi);
              $total = count($array);
              foreach($array as $item) {
                echo "<span>". $item . "</span><br>";
              }
              ?>
            </p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Telepon:</h4>
            <p>{{$profil->no_profil}}</p>
          </div>
          <iframe src="https://maps.google.com/maps?hl=en&amp;q={{$profil->nama_profil}} {{$profil->lokasi}}+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
        </div>

      </div>

    </div>

  </div>
</section>
@endsection
@endforeach