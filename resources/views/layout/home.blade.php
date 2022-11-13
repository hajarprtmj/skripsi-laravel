@extends('template.template')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    {{-- <div class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Sample Inner Page</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Sample Inner Page</li>
                </ol>
            </div>
        </div>
    </div> --}}
    <!-- End Breadcrumbs -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2 data-aos="fade-up">CAFE & RESTO</h2>
                    <p data-aos="fade-up" data-aos-delay="100">Tempat nongkrong nyaman dan ramah di kantong.</p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        @if (auth()->user()->level == 1)
                            <a href="{{ route('dashboard') }}" class="btn-book-a-table">Menuju Page Admin</a>
                        @elseif (auth()->user()->level == 2)
                            <a href="{{ route('menu.index') }}" class="btn-book-a-table">Order Makanan</a>
                        @endif
                        {{-- <a href="" class="glightbox btn-watch-video d-flex align-items-center">Order Makanan</a> --}}
                        {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="{{ asset('template') }}/assets/img/hero-img.png" class="img-fluid" alt=""
                        data-aos="zoom-out" data-aos-delay="300">
                </div>
            </div>
        </div>
    </section><!-- End Hero Section -->

    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>About Us</h2>
                <p>Learn More <span>About Us</span></p>
            </div>

            <div class="row gy-4">
                <div class="col-lg-7 position-relative about-img"
                    style="background-image: url({{ asset('picture') }}/home.png) ;" data-aos="fade-up"
                    data-aos-delay="150">
                </div>
                <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            NK merupakan singkatan dari Nendes Kombet atau jika dibalik bacanya menjadi Senden Tembok. Bisa
                            diartikan bersandar di dinding untuk sementara waktu, santai menikmati hidup. Itulah konsep unik
                            yang dibawa oleh owner NK Cafe. Beliau menginginkan setiap pengunjung yang datang benar-benar
                            rilek menikmati menu yang dihidangkan sekaligus suasana di sekitar Cafe.
                        </p>
                        <h5>Ulasan Local Guide</h5>
                        <ul>
                            <li><i class="bi bi-check2-all"></i><strong>Agdhy Families</strong>
                                Tempatnya nyaman dan bersih. Pelayanan cepat. Makananya lumayan enak. Enak bgt bwt nongkrong karna tempatnya luas jd bs bawa banyak keluarga/temen
                            </li>
                            <li><i class="bi bi-check2-all"></i><strong>Theresia Lonika</strong>
                                Sering banget kesini tambah okeeee beutz tadi dapat bonus sawi keren euyy … tx buat staf yg mau bantuin kami baik … sukses NK and teams
                            </li>
                            <li><i class="bi bi-check2-all"></i> <strong>Maulana Chairudin</strong>
                                Tempat yg bagus buat resfresh dan instagramable, makanan lumayan, rame banget kl pas hari libur, NK singkatan dari Nendes Kombet yaitu boso walikan khas kota Malang atau bahasa yg di balik yg berarti Senden Tembok atau Sandar Tembok 😊</li>
                        </ul>
                        {{-- <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                            in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident
                        </p> --}}

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
