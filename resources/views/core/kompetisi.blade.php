@include('templates.header-core')
<div class="container-scroller">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('templates.sidebar-core')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            @include('templates.shortcut-core')
            <div class="row d-flex mt-3 p-2 align-items-center" style="gap: 40px; overflow-x: auto">
                <div class="card col-lg-3 p-2">
                  <img src="{{ asset('img/magang/management business.png') }}" style="width: 100%" alt="">
                  <h4 class="my-3" style="font-weight: bold">Quiz : Business Plan</h4>
                  <button class="btn btn-info mb-0">Ikuti Kompetisi</button>
                </div>
            </div>
        </div>
@include('templates.footer-core')