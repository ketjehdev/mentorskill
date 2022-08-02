@include('templates.header')
    <div class="container-fluid bg-light px-4 py-5">
        <div class="row justify-content-center" style="position: relative; top: 3em">
            <div class="col-lg-8 card col-md-12 col-sm-12 p-1" style="background:#fff; border-radius: 8px;">
                <div class="card-header" style="background: transparent">
                    <h1>
                        <strong>
                            {{ $data->judul }}
                        </strong>
                    </h1>
                    <span class="alert-info text-dark px-3" style="border-radius: 10px">{{ $data->username }}</span> 
                    <span class="alert-success text-success px-3" style="border-radius: 10px">{{ $data->kategori }}</span> 
                    @php
                        date_default_timezone_set('Asia/Jakarta');
                        $date = date('D, d M Y', strtotime($data->created_at));
                        $time = date('h:i', strtotime($data->created_at));
                    @endphp
                    <p class="my-0 text-secondary">Diposting : {{ $date . ',' . ' ' . $time }}</p>
                </div>
                
                <div class="card-body">
                    
                <img src="{{ asset('storage/uploads/'.$data->gambar) }}" style="width: 100%; margin-right: 10px" alt="">
                @php
                    @header('Content-type: text/html; charset=utf-8');
                    echo $data->deskripsi;
                @endphp
                </div>
            </div>
        </div>
    </div>

@include('templates.footer')