    {{-- navbar --}}
	<nav class="navbar navbar-expand-lg position-fixed navbar-light" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px; width: 100%; background: #fff; z-index: 10;">
		<div class="container-fluid">
			<a href="/" class="navbar-brand my-0">
                <img src="{{ asset('img/mentorskil logo2.png') }}" height="45" alt="Mentor Skill Logo" class="mx-3 my-0 logo" style="@if($title=='Blog Templates') width:80% @endif">
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
                                    <a class="dropdown-item" href="{{ route('mentor') }}">
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
                        <a href="" class="nav-item nav-link text-center  mx-4">Mentor</a>
                        <a href="{{ url('/berita') }}" class="nav-item nav-link @if($title == 'Blog Templates') active @endif  text-center  mx-4">Berita</a>
                </div>

                <div class="navbar-nav ms-auto">
                    @if (auth()->user() == false)
                        <a href="{{ route('login') }}" class="bg-primary nav-item nav-link btn btn-success text-light px-4 mx-4" style="border-radius: 20px; font-weight: bold; border: 0"><i data-feather="log-in"></i> Login</a>
                        @else
                        @if (auth()->user() == true)
                            @if ($title == 'Blog Templates')
                                <a href="{{ route('blogs') }}" class="alert-warning nav-item nav-link btn px-4 mx-4" style="border-radius: 20px; font-weight: bold; border: 0">Blogs</a>
                            @else
                                <a href="{{ route('dashboard') }}" class="bg-primary nav-item nav-link btn text-light px-4 mx-4" style="border-radius: 20px; font-weight: bold; border: 0">Dashboard</a>
                            @endif
                        @endif
                    @endif
                </div>
			</div>
		</div>
	</nav>
