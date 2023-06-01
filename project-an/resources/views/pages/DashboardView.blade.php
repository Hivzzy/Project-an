@extends('main')

@section('title', 'Dasboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><i class="fa fa-dashboard"></i></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="col-sm-12 mb-4">
                <div class="card-group">
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-users"></i>
                            </div>
                            <small class="text-muted text-uppercase font-weight-bold">Jumlah Karyawan</small>
                            <div class="h4 mb-0">
                                {{-- @if ($sum == 0)
                                    <span class="count">0 karyawan</span>
                                @endif --}}
                                <span class="count">{{ $sum }} karyawan</span>
                            </div>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;">
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="ti ti-time"></i>
                            </div>

                            <small class="text-muted text-uppercase font-weight-bold">Total gaji perhari</small>
                            <div class="h4 mb-0">
                                @if ($data->isEmpty())
                                    <span class="count">Rp 0</span>
                                @else
                                    <span class="count">Rp {{ number_format($data[0]->tot_gaji_perhari, 0, ',') }}</span>
                                @endif
                            </div>

                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;">
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="ti ti-layers-alt"></i>
                            </div>

                            <small class="text-muted text-uppercase font-weight-bold">Total</small>
                            <div class="h4 mb-0">
                                @if ($data->isEmpty())
                                    <span class="count">Rp 0</span>
                                @else
                                    <span class="count">Rp {{ number_format($data[0]->tot_gaji_kotor, 0, ',') }}</span>
                                @endif
                            </div>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;">
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="ti ti-stats-up"></i>
                            </div>

                            <small class="text-muted text-uppercase font-weight-bold">Total Tambahan</small>
                            <div class="h4 mb-0">
                                @if ($data->isEmpty())
                                    <span class="count">Rp 0</span>
                                @else
                                    <span class="count">Rp {{ number_format($data[0]->tot_tambahan, 0, ',') }}</span>
                                @endif
                            </div>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;">
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="ti ti-stats-down"></i>
                            </div>

                            <small class="text-muted text-uppercase font-weight-bold">Total kasbon</small>
                            <div class="h4 mb-0">
                                @if ($data->isEmpty())
                                    <span class="count">Rp 0</span>
                                @else
                                    <span class="count">Rp {{ number_format($data[0]->tot_kasbon, 0, ',') }}</span>
                                @endif
                            </div>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;">
                            </div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-money"></i>
                            </div>

                            <small class="text-muted text-uppercase font-weight-bold">Total yang Diterima</small>
                            @if ($data->isEmpty())
                                <div class="h4 mb-0">Rp 0</div>
                            @else
                                <div class="h4 mb-0">Rp {{ number_format($data[0]->tot_gaji_bersih, 0, ',') }}</div>
                            @endif
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
