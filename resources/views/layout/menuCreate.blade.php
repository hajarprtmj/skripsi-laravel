@extends('template.template')
@section('content')
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <form action="{{ route('menu.store') }}" method="POST" role="form" class="p-3 p-md-4"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="nama_makanan"><strong>Nama Makanan</strong></label>
                    <input type="text" class="form-control" name="nama_makanan" id="nama_makanan"
                        placeholder="Nama Makanan">
                    @error('nama_makanan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis_makanan"><strong>Jenis Makanan</strong></label>
                    <select name="jenis_makanan" id="jenis_makanan" class="form-select">
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga"><strong>Harga</strong></label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga Makanan">
                    @error('harga')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="keterangan"><strong>Keterangan</strong></label>
                    <textarea class="form-control" name="keterangan" rows="5" placeholder="Keterangan" id="keterangan"></textarea>
                    @error('keterangan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gambar"><strong>Gambar</strong></label>
                    <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*"
                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                    @error('gambar')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-3"><img src="" id="output" alt="" width="250"></div>
                <div class="text-center">
                    <button type="submit" class="btn btn-danger btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
