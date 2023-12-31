@extends('template-admin.template')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Transaksi</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-md-6 col-4 align-self-center">
                    <div class="text-end upgrade-btn">
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label><strong>Nama :</strong>&emsp;{{ $transaksi->name }}</label>
                            </div>
                            <div class="form-group">
                                <label><strong>Nomer Meja :</strong>&emsp;{{ $transaksi->no_meja }}</label>
                            </div>
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
                                <label><strong>Kategori Pembayaran :</strong>&emsp;@if ($transaksi->kategori_pembayaran == 1)
                                        Tunai
                                    @else
                                        Non-tunai
                                    @endif
                                </label>
                            </div>
                            @if ($transaksi->kategori_pembayaran == 2)
                                <div class="form-group">
                                    <label><strong>Status payment :</strong>&emsp;{{ $transaksi->status }}
                                        {{-- <div class="mt-3">
                                            <a href="{{ url('foto_transaksi/' . $transaksi->foto_pembayaran) }}"
                                                class="glightbox">
                                                <img src="{{ url('foto_transaksi/' . $transaksi->foto_pembayaran) }}"
                                                    class="card-img-fluid" alt="" width="250" height="350">
                                            </a>
                                        </div> --}}
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label><strong>Payment type :</strong>&emsp;{{ $transaksi->payment_type }}</label>
                                </div>
                            @endif
                            {{-- <div class="form-group">
                                <label><strong>Status Pembayaran:</strong>&emsp;@if ($transaksi->status_pembayaran == 1)
                                        Sedang Diproses
                                    @elseif ($transaksi->status_pembayaran == 2)
                                        Diterima
                                    @elseif ($transaksi->status_pembayaran == 3)
                                        Ditolak
                                    @endif
                                </label>
                            </div> --}}
                            @if ($transaksi->status == 3)
                                <label><strong>Keterangan :</strong>&emsp;{{ $transaksi->keterangan }}</label>
                            @endif
                            <hr>
                            <div class="form-group">
                                <form action="{{ route('admin-transaksi.update', $transaksi->id_transaksi) }}"
                                    method="POST" role="form">
                                    @csrf
                                    @method('PUT')
                                    <input type="radio" class="form-check-input" id="status"
                                        name="status" value="pending" checked>pending
                                    <label class="form-check-label" for="status"></label>
                                    <input type="radio" class="form-check-input" id="status"
                                        name="status" value="settlement">settlement
                                    <label class="form-check-label" for="status"></label>
                                    <input type="radio" class="form-check-input" id="status"
                                        name="status" value="ditolak">Ditolak
                                    <label class="form-check-label" for="status"></label>
                                    <div class=" form-group m-10" style="width: 30%">
                                        <label for="keterangan"><strong>Keterangan</strong></label>
                                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-sm">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('admin-transaksi.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2022 NK KAFE
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
@endsection
