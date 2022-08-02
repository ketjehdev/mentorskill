@include('templates.header')
    <div class="box-auth" style="@if(auth()->user() == true) flex-direction: column; @endif">
        @if (auth()->user() == false)
        <div class="auth" style="top: 5em;">
            <div class="imgBox-auth">
                <img src="{{ asset('img/register_student.png') }}" alt="bg_login">
            </div>
            <form action="/create_student" method="POST">
                @csrf
                <a href="{{ route('home') }}"><img src="{{ asset('img/mentorskil logo2.png') }}" alt="MentorSkill.ID Logo" style="height: 35px"></a>
                <h5 class="mt-3 mb-2" style="font-weight: bold">Daftar Peserta E-Learning!</h5>

                <div class="row d-flex mb-0 justify-content-between my-0 mb-1">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="nama_depan">Nama Depan :</label>
                        <input type="text" name="nama_depan" id="nama_depan" placeholder="Nama depan" class="form-control @error('nama_depan') is-invalid @enderror" value="{{ old('nama_depan') }}" autofocus>
                        @error('nama_depan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="nama_belakang">Nama Belakang :</label>
                        <input type="text" name="nama_belakang" id="nama_belakang" value="{{ old('nama_belakang') }}" placeholder="Nama belakang" class="form-control @error('nama_depan') is-invalid @enderror">
                        @error('nama_belakang')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <label for="username">Username :</label>
                <input type="username" class="form-control mb-0 @error('username') is-invalid @enderror" name="username" id="username"  placeholder="Masukkan username" value="{{ old('username') }}">
                @error('username')
                    <span class="text-danger d-block mb-0">{{ $message }}</span>
                @enderror

                <label for="email">Email :</label>
                <input type="text" class="form-control mb-1 @error('email') is-invalid @enderror" name="email" id="email"  placeholder="example@gmail.com" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger d-block">{{ $message }}</span>
                @enderror
                
                <label for="password">Password :</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror mb-1" name="password" id="password"  placeholder="Masukkan password">
                @error('password')
                    <span class="text-danger d-block">{{ $message }}</span>
                @enderror

                <label for="cpassword">Konfirmasi Password :</label>
                <input type="password" class="form-control @error('cpassword') is-invalid @enderror" name="cpassword" id="cpassword"  placeholder="Konfirmasi password">
                @error('cpassword')
                    <span class="text-danger d-block">{{ $message }}</span>
                @enderror

                <button class="btn btn-primary mt-2" type="submit" style="width: 100%">Daftar</button>
                <p class="text-center mt-1 mb-0">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
                </p>
            </form>    
            </div>
            @endif

            @if (auth()->user() == true)
                <img src="{{ asset('img/registered.png') }}" class="mb-2" height="250" alt="">
                <h5 class="text-center">Kamu sudah mendaftar!</h5>
                <a href="{{ route('dashboard') }}">
                    <button class="btn btn-dark">
                        Kembali ke halaman utama
                    </button>
                </a>
            @endif
    </div>

@include('templates.footer')