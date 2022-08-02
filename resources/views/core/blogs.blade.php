@include('templates.header-core')
<div class="container-scroller">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('templates.sidebar-core')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @include('templates.shortcut-core')
            <div class="row mt-3">
              @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('success') }}</strong>.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
             @endif

              <h4>Artikel Anda</h4>
              @foreach ($blog_data as $item)
                @if (auth()->user()->id_bloger == $item->id_bloger)
                  <div class="col-12 card mb-2">
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <div class="d-flex" style="overflow: auto">
                          <img src="{{ asset('storage/uploads/'.$item->gambar) }}" style="height: 70px; margin-right: 10px" alt="">
                          <div class="d-flex flex-column justify-content-center">
                            <a href="{{ url('/blog/'.$item->id) }}" style="text-decoration: none;color:#000;">
                              <h2 class="mb-0">
                                <strong>{{ $item->judul }}</strong>
                              </h2>
                            </a>
                            <p>
                              @php
                                  date_default_timezone_set('Asia/Jakarta');
                                  $date = date('D, d M Y', strtotime($item->created_at));
                                  $time = date('h:i', strtotime($item->created_at));
                              @endphp
                              <span class="px-3 alert-success text-success" style="border-radius: 20px">{{ $item->kategori }}</span> |
                              <span class="px-3 alert-info text-dark" style="border-radius: 20px">{{ $date }}</span> |
                              <span class="px-3 alert-warning text-secondary" style="border-radius: 20px">{{ $time }}</span>
                            </p>
                          </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <div class="d-flex justify-content-between">  
                            <div class="d-flex flex-column">  
                              <span style="font-size: 10px">Hapus</span>
                              <span class="mb-0 mdi mdi-delete text-danger" style="font-size: 20px"></span>
                            </div>

                            <div class="d-flex flex-column justify-content center">
                              <span style="font-size: 10px">Edit</span>
                              <span class=" mdi mdi-tooltip-edit text-info" style="font-size: 20px"></span>
                            </div>


                          </div>
                          <span>MentorSkill</span>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              @endforeach
          </div>
            <div class="row mt-3">
              <h4>Artikel para Bloger</h4>
          </div>
        </div>
@include('templates.footer-core')