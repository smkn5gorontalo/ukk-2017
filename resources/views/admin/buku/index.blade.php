@extends('layouts.app')
@section('mbuku')
active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Buku</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/buku/create') }}" class="btn btn-primary btn-xs" title="Add New Buku"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Judul </th><th> Noisbn </th><th> Penulis </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($buku as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->judul }}</td><td>{{ $item->noisbn }}</td><td>{{ $item->penulis }}</td>
                                        <td>
                                            <a href="{{ url('/admin/buku/' . $item->id) }}" class="btn btn-success btn-xs" title="View Buku"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/admin/buku/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Buku"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/buku', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Buku" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Buku',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $buku->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection