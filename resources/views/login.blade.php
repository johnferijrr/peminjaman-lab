@extends('layout/app')

@section('title', 'Login')

@section('content')
<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 class="auth-title">Log in.</h1>
                <p class="auth-subtitle mb-5">Login mengunakan username dan password.</p>

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" class="form-control form-control-xl" id="username" placeholder="Username">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" class="form-control form-control-xl" id="password" placeholder="Password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" checked="" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div>
                <button onclick="kirim()" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">Belum ada Akun? <a href="{{route('register')}}"
                        class="font-bold">Sign
                    up</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
<script type="text/javascript">
  function kirim() {
    var username=$('#username').val();
    var password=$('#password').val();
    $.ajax({
        url : "{{route('ceklogin')}}",
        type : 'POST',
        data : {
            '_method' : 'POST',
            '_token' : '{{ csrf_token() }}',
            'username' : username,
            'password' : password
        },
        success: function(response) {
            let timerInterval
            if (response.masuk_admin) {
                Swal.fire({
                    title: 'Login Berhasil',
                    html: 'Mohon Menunggu proses Login',
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                          b.textContent = Swal.getTimerLeft()
                      }, 50)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    window.location="{{route('home')}}";
                })
            }
            if (response.masuk_penyewa) {
                Swal.fire({
                    title: 'Login Berhasil',
                    html: 'Mohon Menunggu proses Login',
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                          b.textContent = Swal.getTimerLeft()
                      }, 50)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    window.location="{{route('index')}}";
                })
            }
            if (response.notmasuk) {
              Swal.fire({
                icon: "error",
                type: "error",
                title: 'Login Gagal',
                text: 'Username dan Password tidak sesuai.',
                showConfirmButton: false,
                timer: 1300
            });
          }
          if (response.kosong) {
            Swal.fire({
                icon: "warning",
                type: "warning",
                title: 'Masukkan Data',
                text: 'Harap masukkan Username dan Password anda.',
                showConfirmButton: false,
                timer: 1500
            });
        }
    }
});     
}
</script>
@endsection