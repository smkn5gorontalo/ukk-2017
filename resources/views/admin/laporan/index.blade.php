@extends('layouts.app')
@section('mlaporan')
active
@endsection
@section('custom-scripts')
    <script>
        jQuery(document).ready(function() {
            $('.bulan').change(function() {
                $('.tanggal').removeClass('hide');
            });
        });
    </script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        @if (Session::has('error'))
                        <div class="alert alert-danger">
                            <p class="lead"><i class="fa fa-warning"></i> Error!</p>
                            {{ session('error') }}
                        </div>
                        @endif
                        <p class="lead"><i class="fa fa-file-text text-success"></i> Generate Laporan</p>
                        {!! Form::open(['url'=>'admin/laporan/generate','class'=>'form-inline']) !!}
                            <div class="form-group">
                                {!! Form::select('tahun', $tahun, date('Y'), ['class'=>'form-control','placeholder'=>'Pilih Tahun']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::select('bulan', $bulan, null, ['class'=>'form-control bulan','placeholder'=>'Pilih Bulan']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::select('tanggal', $tanggal, null, ['class'=>'form-control hide tanggal','placeholder'=>'Pilih Tanggal']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::button('<i class="fa fa-eye"></i> Generate', ['class'=>'btn btn-success','type'=>'submit']) !!}
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection