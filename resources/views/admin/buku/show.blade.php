@extends('layouts.app')
@section('mbuku')
active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Buku {{ $buku->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('admin/buku/' . $buku->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Buku"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/buku', $buku->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Buku',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $buku->id }}</td>
                                    </tr>
                                    <tr><th> Judul </th><td> {{ $buku->judul }} </td></tr><tr><th> Noisbn </th><td> {{ $buku->noisbn }} </td></tr><tr><th> Penulis </th><td> {{ $buku->penulis }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection