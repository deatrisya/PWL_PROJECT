@extends('layout.app')
@section('title')
Dashboard
@endsection
@section('content')

{{-- <div class="content-wrapper"> --}}
{{-- <div class="row purchace-popup">
        <div class="col-12">
            <span class="d-block d-md-flex align-items-center">
                <p>Like what you see? Check out our premium version for more.</p>
                <a class="btn ml-auto download-button d-none d-md-block"
                    href="https://github.com/BootstrapDash/StarAdmin-Free-Bootstrap-Admin-Template" target="_blank">Download
                    Free Version</a>
                <a class="btn purchase-button mt-4 mt-md-0" href="https://www.bootstrapdash.com/product/star-admin-pro/"
                    target="_blank">Upgrade To Pro</a>
                <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
            </span>
        </div>
    </div> --}}
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-cube text-danger icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Total Barang</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0"> {{ $barang }} pcs</h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> The amount of goods
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-receipt text-warning icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Ruangan</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{ $ruangan }}</h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Number of Rooms
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-poll-box text-success icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">Supplier</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{ $supplier }}</h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Collaborating suppliers
                </p>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
        <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-left">
                        <i class="mdi mdi-account-location text-info icon-lg"></i>
                    </div>
                    <div class="float-right">
                        <p class="mb-0 text-right">User</p>
                        <div class="fluid-container">
                            <h3 class="font-weight-medium text-right mb-0">{{ $user }}</h3>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Users who access
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-7 grid-margin stretch-card">
        <!--weather card-->
        <div class="card card-weather">
            <div class="card-body">
                <div class="weather-date-location">
                    <h3>{{ $today }}</h3>
                    <p class="text-gray">
                        <span class="weather-date">{{ $date }}</span>
                        <span class="weather-location">Pasuruan, Jawa Timur</span>
                    </p>
                </div>
                <div class="weather-data d-flex">
                    <div class="mr-auto">
                        <h4 class="display-3">21
                            <span class="symbol">&deg;</span>C</h4>
                        <p>
                            Mostly Cloudy
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="d-flex weakly-weather">
                    <div class="weakly-weather-item">
                        <p class="mb-0">
                            Sun
                        </p>
                        <i class="mdi mdi-weather-cloudy"></i>
                        <p class="mb-0">
                            30°
                        </p>
                    </div>
                    <div class="weakly-weather-item">
                        <p class="mb-1">
                            Mon
                        </p>
                        <i class="mdi mdi-weather-hail"></i>
                        <p class="mb-0">
                            31°
                        </p>
                    </div>
                    <div class="weakly-weather-item">
                        <p class="mb-1">
                            Tue
                        </p>
                        <i class="mdi mdi-weather-partlycloudy"></i>
                        <p class="mb-0">
                            28°
                        </p>
                    </div>
                    <div class="weakly-weather-item">
                        <p class="mb-1">
                            Wed
                        </p>
                        <i class="mdi mdi-weather-pouring"></i>
                        <p class="mb-0">
                            30°
                        </p>
                    </div>
                    <div class="weakly-weather-item">
                        <p class="mb-1">
                            Thu
                        </p>
                        <i class="mdi mdi-weather-pouring"></i>
                        <p class="mb-0">
                            29°
                        </p>
                    </div>
                    <div class="weakly-weather-item">
                        <p class="mb-1">
                            Fri
                        </p>
                        <i class="mdi mdi-weather-snowy-rainy"></i>
                        <p class="mb-0">
                            31°
                        </p>
                    </div>
                    <div class="weakly-weather-item">
                        <p class="mb-1">
                            Sat
                        </p>
                        <i class="mdi mdi-weather-snowy"></i>
                        <p class="mb-0">
                            32°
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!--weather card ends-->
    </div>
    <div class="col-lg-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-primary text-center mb-5">Histori Transaksi</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="wrapper d-flex justify-content-between">
                            <div class="side-left">
                                <p class="mb-2">Pemasukan Barang</p>
                                <p class="display-3 mb-4 font-weight-light">{{$barangMasuk}}</p>
                            </div>
                            <div class="side-right">
                                <small class="text-muted"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wrapper d-flex justify-content-between">
                            <div class="side-left">
                                <p class="mb-2">Perawatan Barang</p>
                                <p class="display-3 mb-4 font-weight-light">{{$barangPemeliharaan}}</p>
                            </div>
                            <div class="side-right">
                                <small class="text-muted"></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="wrapper d-flex justify-content-between">
                            <div class="side-left">
                                <p class="mb-2">Pengeluaran Barang</p>
                                <p class="display-3 mb-5 font-weight-light">{{$barangPenyusutan}}</p>
                            </div>
                            <div class="side-right">
                                <small class="text-muted"></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="percentase-progress">
                    <h2 class="card-title text-primary mb-4 text-center">Persentase Pemeliharaan</h2>
                    <div class="wrapper">
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Perbaikan</p>
                            <p class="mb-2 text-primary">{{$percentPerbaikan}}%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated"
                                role="progressbar" style="width: {{$percentPerbaikan}}%"
                                aria-valuenow="{{$percentPerbaikan}}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="wrapper mt-4">

                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Selesai Perbaikan</p>
                            <p class="mb-2 text-success">{{$percentSls}}%</p>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                role="progressbar" style="width: {{$percentSls}}%" aria-valuenow="{{$percentSls}}"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4"></h5>
                <div class="fluid-container">
                    <canvas id="canvas" height="280" width="900"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
    <script>
        var datBarang = {{$dataBarang}};
        var labelBarang = <?php echo '["' . implode('", "', $labelBarang) . '"]' ?>;

        var barChartData = {
            labels: labelBarang,
            datasets: [{
                label: 'Data Barang',
                borderColor: ["rgb(255, 99, 132)","rgb(255, 159, 64)"],
                backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(255, 159, 64, 0.2)'],
                data: datBarang,
                fill: false
            }]
        };

        var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Data Barang'
                    },
                    scales: {
                        yAxes: [{
                        display: true,
                        ticks: {
                            suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                            // OR //
                            beginAtZero: true   // minimum value will be 0.
                        }
                    }]
                    }
                }
            });


    </script>
@endsection
