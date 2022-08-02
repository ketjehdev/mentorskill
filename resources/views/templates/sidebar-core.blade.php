<!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background: #fff;">
    <ul class="nav">
      {{-- dashboard --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
          <i class="menu-icon @if($title != 'Dashboard') text-danger @endif mdi mdi-view-dashboard"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      {{-- academy --}}
      <li class="nav-item nav-category">
        @if (auth()->user()->role == 'student')
          Academy
        @elseif(auth()->user()->role == 'admin')
          Management
        @endif
      </li> 

      {{-- semua kelas --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('semua-kelas') }}">
          <i class="menu-icon @if($title != 'Semua Kelas') text-info @endif mdi mdi-book-open-page-variant"></i>
          <span class="menu-title">@if(auth()->user()->role == 'admin') Kelas @elseif(auth()->user()->role == 'student') Semua Kelas @endif</span>
        </a>
      </li>

      {{-- kelas Kamu --}}
      @if (auth()->user()->role == 'student')          
        <li class="nav-item">
          <a class="nav-link" href="{{ route('kelas-kamu') }}">
              <i class="menu-icon @if($title != 'Kelas Kamu') text-warning @endif mdi mdi-fire"></i>
              <span class="menu-title">Kelas {{ auth()->user()->username }}</span> 
          </a>
        </li>
      @endif

      {{-- magang --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('magang') }}">
            <i class="menu-icon mdi mdi-microscope" style="@if($title != 'Program Magang') color:orangered @endif"></i>
            <span class="menu-title">Program Magang</span> 
        </a>
      </li>
     
      @if(auth()->user()->role == 'student')
      {{-- leaderboard --}}
      <li class="nav-item nav-category">Certificate</li>

      {{-- sertifikat --}}
      <li class="nav-item">
        <a class="nav-link" href="{{ route('sertifikat') }}">
          <i class="menu-icon @if($title != 'Sertifikat') text-primary @endif mdi mdi-certificate"></i>
          <span class="menu-title">Sertifikat</span>
        </a>
      </li>
      @endif
      
      @if (auth()->user()->role == 'admin' || auth()->user()->role == 'bloger')
      {{-- artikel --}}
      <li class="nav-item nav-category">News</li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('blogs') }}">
          <i class="menu-icon mdi mdi-newspaper" style="@if($title != 'Blogs') color:#722d; @endif"></i>
          <span class="menu-title">Blogs</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('buat_blog') }}">
          <i class="menu-icon mdi mdi-shape-plus" style="@if($title != 'Buat Blog') color:#31afad; @endif"></i>
          <span class="menu-title">Buat Blog</span>
        </a>
      </li>
      @endif

      {{-- profilku --}}
      <li class="nav-item nav-category">Pengaturan</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('profil') }}">
          <i class="menu-icon mdi mdi-account-circle-outline" style="@if($title != 'Profilku') color:#663399; @endif"></i>
          <span class="menu-title">Profilku</span>
        </a>
      </li>
    </ul>
  </nav>
  