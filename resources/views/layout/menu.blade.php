@extends('template.template')
@section('content')
    <!-- ======= Breadcrumbs ======= -->
    {{-- <div class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Sample Inner Page cv</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>Sample Inner Page</li>
                </ol>
            </div>
        </div>
    </div> --}}
    <!-- End Breadcrumbs -->

    <section class="menu" id="menu">
        <div class="container" data-aos="fade-up">
            <div class="p-3 p-md-4">
                {{-- PESAN --}}
                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong><i class="bi bi-check2-all"></i>&nbsp;{{ session('pesan') }}.</strong>
                    </div>
                @endif
            </div>
            <div class="section-header p-3 p-md-4">
                <h2>Our Menu</h2>
            </div>
            <a href="{{ route('menu.create') }}" class="btn btn-danger btn-sm">Tambah Menu</a>
            <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <li class="nav-item">
                    <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-starters">
                        <h4>Makanan</h4>
                    </a>
                </li><!-- End tab nav item -->
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-breakfast">
                        <h4>Minuman</h4>
                    </a><!-- End tab nav item -->
            </ul>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                <div class="tab-pane fade active show" id="menu-starters">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>Makanan</h3>
                    </div>

                    <div class="row gy-5">
                        @foreach ($menu as $item)
                            <div class="col-lg-4 menu-item">
                                <a href="{{ url('picture/' . $item->gambar) }}" class="glightbox">
                                    <img src="{{ url('picture/' . $item->gambar) }}" class="menu-img img-fluid"
                                        alt=""></a>
                                <form action="{{ route('menu.destroy', $item->id_menu) }}" method="post">
                                    <a href="{{ route('menu.edit', $item->id_menu) }}" class="btn btn-warning"><i
                                            class="bi bi-pencil-square"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                </form>
                                <h4>{{ $item->nama_makanan }}</h4>
                                <p class="ingredients">
                                    {{ $item->keterangan }}
                                </p>
                                <p class="price">
                                    Rp. {{ $item->harga }}
                                </p>
                            </div><!-- Menu Item -->
                        @endforeach
                    </div>
                </div><!-- End Starter Menu Content -->

                <div class="tab-pane fade" id="menu-breakfast">

                    <div class="tab-header text-center">
                        <p>Menu</p>
                        <h3>Minuman</h3>
                    </div>

                    <div class="row gy-5">

                        @foreach ($menuMinuman as $item)
                            <div class="col-lg-4 menu-item">
                                <a href="{{ url('picture/' . $item->gambar) }}" class="glightbox">
                                    <img src="{{ url('picture/' . $item->gambar) }}" class="menu-img img-fluid"
                                        alt=""></a>
                                <form action="{{ route('menu.destroy', $item->id_menu) }}" method="post">
                                    <a href="{{ route('menu.edit', $item->id_menu) }}" class="btn btn-warning"><i
                                            class="bi bi-pencil-square"></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                </form>
                                <h4>{{ $item->nama_makanan }}</h4>
                                <p class="ingredients">
                                    {{ $item->keterangan }}
                                </p>
                                <p class="price">
                                    Rp. {{ $item->harga }}
                                </p>
                            </div><!-- Menu Item -->
                        @endforeach

                    </div>
                </div><!-- End Starter Menu Content -->

            </div>
        </div>
    </section>
@endsection
