<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $title }} | {{ Str::ucfirst(auth()->user()->role) }} MentorSkill</title>
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <link rel="icon" href="{{ asset('img/mentorskil.png') }}" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  @if ($title == 'Dashboard')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />      
  @endif
</head>

<style>
  * {
    font-family: 'Nunito', sans-serif;
  }
  a {
    text-decoration: none;
  }
</style>

<body>
    <!-- navbar -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row" style="background: #fff; border-top: 4px solid #2379ca; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start" style="background: #fff">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="{{ route('home') }}">
              <img src="{{ asset('img/mentorskil logo2.png') }}" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini d-lg-none" href="{{ route('profil') }}">
              <img src="{{ asset('img/profils/'.auth()->user()->profil) }}" style="height: 100%; width: 100%; border: 1px solid navy; border-radius: 100%" alt="logo" />
            </a>
          </div>
          
        </div>
        
        <div class="navbar-menu-wrapper d-flex align-items-top" style="background: #fff"> 
          <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
              <h3><span class="text-black fw-bold">{{ $title }}</span></h3>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto">
            @if (auth()->user()->role == 'student')
              @if ($title != 'Semua Kelas')
                <li class="nav-item">
                  <a href="{{ route('semua-kelas') }}">
                    <button class="btn btn-primary">&plus; Join kelas</button>
                  </a>
                </li>
              @endif
            @endif
  
            <!-- profil -->
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="{{ asset('img/profils/'.auth()->user()->profil) }}" alt="Profile image" style="border: 1.3px solid blue"> <span>{{ auth()->user()->username }} @if(auth()->user()->role == 'admin') <span class="text-success mb-0"><i class="mdi mdi-check-circle"></i></span> @endif</span> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3 font-weight-semibold">{{ auth()->user()->username }}</p>
                  <p class="fw-light text-muted mb-0">{{ auth()->user()->email }}</p>
                </div>
  
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Profilku <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                <a href="{{ route('logout') }}" class="dropdown-item text-danger mb-0"><i class="dropdown-item-icon text-danger mdi mdi-power text-primary me-2"></i>Keluar</a> 
            </li>
            
          </ul>
          
          
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center position-relative" type="button" data-bs-toggle="offcanvas" style="top: 8px">
              <span class="mdi mdi-menu" title="navbar-toggler" style="font-size: 25px"></span>
          </button>

        </div>
      </nav>