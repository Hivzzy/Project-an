@extends('main')

@section('title', 'data')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Data Karyawan</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active"><i class="fa fa-users"></i></li>
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
                        @if (session()->has('failed'))
                            <div class="alert alert-danger">
                                {!! html_entity_decode(session()->get('failed')) !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @elseif (session()->has('success'))
                            <div class="alert alert-success">
                                {!! html_entity_decode(session()->get('success')) !!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header row">
                            <strong class="card-title ml-4">Import Laporan</strong>
                            @if (Auth::user()->role_id != 1)
                                <form class="offset-md-3" action="{{ route('upload.file') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="file">
                                    <button type="submit" name="submit"
                                        class="rounded-left rounded-right btn btn-sm btn-primary">
                                        <i class="fa fa-upload fa-">&nbsp;</i>
                                        Upload
                                    </button>
                                </form>
                                @if ($data->isEmpty())
                                    <a href="{{ route('sendEmail') }}">
                                        <button class="ml-3 rounded-left rounded-right btn btn-sm btn-success" disabled>
                                            <i class="fa fa-mail-forward">&nbsp;</i>
                                            Send to Email
                                        </button>
                                    </a>
                                @else
                                    <a href="{{ route('sendEmail') }}">
                                        <button class="ml-3 rounded-left rounded-right btn btn-sm btn-success">
                                            <i class="fa fa-mail-forward">&nbsp;</i>
                                            Send to Email
                                        </button>
                                    </a>
                                @endif
                                @if ($data->isEmpty())
                                    <a href="{{ route('reset.data') }}">
                                        <button class="ml-3 rounded-left rounded-right btn btn-sm btn-danger" disabled>
                                            <i class="fa fa-trash-o">&nbsp;</i>
                                            Reset Data
                                        </button>
                                    </a>
                                @else
                                    <a href="{{ route('reset.data') }}">
                                        <button class="ml-3 rounded-left rounded-right btn btn-sm btn-danger">
                                            <i class="fa fa-trash-o">&nbsp;</i>
                                            Reset Data
                                        </button>
                                    </a>
                                @endif
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
                                            <td>Rp {{ number_format($row->gaji_perhari, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($row->gaji_kotor, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($row->tambahan, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($row->kasbon, 0, ',', '.') }}</td>
                                            <td><b> Rp {{ number_format($row->gaji_bersih, 0, ',', '.') }}</b></td>
                                            <td><a href="/viewpdf/{{ $row->id }}" class="ml-2">
                                                    <button class="rounded-left rounded-right btn btn-xs"
                                                        style="background-color: #F5B52D; color: #000000;">
                                                        <i class="fa fa-eye">&nbsp;</i>
                                                        Preview
                                                    </button>
                                                </a>
                                            </td>
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
