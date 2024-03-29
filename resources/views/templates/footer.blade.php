<footer class="container-fluid bottom-0" style="margin-top: @if($title == 'Login') 3em; @elseif($title == 'Student' && auth()->user() == false) 8em; @elseif($title == 'Mentor') 10em @endif @if(auth()->user() == true && $title == 'Student') 0; @endif">
        <div class="row bg-dark py-5 text-light d-flex justify-content-evenly">
            <div class="col-lg-3 col-md-12 col-sm-12">
                <img src="{{ asset('img/mentorskil logo2.png') }}" height="65" alt="Mentorskill Logo" class="mb-3" style="@if($title=='Blog Templates') width:80% @endif">
                <h4>PT Hafara Aqiba Nusantara</h4>
                <p>Jl. Cibolerang, Cinunuk, Cileunyi, Kota Bandung, Jawa Barat 40614</p>
            </div>

            <div class="col-lg-2 col-sm-12 col-md-12 my-2">
                <h4>Layanan</h4>
                <a href="{{ url('/home-semua-kelas') }}">
                    <p class="mb-0 text-light">Kelas Online</p>
                </a>
                <a href="{{ url('/home-magang') }}">
                    <p class="mb-0 text-light">Magang</p>
                </a>
                <p class="mb-0">Training Perusahaan</p>
                <p class="mb-0">Pengembangan Karir</p>
            </div>

            <div class="col-lg-2 col-sm-12 col-md-12 my-2">
                <h4>Kerja Sama</h4>
                <p class="mb-0">Info Kolaborasi</p>
                <p class="mb-0">Perusahaan/BUMN</p>
                <p class="mb-0">Unit Pemerintah</p>
                <p class="mb-0">Unit Pendidikan</p>
                <p class="mb-0">Unit Organisasi</p>
            </div>
                
            <div class="col-lg-2 col-sm-12 col-md-12 my-2">
                <h4>Support</h4>
                <p class="mb-0">FAQ</p>
                <p class="mb-0">Hubungi Kami</p>
             </div>

            </div>
        </div>

        <div class="row bg-dark text-light">
            <div class="col-12 d-flex justify-content-center align-items-center" style="height: 10vh">
                @php
                    date_default_timezone_set('Asia/Jakarta');
                    $date = date('Y');
                @endphp
                <p class="pt-3" style="font-size: 18px; font-weight: bold">&copy; {{ $date }} MentorSkill.ID</p>
        </div>
        </div>
    </footer>
    
    {{-- script API AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({once: true});
    </script>

    {{-- script API feather-icons --}}
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()
    </script>

    {{-- script splash screen --}}
    <script src="{{ asset('js/splash.js') }}"></script>

    {{-- script API bootstrap 5 --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if ($title == 'Home')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })
    </script>
    @endif
</body>
</html>