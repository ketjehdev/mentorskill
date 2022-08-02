@include('templates.header-core')
<div class="container-scroller">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('templates.sidebar-core')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @include('templates.shortcut-core')
            <div class="row mt-3    ">
                <div class="card col-12" style="border-top: 4px solid navy">
                    <form action="/posting_blog" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header" style="background: transparent; @error('judul') border-bottom: 1px solid red; @enderror">
                        <input type="text" placeholder="Judul Besar Blog" class="form-control" name="judul" value="{{ old('judul') }}" id="judul" style="border:0;font-size: 20px; font-weight: bold">
                    </div>
                    @error('judul')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

                    <div class="card-body p-3">

                            {{-- <label for="gambar">Gambar:</label>
                            <input type="file" name="gambar" class="form-control border border-primary" id="gambar">
                        
                            <br> --}}
                            <label for="summary-ckeditor">Deskripsi:</label>
                            <textarea class="form-control" name="deskripsi" id="summary-ckeditor">{{ old('deskripsi') }}</textarea>
                            {{-- <p class="counter">Characters: 40</p> --}}
                            @error('deskripsi')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <br>

                            <label for="browser">Kategori:</label>
                            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror" id="kategori">
                                <option value="">Pilih Kategori</option>
                                <option value="Olahraga" @if(old('kategori') == 'Olahraga') {{ 'selected' }} @endif>Olahraga</option>
                                <option value="Pendidikan" @if(old('kategori') == 'Pendidikan') {{ 'selected' }} @endif>Pendidikan</option>
                                <option value="Kuliner" @if(old('kategori') == 'Kuliner') {{ 'selected' }} @endif>Kuliner</option>
                                <option value="Religi" @if(old('kategori') == 'Religi') {{ 'selected' }} @endif>Religi</option>
                                <option value="Politik" @if(old('kategori') == 'Politik') {{ 'selected' }} @endif>Politik</option>
                                <option value="Jasa" @if(old('kategori') == 'Jasa') {{ 'selected' }} @endif>Jasa</option>
                                <option value="Produk Barang" @if(old('kategori') == 'Produk Barang') {{ 'selected' }} @endif>Produk Barang</option>
                                <option value="Pariwisata" @if(old('kategori') == 'Pariwisata') {{ 'selected' }} @endif>Pariwisata</option>
                                <option value="Lainnya" @if(old('kategori') == 'Lainnya') {{ 'selected' }} @endif>Lainnya</option>
                            </select>

                            <br>
                        
                    </div>

                        <div class="card-footer mb-3" style="background: transparent">
                            <button class="btn btn-warning" type="submit">Posting</button>
                            <button class="btn btn-secondary">Preview</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
          

@include('templates.footer-core')