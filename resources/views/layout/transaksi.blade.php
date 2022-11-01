@extends('template.template')
@section('content')
    <section id="contact" class="contact">
        <div class="container " data-aos="fade-up">
            <h1>Transaksi</h1>
            <div class="p-3 p-md-4">
                {{-- PESAN --}}
                @if (session('pesan'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong><i class="bi bi-check2-all"></i>&nbsp;{{ session('pesan') }}.</strong>
                    </div>
                @endif
            </div>
            <form action="" method="post">
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
                    <textarea class="form-control" name="pesanan" rows="5" placeholder="pesanan" id="pesanan"
                    style="text-align: left">
                        @if (session('cart'))
                        @foreach (session('cart') as $id_menu => $details)
                            {{$details['quantity']}}x {{ $details['nama_makanan'] }} = Rp.{{ $details['harga'] }}
                        @endforeach
                    @endif
                    </textarea>
                </div>
            </form>
        </div>
    </section>
@endsection
