@extends('layouts.app')

@section('title')
Home - Sebuah program ganteng
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="alert alert-info">
                        <strong>Selamat datang {{ Auth::user()->nama }}!</strong> Silahkan pilih menu diatas untuk mengakses halaman!
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
