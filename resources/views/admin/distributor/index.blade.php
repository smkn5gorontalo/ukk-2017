@extends('layouts.app')
@section('mdistributor')
active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Distributor</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/distributor/create') }}" class="btn btn-primary btn-xs" title="Add New Distributor"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Nama Distributor </th><th> Alamat </th><th> Telepon </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($distributor as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->nama_distributor }}</td><td>{{ $item->alamat }}</td><td>{{ $item->telepon }}</td>
                                        <td>
                                            <a href="{{ url('/admin/distributor/' . $item->id) }}" class="btn btn-success btn-xs" title="View Distributor"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/distributor/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Distributor"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/distributor', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Distributor" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Distributor',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $distributor->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection