@extends('home/layout/app')

@foreach($data as $da)
@section('title',"$da->nama_lap")

@section('content')<!-- End Header -->

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Sarana Detail</h2>
      <ol>
        <li><a href="">Home</a></li>
        <li><a href="">Lihat Sarana</a></li>

      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-8">
        <div class="portfolio-details-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide">
              <img src="{{asset('gambar')}}/{{$da->gambar}}" alt="">
            </div>
            @foreach($image as $img)
            <div class="swiper-slide">
              <img src="{{asset('image')}}/{{$img->filename}}" alt="">
            </div>
            @endforeach

          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>Sarana Detail</h3>
          <ul>
            <li class="text mb-3" style="text-decoration: underline;"><center><h4>{{$da->nama_jenis}}</h4></center></li>
            <li><strong>Nama Sarana</strong>: {{$da->nama_lap}}</li>
            <li><strong>Kegiatan</strong>: {{$da->kegiatan}}</li>
            <li><strong>Jumlah</strong>: Rp {{number_format($da->harga,0,",",".")}}</li>
          </ul>
          <a href="{{route('boking',['id_lapangan'=>$da->id_lapangan,'gambar'=>$da->gambar])}}" class="btn btn-danger btn-sm">Sewa</a>
        </div>
        <div class="portfolio-description">
          <h2>Keterangan/Detail Sarana</h2>
          <p>
            <?php
            $array = explode(PHP_EOL, $da->det_lapangan);
            $total = count($array);
            foreach($array as $item) {
              echo $item . "<br>";
            }
            ?>
          </p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Portfolio Details Section -->
<!-- ======= Contact Section ======= -->
@endforeach
@endsection