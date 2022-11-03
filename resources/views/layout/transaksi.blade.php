@extends('template.template')
@section('content')
    <section id="contact" class="contact">
        <div class="container " data-aos="fade-up">
            <div class="p-3 p-md-4">
                {{-- PESAN --}}
                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong><i class="bi bi-check2-all"></i>&nbsp;{{ session('pesan') }}.</strong>
                    </div>
                @endif
            </div>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('menu.index') }}">Menu</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cart') }}">Cart</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Transkasi</li>
                    </ol>
                </nav>
                <div class="tab-pane fade active show" id="menu-starters">
                    <div class="tab-header text-center">
                        <h3><strong>Transaksi</strong></h3>
                        <br><br>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Silahkan Tranfer ke nomer rekening dibawah ini sebagai bukti pembayaran :</p>
                        <ul>
                            <li><strong>BRI : 7632-01-007520-53-0</strong></li>
                            <li><strong>BCA : 7632-01-007520-53-0</strong></li>
                            <li><strong>BNI : 7632-01-007520-53-0</strong></li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ route('add.transaksi') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="id"><strong>Nama</strong></label>
                                <select name="id" id="id" class="form-select">
                                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_meja"><strong>Nomer Meja</strong></label>
                                <select name="id_meja" id="id_meja" class="form-select">
                                    @foreach ($meja as $item)
                                        <option value="{{ $item->id_meja }}">{{ $item->no_meja }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pesanan"><strong>Pesanan</strong></label>
                                <ul>
                                    @php $total = 0 @endphp
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id_menu => $details)
                                            @php $total += $details['harga'] * $details['quantity'] @endphp
                                            <li>{{ $details['quantity'] }}x {{ $details['nama_makanan'] }}</li>
                                        @endforeach
                                    @else
                                        <li><strong>Pesanan Kosong</strong></li>
                                    @endif
                                </ul>
                                <textarea name="pesanan" rows="6" cols="75" id="pesanan" hidden>
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id_menu => $details)
                                            {{ $details['quantity'] }}x {{ $details['nama_makanan'] }} = Rp.{{ $details['harga'] }}
                                        @endforeach
                                    @endif
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="tagihan"><strong>Total Tagihan :</strong> Rp.{{ $total }}</label>
                                <input type="hidden" class="form-control" name="tagihan" value="{{ $total }}">
                            </div>
                            <div class="form-group">
                                <label for="foto_pembayaran"><strong>Upload foto bukti transfer</strong></label>
                                <input type="file" class="form-control" name="foto_pembayaran" id="foto_pembayaran" accept="image/*"
                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                @error('foto_pembayaran')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3"><img src="" id="output" alt="" width="250"></div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
