@include('templates.header-core')
<div class="container-scroller">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('templates.sidebar-core')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @include('templates.shortcut-core')
            <div class="row d-flex mt-3 p-2 align-items-center justify-content-between" style="gap: 20px;">
                @foreach ($mentor as $item)
                <div class="card col-lg-5">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-evenly">
                            <img src="{{ asset('img/profils/'.$item->profil) }}" class="border border-primary rounded-circle" style="height: 50px; width: 50px;">
                           <div class="d-flex flex-column">
                            <h5 class="mb-0">
                                <strong>{{ $item->nama_lengkap }} </strong>
                            </h5>
                            @if($item->status == null && $item->email_verified_at == true)
                            <span class="text-primary" style="border-radius: 20px; font-size: 13px">
                             <strong>Pengajuan</strong>
                            </span>
                            @elseif($item->status == null && $item->email_verified_at == false)
                            <span class="text-warning" style="border-radius: 20px; font-size: 13px">
                             <strong>Email belum terverifikasi</strong>
                            </span>
                            
                            @elseif($item->status == 'aktif' && $item->email_verified_at == true)
                            <span class="text-success" style="font-size: 13px">
                              <strong>Aktif</strong>👍
                            </span>

                            @elseif($item->status == 'terverifikasi' && $item->email_verified_at == true)
                            <span class="text-success" style="font-size: 13px">
                              <strong>Aktif & Terverifikasi</strong>✅
                            </span>
                            
                            @elseif($item->status == 'nonaktif' && $item->email_verified_at == true)
                            <span class="text-danger" style="border-radius: 20px; font-size: 13px">
                              <strong>Nonaktif</strong>
                            </span>
                            @endif
                           </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                       @if ($item->email_verified_at == false)   
                        <a href="{{ url('/hapus_trainer/'.$item->crud_token) }}">
                            <button style="width: 100%" class="btn btn-danger">
                                Hapus
                            </button>
                        </a>
                       @else

                         <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>More</span>
                        </button>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#insert">Verifikasi Centang</a>
                        </div>

                       <a href="">
                            <button class="btn btn-success">
                                Verifikasi
                            </button>
                        </a>
                        <a href="">
                            <button class="btn btn-danger">
                                Hapus
                            </button>
                        </a>
                       @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@include('templates.footer-core')