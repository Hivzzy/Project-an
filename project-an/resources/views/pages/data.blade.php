@extends('main')

@section('title', 'data')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Import Laporan</h1>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                            @if (Auth::user()->role_id != 1)
                           
                            <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input class="col-md-2 offset-md-8 col-sm-2" type="file" name="file">
                                <button type="submit" name="submit" class="rounded-left rounded-right fa fa-upload btn btn-lg btn-primary">  Upload  </button>
                                    <a href="#" >
                                        <button class="rounded-left rounded-right fa fa-mail-forward btn btn-lg btn-success">  Generate  </button>
                                    </a>
                            
                            </form>
                            @endif
                            

                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Attendances</th>
                                        <th>Salary</th>
                                        <th>All Payments</th>
                                        <th>Addition</th>
                                        <th>Fee</th>
                                        <th>Total Payments</th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->nama_karyawan }}</td>
                                            <td>{{ $row->jabatan }}</td>
                                            <td>{{ $row->hari_kerja }}</td>
                                            <td>Rp {{ number_format($row->gaji_perhari, 0, ',')  }}</td>
                                            <td>RP {{ number_format($row->gaji_kotor, 0, ',')  }}</td>
                                            <td>RP {{ number_format($row->tambahan, 0, ',')  }}</td>
                                            <td>RP {{ number_format($row->kasbon, 0, ',')  }}</td>
                                            <td>RP {{ number_format($row->gaji_bersih, 0, ',')  }}</td>
                                            <td><a href="/viewpdf" class="ml-2"><button class="rounded-left rounded-right fa fa-eye btn btn-lg btn-primary">   Preview   </button></a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('style/assets/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('style/assets/js/lib/data-table/datatables-init.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

@endsection