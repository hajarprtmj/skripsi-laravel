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
                            {{-- filter data --}}
                            <form class="row row-cols-lg-auto g-1">
                                <div class=" col">
                                    <div class="input-group">
                                        <input class="form-control" type="date" name="start"
                                            value="{{ $start }}" />
                                        <input class="form-control" type="date" name="end"
                                            value="{{ $end }}" />
                                    </div>
                                </div>
                                <div class="col">
                                    <button class="btn btn-success">Search</button>
                                    <a href="{{ route('admin-transaksi.index') }}" class="btn btn-warning">Refresh
                                        Filter</a>
                                </div>
                            </form>

                            <h4 class="card-title">Table Pendapatan</h4>
                            <div class="table-responsive">
                                <table class="table user-table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Nama</th>
                                            <th class="border-top-0">Tanggal</th>
                                            <th class="border-top-0">Jenis Pembayaran</th>
                                            <th class="border-top-0">Pendapatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @php $total = 0 @endphp
                                        @foreach ($transaksi as $item)
                                        @php $total += $item['tagihan'] @endphp
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->tanggal_transaksi }}</td>
                                                @if ($item->kategori_pembayaran == 1)
                                                    <td>Tunai</td>
                                                @elseif ($item->kategori_pembayaran == 2)
                                                    <td>Non-tunai</td>
                                                @endif
                                                <td>Rp. {{$item->tagihan}}</td>
                                            </tr>
                                        @endforeach
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Total = </td>
                                        <td>Rp. {{ $total }}</td>
                                    </tbody>
                                </table>
                            </div>
                            @if ($transaksi->hasPages())
                                <div class="card-footer">
                                    {{ $transaksi->links() }}
                                </div>
                            @endif
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endsection
