<!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

      {{-- dashboard --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="menu-icon @if($title != 'Dashboard') text-danger @endif mdi mdi-view-dashboard"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      {{-- academy --}}
      <li class="nav-item nav-category">Academy</li>
      

      {{-- semua kelas --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('semua-kelas') }}">
          <i class="menu-icon @if($title != 'Semua Kelas') text-info @endif mdi mdi-book-open-page-variant"></i>
          <span class="menu-title">Semua Kelas</span>
        </a>
      </li>

      {{-- kelas langganan --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('kelas-langganan') }}">
            <i class="menu-icon @if($title != 'Kelas Langganan') text-warning @endif mdi mdi-fire"></i>
            <span class="menu-title">Kelas Langganan</span> 
        </a>
      </li>
      
      
      {{-- kompetisi --}}
      <li class="nav-item">
        <a class="nav-link"href="{{ route('kompetisi') }}">
          <i class="menu-icon mdi mdi-gamepad-variant" style="@if($title != 'Kompetisi') color:#FF7F50; @endif"></i>
          <span class="menu-title">Kompetisi</span>
        </a>
      </li>

      {{-- magang --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('magang') }}">
            <i class="menu-icon mdi mdi-microscope" style="@if($title != 'Program Magang') color:orangered @endif"></i>
            <span class="menu-title">Program Magang</span> 
        </a>
      </li>

      {{-- leaderboard --}}
      <li class="nav-item nav-category">Leaderboard</li>

      {{-- rankings --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('rankings') }}">
          <i class="menu-icon mdi mdi-google-circles-extended" style="@if($title != 'Rankings') color:	#40E0D0; @endif"></i>
          <span class="menu-title">Rankings</span>
        </a>
      </li>

      {{-- sertifikat --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('sertifikat') }}">
          <i class="menu-icon @if($title != 'Sertifikat') text-primary @endif mdi mdi-certificate"></i>
          <span class="menu-title">Sertifikat</span>
        </a>
      </li>
      
      <li class="nav-item nav-category">Pengaturan</li>
      {{-- profilku --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('profil') }}">
          <i class="menu-icon mdi mdi-account-circle-outline" style="@if($title != 'Profilku') color:#663399; @endif"></i>
          <span class="menu-title">Profilku</span>
        </a>
      </li>
     
     
      {{-- logout --}}
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link">
          <i class="menu-icon mdi mdi-logout" style="@if(auth()->user() == true) color:#A0522D @endif"></i>
          <span class="menu-title">Keluar</span>
        </a>
      </li>

    </ul>
  </nav>
  