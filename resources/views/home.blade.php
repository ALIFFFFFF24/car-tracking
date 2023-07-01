@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @can('master-list')
                    {{-- konten admin --}}
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>{{ $vehicle }}</h3>
                                            <p>
                                                Total Vehicles
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-android-car"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{ $driver }}</h3>
                                            <p>
                                                Total Drivers
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-android-contacts"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-secondary">
                                        <div class="inner">
                                            <h3>{{ $user }}</h3>
                                            <p>
                                                Total Users
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3>{{ $delivery }}</h3>
                                            <p>
                                                Total Deliveries
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-dark">
                                        <div class="inner">
                                            <h3>{{ $checkpoint }}</h3>
                                            <p>
                                                Total Checkpoints
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-android-pin"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-primary">
                                        <div class="inner">
                                            <h3>{{ $status }}</h3>
                                            <p>
                                                Pending
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-android-time"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-primary">
                                        <div class="inner">
                                            <h3>{{ $statusondev }}</h3>
                                            <p>
                                               On Delivery
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-android-bicycle"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-primary">
                                        <div class="inner">
                                            <h3>{{ $statusdelivered }}</h3>
                                            <p>
                                                Delivered
                                            </p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-android-checkbox"></i>
                                        </div>
                                    </div>
                                </div>
    
                                <!-- BAR CHART -->
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Total Deliveries</h3>
    
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="chart"></canvas>
    
                                    </div>
                                </div>

    
                    </section>
                @endcan
                        @can('sopir-list')
                         {{-- konten sopir --}}
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{ $checkpoint }}</h3>
                                        <p>
                                            Total CheckPoints
                                        </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                </div>
                            </div>
                </section>
                        @endcan
                        @can('owner-list')
                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <h3>{{ $driver }}</h3>
                                                <p>
                                                    Total Drivers
                                                </p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-android-contacts"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <h3>{{ $vehicle }}</h3>
                                                <p>
                                                    Total Vehicles
                                                </p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-android-car"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-warning">
                                            <div class="inner">
                                                <h3>{{ $delivery }}</h3>
                                                <p>
                                                    Total Deliveries 
                                                </p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-bag"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <h3>{{ $statusdelivered }}</h3>
                                                <p>
                                                    Delivered 
                                                </p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-android-checkbox"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <h3>{{ $status }}</h3>
                                                <p>
                                                    Pending 
                                                </p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-android-time"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <h3>{{ $statusondev }}</h3>
                                                <p>
                                                    On Delivery
                                                </p>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-android-bicycle"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- BAR CHART -->
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Total Deliveries</h3>
    
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="chart"></canvas>
    
                                    </div>
                                </div>
                        </section>
                    @endcan
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        var dataDelivery = {!! json_encode($deliveryData) !!};

        const data = {
            labels: ['jan', 'feb', 'mar', 'apr', 'may', 'june', 'july', 'aug', 'sep', 'oct', 'nov', 'dec'],
            datasets: [{
                label: 'Delivery',
                data: dataDelivery,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
            }]
        };
        //- BAR CHART -
        const ctx = document.getElementById('chart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                maintainAspectRatio: false,
            }
        });
    </script>
@endpush
