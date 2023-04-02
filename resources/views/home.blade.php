@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4 px-2">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1">
                        <i class="fas fa-box-open"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Active Orders</span>
                        <span class="info-box-number">3 902</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1">
                        <i class="fas fa-box"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Denied Orders</span>
                        <span class="info-box-number">00</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1">
                        <i class="fas fa-user-cog"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">User Activity</span>
                        <span class="info-box-number">1, 532</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-8">
                <div class="card" style="height:60vh">
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                            <span class="text-bold text-lg">DARE</span>
                            <span>Most Ordered Items All Time</span>
                            </p>
                            <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 12.5%
                            </span>
                            <span class="text-muted">Since last month</span>
                            </p>
                        </div>
                        <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="visitors-chart" height="400" width="1670" style="display: block; width: 835px; height: 200px;" class="chartjs-render-monitor"></canvas>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> This Month
                            </span>
                            <span>
                            <i class="fas fa-square text-gray"></i> Last Month
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-4">
                <div class="card" style="height:60vh">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
