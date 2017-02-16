@extends('layouts.app')
@section('mpenjualan')
active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Penjualan {{ $penjualan->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/penjualan/' . $penjualan->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Penjualan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/penjualan', $penjualan->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Penjualan',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $penjualan->id }}</td>
                                    </tr>
                                    <tr><th> Id Buku </th><td> {{ $penjualan->id_buku }} </td></tr><tr><th> Id User </th><td> {{ $penjualan->id_user }} </td></tr><tr><th> Jumlah </th><td> {{ $penjualan->jumlah }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection