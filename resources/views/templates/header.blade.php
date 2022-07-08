<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- favicon --}}
    <link rel="icon" href="{{ asset('img/mentorskil.png') }}">
    {{-- stylesheet API AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- stylesheet API bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- link stylesheet css --}}
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    {{-- link stylesheet css --}}
    @if ($title == 'Login')
    <link rel="stylesheet" href="{{ asset('css/splash.css') }}">
    @endif
    {{-- link stylesheet css --}}
    @if (in_array($title, ['Login', 'Student']))        
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @endif
    {{-- link responsiver dashboard --}}
    @if (in_array($title, ['dashboard'])) 
    <link rel="stylesheet" href="{{ asset('css/responsiver.dash.css') }}">
    @endif

    @if ($title == 'Home')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endif
    <title>{{ $title; }} | MentorSkill</title>
</head>
<body>

    {{-- navbar --}}
	<nav class="navbar navbar-expand-lg position-fixed navbar-light" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px; width: 100%; background: #fff; z-index: 10;">
		<div class="container-fluid">
			<a href="/" class="navbar-brand my-0">
                <img src="{{ asset('img/mentorskil logo2.png') }}" height="45" alt="Mentor Skill Logo" class="mx-3 my-0">
            </a>

			<button type="button" class="navbar-toggler" style="border: 0;" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			
            <div class="collapse navbar-collapse" id="navbarCollapse">
				<div class="navbar-nav ms-auto">

                    <a href="{{ route('home') }}" class="nav-item nav-link text-center @if($title == 'Home') active @endif mx-4">Home</a>                        
                        @if (auth()->user() == false)
                        <div class="dropdown">
                                <a class="text-center nav-item nav-link text-center mx-4 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                Daftar
                                </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li>           
                                    <a class="dropdown-item" href="#">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('img/trainer.png') }}" height="60" class="rounded-circle" alt="">
                                            <span class="mx-2">Daftar Mentor/Fasilitator</span>
                                        </div>
                                    </a>
                                </li>

                                <li>           
                                    <a class="dropdown-item @if($title == 'Student') active @endif" href="{{ route('student') }}">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('img/book.jpg') }}" height="60" class="rounded-circle" alt="">
                                            <span class="mx-2">Daftar E-Learning</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        @endif
                        <a href="{{ url('/home-magang') }}" class="nav-item nav-link text-center @if($title == 'Magang') active @endif mx-4">Magang</a>
                        <a href="{{ url('/home-semua-kelas') }}" class="nav-item nav-link @if($title == 'Semua Kelas') active @endif  text-center  mx-4">Semua Kelas</a>
                        <a href="" class="nav-item nav-link text-center  mx-4">Tentang Kami</a>
                </div>

                <div class="navbar-nav ms-auto">
                    @if (auth()->user() == false)
                        <a href="{{ route('login') }}" class="bg-primary nav-item nav-link btn btn-success text-light px-4 mx-4" style="border-radius: 20px; font-weight: bold; border: 0"><i data-feather="log-in"></i> Login</a>
                        @else
                        <div class="d-flex align-items-center mx-2">
                            <div class="d-flex align-items-center mx-1">
                                @if (auth()->user() == true)
                                    <a href="{{ route('dashboard') }}">
                                        <button class="btn border border-primary">Dashboard</button>
                                    </a>    
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
			</div>
		</div>
	</nav>

