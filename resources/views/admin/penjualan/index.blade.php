@extends('layouts.app')
@section('mpenjualan')
active
@endsection
@section('custom-scripts')
    <script>
        jQuery(document).ready(function($) {
            var apiUrl     =   '{!! url('admin/penjualan/json/') !!}'
            $(".bukus").select2({
              ajax:{
                dataType: 'json',
                url: function(params){
                    var q;
                    if(params.term){
                        q   = "?action=search"+params.term;
                    }else{
                        q   = "{{ old('id_buku') ? "?action=search&term=".old('id_buku') : '' }}";
                    }
                    return apiUrl+'/list-buku/'+q;
                },
                data: function(params) {
                    return {
                        term: params.term
                    }
                },
                processResults: function (data, page) {
                    return {
                        results: data
                    };
                }
              },
              placeholder: 'Cari judul buku'

            });
            
        });
    </script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Tambah Belanjaan</h3>
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-info">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Info!</strong> Cek stok buku jika tidak ada hasil pencarian judul buku.
                        </div>
                        {!! Form::open(['url'=>'admin/penjualan/','method'=>'post','class'=>'form-horizontal']) !!}
                            <div class="form-group {{ $errors->has('id_buku') ? 'has-error' : ''}}">
                                {!! Form::label('id_buku', 'Judul Buku', ['class'=>'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::select('id_buku', $selectedBuku, null, ['class'=>'bukus form-control','style'=>'width:100%']) !!}
                                    {!! $errors->first('id_buku', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
                                {!! Form::label('jumlah', 'Jumlah', ['class'=>'control-label col-sm-4']) !!}
                                <div class="col-sm-8">
                                    {!! Form::number('jumlah', old('jumlah'), ['class'=>'form-control']) !!}
                                    {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-8 col-sm-offset-4">
                                    {!! Form::button('<i class="fa fa-plus"></i> Tambah', ['class'=>'btn btn-sm btn-primary','type'=>'submit']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div> 
            {{-- col-md-4 --}}
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Belanjaan</h3>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('pesan'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Gagal!</strong> {!! Session::get('pesan') !!}
                        </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Buku</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Diskon</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $total_bayar[] = [];?>
                                    @foreach ($penjualan as $key=>$item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->buku->judul }}</td>
                                        <td>Rp. {{ number_format($item->buku->harga_jual) }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->buku->diskon }}%</td>
                                        <td>
                                        Rp. {{ number_format($item->total) }}
                                        {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/penjualan', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                            {!! Form::button('<i class="fa fa-times"></i>', [
                                                    'type' => 'submit',
                                                    'class' => 'btn btn-danger btn-xs pull-right',
                                                    'title' => 'Hapus',
                                                    'onclick'=>'return confirm("Confirm delete?")'
                                            ]) !!}
                                        {!! Form::close() !!}
                                        </td>
                                        <?php $total_bayar[] = $item->total;?>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th colspan="5" style="text-align: right">Total</th>
                                        <th colspan="2">Rp.{{ number_format(array_sum($total_bayar)) }}</th>
                                    </tr>
                                </tbody>
                            </table>
                            {!! Form::open(['url'=>'admin/penjualan/confirm','method'=>'post']) !!}
                            {!! Form::button('Selesaikan', ['class'=>'btn pull-right btn-primary','type'=>'submit','onclick'=>"return confirm('Selesaikan pembayaran sekarang?')"]) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            {{-- col-md-8 --}}
        </div>
    </div>
@endsection