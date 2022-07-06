@include('templates.header-core')
<div class="container-scroller">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('templates.sidebar-core')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @include('templates.shortcut-core')
            <div class="row d-flex mt-3 p-2 align-items-center" style="gap: 20px;">
               
              @foreach ($sertifikat as $item)
                  
                <div class="col-lg-5 p-2 bg-light">
                  <img src="{{ asset('certificate/'.$item->credential) }}" style="width: 100%" alt="">
                  <h4 class="mt-3 mb-0">{{ $item->nama_pembelajaran }}</h4>
                  <h6 class="mt-2"><span class="px-2 bg-primary text-light" style="border-radius: 10px;">{{ $item->kategori }}</span></h6>
                  <h6 class="mt-1 mb-2">Mentor : {{ $item->mentor }}</h6>
                  <h6 class="mb-0">{{ $item->created_at }}</h6>
                  <button class="mt-3 btn btn-success" style="width: 100%">
                    Download Sertifikat
                  </button>
                </div>

              @endforeach
        
              </div>
        </div>
@include('templates.footer-core')