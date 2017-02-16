@extends('layouts.app')
@section('mpasok')
active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Pasok Buku <small><em><strong>{{ $pasok->buku->judul }}</strong></em></small></div>
                    <div class="panel-body">

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($pasok, [
                            'method' => 'PATCH',
                            'url' => ['/admin/pasok', $pasok->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.pasok.form', ['submitButtonText' => 'Update','dateValue'=>$pasok->tanggal])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection