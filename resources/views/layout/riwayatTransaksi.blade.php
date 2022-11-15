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
            <table class="table table-hover">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal Pesanan</th>
                    <th scope="col">Kategori Pembayaran</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($transaksi as $item)
                    @if ($item->id == Auth::user()->id)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->tanggal_transaksi }}</td>
                        <td>
                            @if ($item->kategori_pembayaran == 1)
                                Tunai
                            @else
                                Non-tunai
                            @endif
                        </td>
                        <td>
                            @if ($item->status_pembayaran == 1)
                                <button class="btn btn-warning">Sedang diProses</button>
                            @else
                                <button class="btn btn-success">Diterima</button>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('riwayat-transaksi.show',$item->id_transaksi) }}" class="btn btn-outline-info">Detail</a>
                        </td>
                    </tr>
                @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection
