@extends('template.template')
@section('content')
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <form action="{{ route('menu.update',$menu->id_menu) }}" method="POST" role="form" class="p-3 p-md-4">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_makanan"><strong>Nama Makanan</strong></label>
                    <input type="text" class="form-control" name="nama_makanan" id="nama_makanan" value="{{$menu->nama_makanan}}">
                </div>
                <div class="form-group">
                    <label for="jenis_makanan"><strong>Jenis Makanan</strong></label>
                    <select name="jenis_makanan" id="jenis_makanan" class="form-select">
                        <option value="{{$menu->jenis_makanan}}">{{$menu->jenis_makanan}}</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar"><strong>Gambar</strong></label>
                    <input type="text" class="form-control" name="gambar" id="gambar" value="{{$menu->gambar}}">
                </div>
                <div class="form-group">
                    <label for="harga"><strong>Harga</strong></label>
                    <input type="text" class="form-control" name="harga" id="harga" value="{{$menu->harga}}">
                </div>
                <div class="form-group">
                    <label for="keterangan"><strong>Keterangan</strong></label>
                    <textarea class="form-control" name="keterangan" rows="5" id="keterangan">{{$menu->keterangan}}</textarea>
                </div>
                {{-- <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div> --}}
                <div class="text-center">
                    <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
