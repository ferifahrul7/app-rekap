<div class="card-body">
    <div class="form-group">
        <label for="nama">Nama</label>
        {!! Form::text('nama', null, array('placeholder' => 'Name','class' => 'form-control '.($errors->has('nama') ? 'is-invalid' : '') ))!!}
        {!! $errors->first('nama', '<span class="invalid-feedback">:message</span>') !!}
    </div>

    <div class="form-group">
        <label for="no_telepon">No Telepon</label>
        {!! Form::text('no_telepon', null, array('placeholder' => 'No Telepon','class' => 'form-control '.($errors->has('no_telepon') ? 'is-invalid' : ''))) !!}
        {!! $errors->first('no_telepon', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        {!! Form::textarea('alamat', null, array('rows'=>'2','placeholder' => 'Alamat','class' => 'form-control '.($errors->has('alamat') ? 'is-invalid' : ''))) !!}
        {!! $errors->first('alamat', '<div class="invalid-feedback">:message</div>') !!}
    </div>
</div>
<div class="card-footer">
    <button class="btn btn-sm btn-primary" type="submit">
        <i class="fa fa-dot-circle-o"></i> {{ isset($pemohonModel->id) ? 'Update' : 'Simpan' }}
    </button>
</div>