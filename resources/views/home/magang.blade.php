@include('templates.header')

    <div class="main" style="height: 70vh">
        <img src="{{ asset('img/bg.jpg') }}" class="bg" alt="">
    </div>

    {{-- main --}}    
    <div class="container-fluid p-5" style="position: relative; top: 2em;">

        <div class="row d-flex mt-3 p-2 justify-content-center" style="gap: 50px;">
            @foreach ($list_magang as $item)
             <div class="scale-hover col-lg-3 col-md-12 col-sm-12" style="background: #fff; border-radius: 5px; box-shadow: 0 1px 2px 0 rgba(0,0,0,0.08)">
               <img src="{{ asset('img/magang/'.$item->gambar) }}" style="width: 100%" alt="desain grafis" class="mt-2 mb-1">
               <h5 class="mt-2" style="font-weight: bold;">{{ $item->kategori }}</h5>
               <button class="btn btn-primary mt-1 mb-3" style="width: 100%" title="{{ $item->kategori }}">Daftar</button>
             </div>
            @endforeach
        </div>
    </div>
@include('templates.footer')