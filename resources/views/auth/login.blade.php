@include('templates.header')
    {{-- splash element --}}
    @if (auth()->user() == false)
        <div class="splash" style="background-color: #fff;">
            <img src="{{ asset('img/mentorskil.jpg') }}" class="fade-in">
        </div>
    @endif

    <div class="box-auth" style="@if(auth()->user() == true) flex-direction:column; @endif">
        @if(auth()->user() == false)
        <div class="auth" style="top: 4em;">
            <div class="imgBox-auth" style="object-fit: cover">
                <img src="{{ asset('img/bg_login.png') }}" alt="bg_login">
            </div>
            <form action="/login_portal" method="POST">
                @csrf
                <a href="{{ route('home') }}"><img src="{{ asset('img/mentorskil logo2.png') }}" alt="MentorSkill.ID Logo" style="height: 50px"></a>
                <h5 class="mt-4 mb-4" style="font-weight: bold">Hi, Welcome Back!</h5>

                @if(session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 100%">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif(session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <label for="email">Email :</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email"  placeholder="example@gmail.com" @if(!Cookie::has('email')) autofocus @endif value="@if(Cookie::has('email')){{Cookie::get('email')}}@endif">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <br>    
                
                <label for="password">Password :</label>
                <input type="password" autofocus class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukkan password kamu">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                    
                <div class="d-flex justify-content-between mt-1 mb-4">
                    <div class="d-flex">
                        <input type="checkbox" name="remember" @if (Cookie::has('remember')) checked @endif id="remember">
                        <label for="remember" class="mx-1">Ingat saya!</label>
                    </div>
                    <a href="">Lupa password?</a>
                </div>

                <button class="btn btn-primary" type="submit" style="width: 100%">Masuk</button>
                <p class="text-center mt-1 mb-0">
                    Tidak punya akun? <a href="{{ route('student') }}">Buat akun</a>
                </p>
            </form>
            
        </div>
        @endif
        @if (auth()->user() == true)
            <img src="{{ asset('img/logined.svg') }}" height="400" alt="">
            <h5 class="text-center mt-0">Kamu sudah login!</h5>
            <a href="{{ route('dashboard') }}">
                <button class="btn btn-dark">Kembali ke halaman utama</button>
            </a>
        @endif
    </div>
@include('templates.footer')