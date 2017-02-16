<div class="form-group {{ $errors->has('judul') ? 'has-error' : ''}}">
    {!! Form::label('judul', 'Judul', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('judul', null, ['class' => 'form-control']) !!}
        {!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('noisbn') ? 'has-error' : ''}}">
    {!! Form::label('noisbn', 'No. ISBN ', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('noisbn', null, ['class' => 'form-control']) !!}
        {!! $errors->first('noisbn', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('penulis') ? 'has-error' : ''}}">
    {!! Form::label('penulis', 'Penulis', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('penulis', null, ['class' => 'form-control']) !!}
        {!! $errors->first('penulis', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('penerbit') ? 'has-error' : ''}}">
    {!! Form::label('penerbit', 'Penerbit', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('penerbit', null, ['class' => 'form-control']) !!}
        {!! $errors->first('penerbit', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('tahun') ? 'has-error' : ''}}">
    {!! Form::label('tahun', 'Tahun', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('tahun', null, ['class' => 'form-control']) !!}
        {!! $errors->first('tahun', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('harga_pokok') ? 'has-error' : ''}}">
    {!! Form::label('harga_pokok', 'Harga Pokok (Rp)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('harga_pokok', null, ['class' => 'form-control']) !!}
        {!! $errors->first('harga_pokok', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('harga_jual') ? 'has-error' : ''}}">
    {!! Form::label('harga_jual', 'Harga Jual (Rp)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('harga_jual', null, ['class' => 'form-control']) !!}
        {!! $errors->first('harga_jual', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('diskon') ? 'has-error' : ''}}">
    {!! Form::label('diskon', 'Diskon (%)', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('diskon', null, ['class' => 'form-control']) !!}
        {!! $errors->first('diskon', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>