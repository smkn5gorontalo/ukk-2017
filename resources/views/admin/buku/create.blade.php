@extends('layouts.app')
@section('mbuku')
active
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Buku</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => '/admin/buku', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.buku.form')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection