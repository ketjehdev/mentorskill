@include('templates.header-core')
  <div class="container-scroller">

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('templates.sidebar-core')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-lg-5 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body d-flex flex-column align-items-center">
                                <img src="{{ asset('img/profils/'.auth()->user()->profil) }}" class="rounded-circle" style="width: 40%;">
                                
                                <div class="d-flex flex-column mt-3 mb-0">
                                  <h4 class="text-center mb-0" style="font-weight: bold;">{{ auth()->user()->nama_depan . " " . auth()->user()->nama_belakang }}</h4>
                                  <p>{{ auth()->user()->email }}</p>
                                </div>

                                <div class="d-flex mt-0 mb-0">
                                  <a href="{{ route('sertifikat') }}">
                                    <button class="btn btn-primary text-light">
                                      <p style="font-size: 13px" class="mb-0">
                                        <i class="mdi mdi-certificate"></i>
                                        Sertifikat
                                      </p>
                                    </button>
                                  </a>
                                  <a href="{{ route('profil') }}">
                                    <button class="btn btn-info">
                                      <p style="font-size: 13px" class="mb-0">
                                        <i class="mdi mdi-grease-pencil"></i>
                                        Edit Profil
                                      </p>
                                    </button>
                                  </a>
                                </div>
                             </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- class -->
                      <div class="col-lg-7 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body pb-0"  style="height: 50vh; overflow: auto;">
                                <h4 class="card-title card-title-dash mb-3">Kelas Langganan</h4>
                                
                                <a href="{{ route('kelas-langganan') }}" style="text-decoration: none;">
                                  <div class="row">
                                    <div class="col-12 d-flex" style="border-bottom: 1px solid #ddd;">
                                      <img src="{{ asset('img/mentorskil.png') }}" style="width: 40px; height: 40px;" class="rounded-circle my-2 mx-2">
                                      <div class="d-flex flex-column justify-content-center">
                                        <h5>Pembelajaran Java untuk pemula</h5>
                                        <h6 class="text-secondary">Neville</h6>
                                      </div>
                                    </div>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">History Transaksi</h4>
                                   <p class="card-subtitle card-subtitle-dash">History aktifitas pemesanan kelas kamu! 🚀</p>
                                  </div>
                                  <div>
                                </div>
                                </div>
                              
                                <div class="d-sm-flex mt-4 align-items-center justify-content-between">
                                  <div class="table-responsive" style="width: 100%">
                                    <table id="historyTransaksi" class="table">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                          <th>Nama kelas</th>
                                          <th>Kategori</th>
                                          <th>Status</th>
                                          <th>Hari Pembelian</th>
                                        </tr>
                                      </thead>

                                      <tbody>
                                        <tr>
                                          <td>1</td>
                                          <td>Java</td>
                                          <td>Programming</td>
                                          <td><span class="px-3 text-center bg-success text-light" style="border-radius: 10px">Aktif</span></td>
                                          <td>Minggu</td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <a href="{{ route('semua-kelas') }}">
                                <img src="{{ asset('img/banner/1.png') }}" style="width: 100%; border-radius: 10px;">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@include('templates.footer-core')
