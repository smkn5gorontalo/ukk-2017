@extends('layouts.app')
@section('mdistributor')
active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Distributor {{ $distributor->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/distributor/' . $distributor->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Distributor"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/distributor', $distributor->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Distributor',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $distributor->id }}</td>
                                    </tr>
                                    <tr><th> Nama Distributor </th><td> {{ $distributor->nama_distributor }} </td></tr><tr><th> Alamat </th><td> {{ $distributor->alamat }} </td></tr><tr><th> Telepon </th><td> {{ $distributor->telepon }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection