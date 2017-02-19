<div class="form-group {{ $errors->has('nama_distributor') ? 'has-error' : ''}}">
    {!! Form::label('nama_distributor', 'Nama Distributor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama_distributor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama_distributor', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@if (isset($submitButtonText))
    <div class="form-group {{ $errors->has('nama_distributor') ? 'has-error' : ''}}">
    {!! Form::label('nama_distributor', 'Nama Distributor', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nama_distributor', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nama_distributor', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : ''}}">
    {!! Form::label('alamat', 'Alamat', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
        {!! $errors->first('alamat', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telepon') ? 'has-error' : ''}}">
    {!! Form::label('telepon', 'Telepon', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('telepon', null, ['class' => 'form-control']) !!}
        {!! $errors->first('telepon', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>