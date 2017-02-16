@extends('layouts.app')
@section('mpasok')
active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pasok {{ $pasok->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/pasok/' . $pasok->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Pasok"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/pasok', $pasok->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Pasok',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $pasok->id }}</td>
                                    </tr>
                                    <tr><th> Id Distributor </th><td> {{ $pasok->id_distributor }} </td></tr><tr><th> Id Buku </th><td> {{ $pasok->id_buku }} </td></tr><tr><th> Jumlah </th><td> {{ $pasok->jumlah }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection