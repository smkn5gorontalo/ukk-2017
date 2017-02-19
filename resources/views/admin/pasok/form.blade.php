<div class="form-group {{ $errors->has('id_distributor')|count($distributors)==0 ? 'has-error' : ''}}">
    {!! Form::label('id_distributor', 'Pilih Distributor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('id_distributor', $distributors, null, ['class'=>'form-control','required'=>"required"]) !!}
        {!! $errors->first('id_distributor', '<p class="help-block">:message</p>') !!}
        @if (count($distributors)==0)
            <p class="help-block">Belum ada data distributor! <a href="{{ url('admin/distributor/create') }}">Tambahkan</a> data distributor terlebih dahulu</p>
        @endif
    </div>
</div><div class="form-group {{ $errors->has('id_buku')|count($bukus)==0 ? 'has-error' : ''}}">
    {!! Form::label('id_buku', 'Judul Buku', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('id_buku', $bukus, null, ['class'=>'form-control','required'=>"required"]) !!}
        {!! $errors->first('id_buku', '<p class="help-block">:message</p>') !!}
        @if (count($bukus)==0)
            <p class="help-block">Belum ada data buku! <a href="{{ url('admin/buku/create') }}">Tambahkan</a> data buku terlebih dahulu</p>
        @endif
    </div>
</div><div class="form-group {{ $errors->has('jumlah') ? 'has-error' : ''}}">
    {!! Form::label('jumlah', 'Jumlah', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('jumlah', null, ['class' => 'form-control','required'=>"required"]) !!}
        {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    {!! Form::label('tanggal', 'Tanggal', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('tanggal', isset($dateValue) ? $dateValue : null, ['class' => 'form-control']) !!}
        {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>