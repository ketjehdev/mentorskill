@include('templates.header-core')
<div class="container-scroller">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('templates.sidebar-core')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @include('templates.shortcut-core')
            <div class="row mt-3" style="gap: 20px; height: 65vh;">
              <div class="col-lg-3 p-3" style="box-shadow: 0 1px 2px 0 rgba(0,0,0,0.08); background: #fff; border-radius: 5px;">
                <div class="d-flex flex-column justify-content-center align-items-center" style="border-bottom: 1px solid #aaa;">
                  <img class="rounded-circle mb-2" src="{{ asset('img/profils/'.auth()->user()->profil) }}" style="width: 40%" alt="{{ auth()->user()->username . "|" . auth()->user()->profil }}">  
                  <h4 class="text-center" style="font-weight: bold">{{ auth()->user()->username }}</h4>
                </div>
                <div class="d-flex justify-content-between mt-3">
                  <h6 class="" style="font-weight: bold">Lencana</h6> <i class="text-warning mdi mdi-star"></i>
                </div>
                <p class="text-center text-secondary">
                  belum ada lencana
                </p>
              </div>
              <div class="col-lg-8 p-4" style="box-shadow: 0 1px 2px 0 rgba(0,0,0,0.08); background: #fff; border-radius: 5px;">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama lengkap kamu">
                <br>
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username kamu">
              </div>
            </div>
        </div>
@include('templates.footer-core')