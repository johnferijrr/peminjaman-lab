@extends('page/layout/app')

@section('title', 'Data Sewa')

@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-8">
            @foreach($data as $dt)
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <form class="form form-vertical" method="post" action="{{route('keterangan')}}">
                                            @csrf
                                            <label for="first-name-vertical">Keterangan</label>
                                            <input type="hidden" name="id_sewa" value="{{$dt->id_sewa}}">
                                            <select class="form-control" name="keterangan">
                                                <option <?php if($dt->keterangan=="-"){echo "selected";} ?> value="-">Pending</option>
                                                <option <?php if($dt->keterangan=="Sedang di Cek"){echo "selected";} ?> value="Sedang di Cek">Sedang di Cek</option>
                                                <option <?php if($dt->keterangan=="Aktif"){echo "selected";} ?> value="Aktif">Aktif</option>
                                                <option <?php if($dt->keterangan=="Selesai"){echo "selected";} ?> value="Selesai">Selesai</option>
                                            </select>
                                            <button class="btn btn-sm btn-outline-primary rounded-pill mt-3"> <i class="icon dripicons-document-edit"></i> Ubah</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group text-center">
                                        @if($dt->bukti_tf!=="-")
                                        <form class="form form-vertical" method="GET" action="{{route('konfirmasi',$dt->id_sewa)}}">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-success form-control rounded-pill mt-4"> <i class="icon dripicons-document-edit"></i> Confirm</button>
                                        </form>
                                        @else
                                        <span class="badge bg-warning text-white mt-4">Menunggu Upload Bukti</span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Nomor Induk Mahasiswa</label>
                                        <p>{{$dt->ktp}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Nama</label>
                                        <p>{{$dt->name}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Email</label>
                                        <p>{{$dt->email}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">No Telepon/WA</label>
                                        <p>
                                            @if(substr($dt->no_telp,0,1)=='0')
                                            <a href="https://wa.me/62{{substr($dt->no_telp,1)}}" target="_blank">
                                                62 {{substr($dt->no_telp,1)}}
                                            </a>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Jenis Kelaminn</label>
                                        <p>{{$dt->jenis_kelamin}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Alamat</label>
                                        <p>{{$dt->alamat_penyewa}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Status</label>
                                        <p>{{$dt->keterangan}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Konfirmasi</label>
                                        <p>{{$dt->konfirmasi}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Bukti Informasi</h4>
                        <hr>
                        <div class="form-body">
                            <div class="row">
                                @if($dt->bukti_tf=="-")
                                <button class="btn btn-lg btn-danger">Belum Upload <br> Bukti Informasi</button>
                                @endif
                                @if($dt->bukti_tf!=="-")
                                <img src="{{asset('upload')}}/{{$dt->bukti_tf}}" class="img-thumbnail">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

        </div>
    </section>
</div>
@endsection