@extends('layouts.app')
@section('mpasok')
active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pasok</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/pasok/create') }}" class="btn btn-primary btn-xs" title="Add New Pasok"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Nama Distributor </th><th> Judul Buku </th><th> Jumlah </th><th>Tanggal</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pasok as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->distributor->nama_distributor }}</td><td>{{ $item->buku->judul }}</td><td>{{ $item->jumlah }}</td>
                                        <td>{{ $item->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ url('/admin/pasok/' . $item->id) }}" class="btn btn-success btn-xs" title="View Pasok"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/pasok/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Pasok"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/pasok', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Pasok" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Pasok',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $pasok->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection