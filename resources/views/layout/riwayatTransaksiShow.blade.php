@extends('template.template')
@section('content')
    <section id="contact" class="contact">
        <div class="container p-3 p-md-4" data-aos="fade-up">
            <div class="form-group">
                <label><strong>Tanggal Transaksi :</strong>&emsp;{{ $transaksi->tanggal_transaksi }}</label>
            </div>
            <div class="form-group">
                <label><strong>Pesanan :</strong>&emsp;{{ $transaksi->pesanan }}</label>
            </div>
            <div class="form-group">
                <label><strong>Tagihan :</strong>&emsp;{{ $transaksi->tagihan }}</label>
            </div>
            <div class="form-group">
                <label><strong>Status Pembayaran:</strong>&emsp;@if ($transaksi->status_pembayaran == 1)
                        <button class="btn btn-warning">Proses</button>
                    @else
                        <button class="btn btn-success">Diterima</button>
                    @endif
                </label>
            </div>
            <div class="text-center">
                <a href="{{ route('riwayat-transaksi.index') }}" class="btn btn-danger btn-sm">Kembali</a>
            </div>
        </div>
    </section>
@endsection
