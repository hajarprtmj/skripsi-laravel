@extends('template-admin.template')
@section('content')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Dashboard</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-success card-header-icon">
                                            <p class="card-category"><i class="mdi  mdi-account"></i> Jumlah User</p>
                                            <h3 class="card-title">{{ DB::table('users')->count('id') }}
                                                <small>Users</small>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-stats">
                                        <div class="card-header card-header-success card-header-icon">
                                            <p class="card-category">Jumlah Transaksi</p>
                                            <h3 class="card-title">{{ DB::table('transaksi')->where('status','=','settlement')->count('id_transaksi') }}
                                                <small>Transaksi</small>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5>Statistik transaksi pembelian setiap bulan</h5>
                            <canvas id="myChart" height="100px"></canvas>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                            <script type="text/javascript">
                                var labels = {{ Js::from($labels) }};
                                var transaksi = {{ Js::from($data) }};

                                const data = {
                                    labels: labels,
                                    datasets: [{
                                        label: 'Pembelian',
                                        backgroundColor: 'rgb(255, 99, 132)',
                                        borderColor: 'rgb(255, 99, 132)',
                                        data: transaksi,
                                    }]
                                };

                                const config = {
                                    type: 'line',
                                    data: data,
                                    options: {}
                                };

                                // const myChart = new Chart(
                                //     document.getElementById('myChart'),
                                //     config
                                // );
                                var myChart = new Chart(
                                    document.getElementById('myChart'),
                                    config
                                );
                                //
                                // const datas = {
                                //     labels: labels2,
                                //     datasets: [{
                                //         label: 'Pembelian',
                                //         backgroundColor: 'rgb(255, 99, 132)',
                                //         borderColor: 'rgb(255, 99, 132)',
                                //         data: transaksi2,
                                //     }]
                                // };

                                // const configs = {
                                //     type: 'line',
                                //     data: datas,
                                //     options: {}
                                // };

                                // var myChart2 = new Chart(
                                //     document.getElementById('myChart2'),
                                //     configs
                                // );
                            </script>
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
    </div>
@endsection
