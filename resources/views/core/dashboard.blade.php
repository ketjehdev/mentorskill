@include('templates.header-core')
  <div class="container-scroller">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('templates.sidebar-core')
      <!-- partial -->

      {{-- session if success to delete or nonaktif --}}
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row">
                      <div class="col-12 mb-3">
                        <h3>
                          <strong>Hai {{ auth()->user()->username }} !</strong>
                        </h3>
                      </div>
                      <div class="col-lg-5 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded alert-primary">
                              <div class="card-body d-flex flex-column align-items-center">
                                <h4 class="mb-3"><strong>Profilku</strong></h4>
                                <a href="{{ route('profil') }}" class="text-center">
                                  <img src="{{ asset('img/profils/'.auth()->user()->profil) }}" class="rounded-circle" style="width: 40%; border: 1.3px solid blue">
                                </a>

                                <div class="d-flex flex-column mt-3 mb-0">
                                
                                <a href="{{ route('profil') }}">
                                  <button class="btn mb-0 border-0">
                                    <h4 class="text-center mb-0" style="font-weight: bold;">{{ auth()->user()->username}} @if(auth()->user()->role == 'admin') <span class="text-success mb-0"><i class="mdi mdi-check-circle"></i></span> @endif </h4>
                                  </button>  
                                </a>

                                  <p>{{ auth()->user()->email }}</p>
                                </div>

                                <div class="d-flex mt-0 mb-0">
                                  @if (auth()->user()->role == 'student')
                                  <a href="{{ route('sertifikat') }}">
                                    <button class="btn btn-primary text-light">
                                      <p style="font-size: 13px" class="mb-0">
                                        <i class="mdi mdi-certificate"></i>
                                        Sertifikat
                                      </p>
                                    </button>
                                  </a>
                                  @endif
                                  <a href="{{ route('profil') }}">
                                    <button class="btn btn-light">
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
                            <div class="card card-rounded alert-warning">
                              <div class="card-body pb-0"  style="height: 50vh; overflow: auto;">
                                <h4 class="card-title card-title-dash mb-3">
                                  @if (auth()->user()->role == 'student')
                                  Kelas Kamu
                                  @elseif(auth()->user()->role == 'admin')
                                  Blog anda
                                  @endif
                                </h4>
                                
                                <a href="{{ route('kelas-kamu') }}" style="text-decoration: none;">
                                  @if (auth()->user()->role == 'student')
                                    @foreach ($list_kelas as $item)
                                      <div class="row">
                                        <div class="col-12 d-flex" style="border-bottom: 1px solid #ddd;">
                                          <img src="{{ asset('img/magang/'.$item->gambar) }}" style="width: 40px; height: 40px;" class="rounded-circle my-2 mx-2">
                                          <div class="d-flex flex-column justify-content-center">
                                            <h5>{{ $item->nama_kelas }}</h5>
                                            <h6 class="text-secondary">{{ $item->mentor }}</h6>
                                          </div>
                                        </div>
                                      </div>                           
                                    @endforeach
                                  @endif
                                </a>

                                @if (auth()->user()->role == 'admin')
                                    <div class="d-flex flex-column justify-content-center align-items-center" style="width: 100%;height:80%">
                                      <img src="{{ asset('img/empty_blog.svg') }}" alt="" style="width: 30%">
                                      <a href="{{ route('buat_blog') }}">
                                        <button class="btn btn-secondary border-0 mt-4">
                                          Tambah Artikel Blog
                                        </button>
                                      </a>
                                    </div>
                                @endif
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    @if (auth()->user()->role == 'admin')
                    <div class="row" id="users">
                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card alert-success card-rounded border border-success text-success">
                              <div class="card-body d-flex justify-content-between align-items-center">
                                <h4>
                                  <strong>Total Trainer</strong>
                                </h4>
                                <h4>{{ number_format($trainer, 0, ',', '.') }}</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded alert-danger" style="border: 1px solid orangered; color: orangered">
                              <div class="card-body d-flex justify-content-between align-items-center">
                                <h4>
                                  <strong>Total Bloger</strong>
                                </h4>
                                <h4>{{ number_format($bloger, 0, ',', '.') }}</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-4 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded border border-info alert-info">
                              <div class="card-body d-flex justify-content-between align-items-center">
                                <h4>
                                  <strong>Total Student</strong>
                                </h4>
                                <h4>{{ number_format($student, 0, ',', '.') }}</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                    
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">
                                      @if (auth()->user()->role == 'student')
                                        History Transaksi
                                      @elseif(auth()->user()->role == 'admin')
                                        Users Mentorskill
                                      @endif 
                                    </h4>
                                   <p class="card-subtitle card-subtitle-dash">
                                    @if (auth()->user()->role == 'student')
                                    History aktifitas pemesanan kelas kamu! 🚀
                                    @elseif(auth()->user()->role == 'admin')
                                    Total user : <span class="bg-primary text-light px-3 py-1" style="border-radius: 20px">{{ number_format($total_user, 0, ',', '.') }}</span> 
                                    @endif
                                   </p>
                                  </div>
                                  <div>
                                </div>
                                </div>

                                <div class="d-sm-flex mt-4 align-items-center justify-content-between">
                                  <div class="table-responsive" style="width: 100%"> 
                                  
                                    @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                      <strong>{{ session('success') }}</strong>.
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                  @endif

                                    @if (session()->has('warning'))
                                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>{{ session('warning') }}</strong>.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                    @endif

                                    @if (session()->has('danger'))
                                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ session('danger') }}</strong>.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                      </div>
                                    @endif
                                  
                                    <table id="historyTransaksi" class="table">
                                      <thead>
                                        <tr>
                                          <th>#</th>
                                            @if (auth()->user()->role == 'student')
                                              <th>Nama Kelas</th>    
                                              <th>Kategori</th>
                                              <th>Status</th>
                                              <th>Hari Pembelian</th>
                                            @elseif(auth()->user()->role == 'admin')
                                              <th>Username</th>
                                              <th class="text-center">Surel</th>  
                                              <th class="text-center">Role</th>  
                                              <th class="text-center">Handle</th>  
                                            @endif
                                        </tr>
                                      </thead>

                                      @php
                                          $no = 1;
                                      @endphp

                                      <tbody>
                                        @if (auth()->user()->role == 'admin')
                                          @foreach ($users as $item)
                                            @if ($item->status == 'nonaktif')
                                            <tr class="table-warning" title="nonaktif">
                                            @elseif($item->username == auth()->user()->username && $item->id == auth()->user()->id)
                                            <tr class="table-success" title="This is your account">
                                              @else
                                              <tr class="table-primary" title="Aktif">
                                            @endif
                                              <td>{{ $no++ }}</td>
                                              <td>
                                                <div class="d-flex align-items-center">
                                                  <img src="{{ asset('img/profils/'.$item->profil) }}" class="rounded-circle mx-2" alt="{{ $item->profil }}" style="width: 50px; height: 50px; border: 1.3px solid blue">
                                                  {{ $item->username }} @if($item->role == 'admin') <span class="mx-1 text-success mb-0"><i class="mdi mdi-check-circle"></i></span> @endif
                                                </div>
                                              </td>
                                              <td>{{ $item->email }}</td>

                                              <td>
                                                @if ($item->role == 'admin')
                                                 <span class="px-3 text-center text-light" style="border-radius: 10px; background: linear-gradient(45deg, red, blue)">Admin</span></td>
                                                @elseif($item->role == 'trainer')
                                                  <span class="px-3 text-center bg-info" style="border-radius: 10px">Trainer</span></td>
                                                @elseif($item->role == 'bloger')
                                                  <span class="px-3 text-center text-light" style="border-radius: 10px; background: purple">Bloger</span></td>
                                                @else
                                                <span class="px-3 text-center bg-success text-light" style="border-radius: 10px">Student</span></td>
                                                @endif
                                              </td>

                                              <td>
                                                @if (auth()->user()->username == $item->username && auth()->user()->id == $item->id)
                                                  <p class="text-center">
                                                    <em>Disabled, 'cause your account!</em>
                                                  </p>
                                                @else
                                                  @if ($item->status == 'nonaktif')
                                                  <a class="btn btn-success text-light mb-0" data-bs-toggle="modal" data-bs-target="{{ '#aktif'.$item->id }}">Aktifkan</a>
                                                  @elseif($item->status == 'aktif')
                                                  <a class="btn btn-warning mb-0" data-bs-toggle="modal" data-bs-target="{{ '#nonaktif'.$item->id }}">Nonaktifkan</a>
                                                  @endif
                                                  <a class="btn btn-danger text-light mb-0" data-bs-toggle="modal" data-bs-target="{{ '#hapus'.$item->id }}">Hapus Permanen</a>
                                                @endif
                                              </td>
                                            </tr>  
                                            
                                            <!-- Nonaktif -->
                                            <div class="modal fade" id="{{ 'nonaktif'.$item->id }}" tabindex="-1" aria-labelledby="{{ 'nonaktif'.$item->id.'Label' }}" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-body">
                                                    <h3 class="text-warning">
                                                      <strong>Perhatian!</strong>
                                                    </h3>
                                                    <hr>
                                                    <h4>Anda yakin menonaktifkan akun dengan username <strong>{{ $item->username . ' ' . '('.$item->role .')'}}?</strong></h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <div class="d-flex justify-content-center align-items-center">

                                                      <button type="button" class="btn btn-primary text-light" data-bs-dismiss="modal">Tidak</button>
                                          
                                                      <form action="{{ url('/nonaktif_user/'.$item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-secondary border-0">Ya</button>
                                                      </form>
                                                    
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            
                                            <!-- Delete -->
                                            <div class="modal fade" id="{{ 'hapus'.$item->id }}" tabindex="-1" aria-labelledby="{{ 'hapus'.$item->id.'Label' }}" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-body">
                                                    <h3 class="text-danger">
                                                      <strong>Perhatian!</strong>
                                                    </h3>
                                                    <hr>
                                                    <h4>Anda yakin menghapus permanen akun dengan username <strong>{{ $item->username . ' ' . '('.$item->role .')'}}?</strong></h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <div class="d-flex justify-content-center align-items-center">

                                                      <button type="button" class="btn btn-primary text-light" data-bs-dismiss="modal">Tidak</button>
                                                      
                                                      <a href="{{ url('/del_user/'.$item->id) }}">
                                                        <button type="button" class="btn btn-secondary border-0">Ya</button>
                                                      </a>
                                                    
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                           
                                            <!-- Aktif -->
                                            <div class="modal fade" id="{{ 'aktif'.$item->id }}" tabindex="-1" aria-labelledby="{{ 'aktif'.$item->id.'Label' }}" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-body">
                                                    <h3 class="text-success">
                                                      <strong>Perhatian!</strong>
                                                    </h3>
                                                    <hr>
                                                    <h4>Anda yakin mengaktifkan kembali akuden dengan username <strong>{{ $item->username . ' ' . '('.$item->role .')'}}?</strong></h4>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <div class="d-flex justify-content-center align-items-center">

                                                      <button type="button" class="btn btn-primary text-light" data-bs-dismiss="modal">Tidak</button>
                                                      
                                                      <form action="{{ url('/aktif_user/'.$item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-secondary border-0">Ya</button>
                                                      </form>
                                                    
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          @endforeach
                                        @endif

                                        {{-- <tr>
                                          <td>{{ $no++ }}</td>
                                          <td>
                                            @if (auth()->user()->role == 'student')
                                                dummy
                                            @elseif(auth()->user()->role == 'admin')
                                              {{ $siswa }}
                                            @endif
                                          </td>
                                          <td>Programming</td>
                                          <td><span class="px-3 text-center bg-success text-light" style="border-radius: 10px">Aktif</span></td>
                                          <td>Minggu</td>
                                        </tr> --}}
                                        
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

                    {{-- banner --}}
                    <div class="container-fluid p-1">
                      <div class="row">
                        <div class="owl-carousel owl-theme">
                          <div class="item">
                              <img src="{{ asset('img/banner/2.png') }}" alt="" width="100%">
                          </div>
                          <div class="item">
                              <img src="{{ asset('img/banner/1.png') }}" alt="" width="100%">
                          </div>
                          <div class="item">
                              <img src="{{ asset('img/banner/3.png') }}" alt="" width="100%">
                          </div>
                          <div class="item">
                              <img src="{{ asset('img/banner/4.png') }}" alt="" width="100%">
                          </div>
                          <div class="item">
                              <img src="{{ asset('img/banner/5.png') }}" alt="" width="100%">
                          </div>
                          <div class="item">
                              <img src="{{ asset('img/banner/6.png') }}" alt="" width="100%">
                          </div>
                          <div class="item">
                              <img src="{{ asset('img/banner/7.png') }}" alt="" width="100%">
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
