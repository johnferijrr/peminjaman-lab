<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LAPORAN Peminjaman</title>

	<link rel="stylesheet" href="{{asset('template/print/table.css')}}">

</head>
<body>
	@if($_GET['keyword']=="Export-Excel")
	<?php  
	header("Content-type: application/vnd-ms-excel");
	header('Content-Disposition: attachment; filename=Laporan Penyewaan.xls'); 
	?>
	@endif
	<div class="card-body">
		<center>
			<h2>Laporan Peminjaman</h2>
		</center>
		@if($_GET['keyword']=="Export-PDF")
		<table class="table table-bordered table-striped" id="table1">
			@else
			<table style="width: 100%;" border="1">
				@endif
				<thead>
					<tr>
						<th>No. </th>
						<th>Nama Sarana dan Prasarana</th>
						<th>Nama Mahasiswa</th>
						<th>No HP</th>
						<th>Jumlah Item</th>
						<th>Jam</th>
						<th>Lama Sewa</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<?php $nul=0; ?>
					<?php $no=1; ?>
					@foreach($data as $dt)
					<?php date_default_timezone_set('Asia/Jakarta');
					$mulai=strtotime($dt->jam_mulai);
					$selesai=strtotime($dt->jam_selesai);

					$dif=$selesai-$mulai;

					$jam=floor($dif/(60*60));
					$menit=$dif-$jam*(60*60);
					$menit2=floor($menit/60);
					if ($menit2>=30) {
						$jam+=1;
					}
					$total=$dt->harga*$jam;
                    $subtotal=number_format($nul+=$total,0,",",".");
					?>
					<tr>
						<td>{{$no}}. </td>
						<td>{{$dt->nama_lap}}</td>
						<td>{{$dt->name}}</td>
						<td>{{$dt->no_telp}}</td>
						<td>{{number_format($dt->harga,0,",",".")}}</td>
						<td>{{$dt->jam_mulai}} - {{$dt->jam_selesai}}</td>
						<td>
							{{$jam}} Jam
						</td>
						<td>Rp {{number_format($total,0,",",".")}}</td>
					</tr>
					<?php $no++ ?>
					@endforeach
					@foreach($omset as $mo)
					<tr>
						<td colspan="7"><b>Subtotal : </b></td>
						<td>Rp {{$subtotal}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

	</body>
	</html>
