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
                    <h2 data-aos="fade-up">IKAPEMA FEST</h2>
                    <p data-aos="fade-up" data-aos-delay="100"></p>
                    <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                        @if (auth()->user()->level == 1)
                            <a href="{{ route('dashboard') }}" class="btn-book-a-table">Menuju Page Admin</a>
                        @elseif (auth()->user()->level == 2)
                            <a href="{{ route('menu.index') }}" class="btn-book-a-table">LIHAT INFORMASI KONSER</a>
                        @endif
                        {{-- <a href="" class="glightbox btn-watch-video d-flex align-items-center">Order Makanan</a> --}}
                        {{-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> --}}
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="{{ asset('template') }}/assets/img/sound.png" class="img-fluid" alt=""
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
                    style="background-image: url({{ asset('picture') }}/sod.jpg) ;" data-aos="fade-up"
                    data-aos-delay="150">
                </div>
                <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            Info Konser Musik Indonesia merupakan sebuah Media Partner yang bekerja sama dengan Event Organizer atau biasa disebut
                            juga dengan penyelenggara acara, dimana buat kalian yang ingin membeli tiket konser musik, bisa melalui website ini atau
                            juga yang sekedar ingin melihat inforasi mengenai konser yang ada, bisa juga melalui website kami.
                        </p>
                        <h5>Kritik & Ulasan :</h5>
                        <ul>
                            <li><i class="bi bi-check2-all"></i><strong>Baskara Fahami Jiwa</strong>
                                Pelayanan super cepat, sangat bagus buat saya sebagai penikmat konser musik, sangat terbantu dalam melakukan transaksi disini :D.
                            </li>
                            <li><i class="bi bi-check2-all"></i><strong>Irvan Arjuna</strong>
                                Sering banget mesan tiket konser disini tambah okeeee beutz tadi dapat bonus promo lagi keren euyy … tx buat info koner musik indonesia.
                            </li>
                            <li><i class="bi bi-check2-all"></i> <strong>Aurellia Sabrina Taufik</strong>
                                untung ada tempat yg menampung segala kebutuhan penikmat konser musik seperti saya jadi gaa perlu ribet ngechat sana sini wkwkwkk</li>
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
