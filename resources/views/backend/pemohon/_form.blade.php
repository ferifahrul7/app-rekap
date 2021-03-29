<div class="card-body">
    <div class="form-group">
        <label for="nama">Nama <b class="text-danger">*</b></label>
        {!! Form::text('nama', null, array('placeholder' => 'Name','class' => 'form-control '.($errors->has('nama') ? 'is-invalid' : '') ))!!}
        {!! $errors->first('nama', '<span class="invalid-feedback">:message</span>') !!}
    </div>

    <div class="form-group">
        <label for="no_telepon">No Telepon <b class="text-danger">*</b></label>
        {!! Form::text('no_telepon', null, array('placeholder' => 'No Telepon','class' => 'form-control '.($errors->has('no_telepon') ? 'is-invalid' : ''))) !!}
        {!! $errors->first('no_telepon', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group">
        <label for="alamat">Alamat <b class="text-danger">*</b></label>
        {!! Form::textarea('alamat', null, array('rows'=>'2','placeholder' => 'Alamat','class' => 'form-control '.($errors->has('alamat') ? 'is-invalid' : ''))) !!}
        {!! $errors->first('alamat', '<div class="invalid-feedback">:message</div>') !!}
    </div>


    <div class="form-group">
        <label for="kd_prov">Provinsi <b class="text-danger">*</b></label>
        {!! Form::select('kd_prov', ['' => 'provinsi']+$provinsi, null, ['class' => 'form-control', 'id' => 'kd_prov']) !!}
        {!! $errors->first('kd_prov','<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group">
        <label for="kd_kab">Kabupaten <b class="text-danger">*</b></label>
        {!! Form::select('kd_kab', ['' => 'kabupaten']+$kabupaten, null, ['class' => 'form-control', 'id' => 'kd_kab']) !!}
        {!! $errors->first('kd_kab', '<p style="color:darkred" class="help-block">:message</p>') !!}
    </div>

    <div class="form-group">
        <label for="kd_kec">Kecamatan <b class="text-danger">*</b></label>
        {!! Form::select('kd_kec', ['' => 'kecamatan']+$kecamatan, null, ['class' => 'form-control', 'id' => 'kd_kec']) !!}
        {!! $errors->first('kd_kec', '<div class="invalid-feedback">:message</div>') !!}
    </div>


    <div class="form-group">
        <label for="kd_kel">Kelurahan <b class="text-danger">*</b></label>
        {!! Form::select('kd_kel', ['' => 'kelurahan']+$kelurahan, null, ['class' => 'form-control', 'id' => 'kd_kel']) !!}
        {!! $errors->first('kd_kel', '<div class="invalid-feedback">:message</div>') !!}
    </div>

</div>
<div class="card-footer">
    <button class="btn btn-sm btn-primary" type="submit">
        <i class="fa fa-dot-circle-o"></i> {{ isset($pemohonModel->id) ? 'Update' : 'Simpan' }}
    </button>
</div>