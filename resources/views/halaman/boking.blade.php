            @extends('page/layout/app')
            @section('title','Form Boking Penyewaan')
            @section('content')
            <div class="page-heading">
              <div class="page-title">
                <div class="row">
                  <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Boking Sarana {{Auth::user()->name}}</h3>
                  </div>
                </div>
              </div>
              <!-- // Basic multiple Column Form section start -->
              <section id="multiple-column-form">
                <div class="row match-height">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Form Peminjaman</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                          <form class="form" action="{{route('add_sewa')}}" method="post">
                            @csrf
                            <div class="row">
                              @foreach($data as $dt)
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="first-name-column">Nama Mahasiswa</label>
                                  <input type="text" readonly="" class="form-control" value="{{Auth::user()->name}}">
                                  <input type="hidden" readonly="" class="form-control" value="{{Auth::user()->id}}" name="id_user">
                                </div>
                              </div>
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Sarana Prasarana</label>
                                  <input type="text" readonly="" class="form-control" value="{{$dt->nama_lap}}" name="nama_lap">
                                  <input type="hidden" readonly="" class="form-control" value="{{$dt->id_lapangan}}" name="lap_id">
                                </div>
                              </div>
                              <input type="hidden" readonly="" class="form-control" value="{{$dt->nama_jenis}}" name="nama_jenis">
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Peminjaman</label>
                                  <input type="date" id="city-column" required="" class="form-control" name="tanggal">
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Jam Mulai</label>
                                  <input type="time" id="city-column" required="" class="form-control" name="jam_mulai">
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="country-floating">Jam Selesai</label>
                                  <input type="time" required="" id="country-floating" class="form-control"
                                  name="jam_selesai">
                                </div>
                              </div>
                              @foreach($lengkap as $lkp)
                              @if($lkp->no_telp==NULL)
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="alert alert-light-danger color-danger"><i
                                    class="bi bi-exclamation-circle"></i> Lengkapi Biodata Anda terlebih Dahulu. <b><a href="{{route('profil')}}">Click Me!</a></b></div>
                                  </div>
                                </div>
                                @endif
                                @if($lkp->no_telp!==NULL)
                                <div class="col-md-3 col-12">
                                  <div class="form-group">
                                   <button type="submit"
                                   class="btn btn-primary mt-4 form-control">Submit</button>
                                 </div>
                               </div>
                               <div class="col-md-3 col-12">
                                <div class="form-group">
                                 <button type="reset"
                                 class="btn btn-light-secondary mt-4 form-control">Reset</button>
                               </div>
                               @endif
                               @endforeach
                             </div>
                             @endforeach
                           </div>
                         </form>
                       </div>
                       <div class="card-body">
                        <table class="table table-bordered" id="table1">
                          <thead>
                            <tr>
                              <th>No. </th>
                              <th>Tanggal Peminjaman</th>
                              <th>Jam Mulai</th>
                              <th>Jam Selesai</th>
                              <th>Lama Peminjaman</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no=1; ?>
                            @foreach($list as $ls)
                            <?php date_default_timezone_set('Asia/Jakarta');
                            $mulai=strtotime($ls->jam_mulai);
                            $selesai=strtotime($ls->jam_selesai);

                            $dif=$selesai-$mulai;

                            $jam=floor($dif/(60*60));
                            $menit=$dif-$jam*(60*60);
                            $menit2=floor($menit/60);
                            if ($menit2>=30) {
                              $jam+=1;
                            }
                            ?>
                            <tr>
                              <td>{{$no}}. </td>
                              <td>{{$ls->tanggal}}</td>
                              <td>{{$ls->jam_mulai}}</td>
                              <td>{{$ls->jam_selesai}}</td>
                              <td>
                                {{$jam}} Jam
                              </td>
                            </tr>
                            <?php $no++ ?>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- // Basic multiple Column Form section end -->


          </div>
          @endsection