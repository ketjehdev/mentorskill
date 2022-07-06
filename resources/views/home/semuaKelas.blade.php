@include('templates.header')
<div class="container-fluid p-5" style="position: relative; top: 2em;">
    <div class="row d-flex mt-3 p-2 align-items-center" style="gap: 50px;">
        <div class="row d-flex mt-3 p-2 align-items-center" style="gap: 40px; overflow-x: auto">
            @foreach ($list_semua_kelas as $item)
            <div class="card col-lg-3 p-2" style="overflow: auto;">
              <img src="{{ asset('img/magang/'.$item->gambar) }}" style="width: 100%" alt="">
              <h4 class="my-3" style="font-weight: bold">{{ $item->nama_kelas }}</h4>
              <div class="d-flex mb-2 justify-content-between" style="border-bottom: 1px solid #aaa">
                <p style="font-size: 14px">
                  <i class="text-warning mdi mdi-star"></i>
                  dummy
                </p>
                <span class="text-success">Rp. {{ number_format($item->harga, 0, ',', '.') }}</span>
              </div>
              <button class="btn btn-primary mb-0">Beli Kelas</button>
            </div>
            @endforeach
        </div>
    </div>
</div>
@include('templates.footer')