@include('templates.header')
    <div class="box-auth" style="@if(auth()->user() == true) flex-direction: column; @endif">
        @if (auth()->user() == false)
        <div class="auth" style="top: 7em;">
            <div class="imgBox-auth">
                <img src="{{ asset('img/register_trainer.png') }}" alt="bg_login">
            </div>

            <form action="/create_mentor" method="POST">
                @csrf
                <a href="{{ route('home') }}"><img src="{{ asset('img/mentorskil logo2.png') }}" alt="MentorSkill.ID Logo" style="height: 35px"></a>
                <h5 class="mt-3 mb-2" style="font-weight: bold">Daftar Mentor!</h5>

                <div class="row mb-0 my-0 mb-1">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="nama_lengkap">Nama Lengkap :</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap') }}" autofocus>
                        @error('nama_lengkap')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <label for="username" class="mt-2">Username :</label>
                <input type="username" class="form-control mb-0 @error('username') is-invalid @enderror" name="username" id="username"  placeholder="Masukkan username" value="{{ old('username') }}">
                @error('username')
                    <span class="text-danger d-block mb-0">{{ $message }}</span>
                @enderror
                
                <label for="email" class="mt-2">Email :</label>
                <input type="email" class="form-control mb-0 @error('email') is-invalid @enderror" name="email" id="email"  placeholder="Masukkan email" value="{{ old('email') }}">
                @error('email')
                    <span class="text-danger d-block mb-0">{{ $message }}</span>
                @enderror

                <label for="password" class="mt-2">Password :</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror mb-1" name="password" id="password"  placeholder="Masukkan password">
                @error('password')
                    <span class="text-danger d-block">{{ $message }}</span>
                @enderror

                <label for="cpassword" class="mt-2">Konfirmasi Password :</label>
                <input type="password" class="form-control @error('cpassword') is-invalid @enderror" name="cpassword" id="cpassword"  placeholder="Konfirmasi password">
                @error('cpassword')
                    <span class="text-danger d-block">{{ $message }}</span>
                @enderror
                
                <button class="btn btn-primary mt-3" type="submit" style="width: 100%">Daftar</button>
                <p class="text-center mt-1 mb-0">
                    Sudah punya akun Mentor? <a href="{{ route('login') }}">Masuk</a>
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