@extends('layouts.app')
@section('mpenjualan')
active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Penjualan</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/penjualan/create') }}" class="btn btn-primary btn-xs" title="Add New Penjualan"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Id Buku </th><th> Id User </th><th> Jumlah </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($penjualan as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->id_buku }}</td><td>{{ $item->id_user }}</td><td>{{ $item->jumlah }}</td>
                                        <td>
                                            <a href="{{ url('/admin/penjualan/' . $item->id) }}" class="btn btn-success btn-xs" title="View Penjualan"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/penjualan/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Penjualan"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/penjualan', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Penjualan" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Penjualan',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $penjualan->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection