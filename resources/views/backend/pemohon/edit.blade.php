@extends('layouts.backend.master')
@section('title')
Ubah Data Pemohon
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h4>Ubah Data Pemohon</h4>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pemohon.index') }}"> Back</a>
                        </div>
                    </div>


                    {!! Form::model($pemohonModel, ['method' => 'PATCH','route' => ['pemohon.update', $pemohonModel->id]]) !!}
                    <input type="hidden" id="old_prov" value="{{ $pemohonModel->kd_prov }}">
                    <input type="hidden" id="old_kab" value="{{ $pemohonModel->kd_kab }}">
                    <input type="hidden" id="old_kec" value="{{ $pemohonModel->kd_kec }}">
                    <input type="hidden" id="old_kel" value="{{ $pemohonModel->kd_kel }}">
                    @include('backend.pemohon._form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('assets/lib/select2/select2.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('assets/lib/select2/select2.min.js') }}"></script>
<script>
    window.getKab = function getKab(kd_prov) {
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('select-kabupaten') ?>",
            method: 'POST',
            cache: false,
            data: {
                kd_prov: kd_prov,
                _token: token
            },
            success: function(data) {
                setKab(data);
            }
        });
    }

    function setKab(data) {
        $('#kd_kab').select2({
            placeholder: 'Cari Kabupaten...',
            data: [{
                id: '',
                text: 'Cari Kabupaten...'
            }].concat(data),
        }).on('change', function() {
            let kd_kab = $(this).select2('data')[0].id;
            resetKec();
            getKec(kd_kab);
            resetKel();
        });
    }


    function setKec(data) {
        $('#kd_kec').html('').select2({
            placeholder: 'Cari Kecamatan...',
            data: [{
                id: '',
                text: 'Cari Kecamatan...'
            }].concat(data),
        }).on('change', function() {
            let kd_kec = $(this).select2('data')[0].id;
            resetKel();
            getKel(kd_kec);
        });
    }

    function setKel(data) {
        $('#kd_kel').html('').select2({
            placeholder: 'Cari Kelurahan...',
            data: [{
                id: '',
                text: 'Cari Kelurahan...'
            }].concat(data),
        })
    }

    window.getKec = function getKec(kd_kab) {
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('select-kecamatan') ?>",
            method: 'POST',
            cache: false,
            data: {
                kd_kab: kd_kab,
                _token: token
            },
            success: function(data) {
                setKec(data);
            }
        });
    }

    window.resetKec = function resetKec() {
        $('#kd_kec').html('').select2({
            placeholder: "Cari Kecamatan. . .",
            language: {
                "noResults": function() {
                    return "Mohon memilih kabupaten dahulu";
                }
            },
        });
    }

    window.resetKel = function resetKel() {
        $('#kd_kel').html('').select2({
            placeholder: "Cari Kelurahan. . .",
            language: {
                "noResults": function() {
                    return "Mohon memilih kecamatan dahulu";
                }
            },
        });
    }

    window.resetKab = function resetKab() {
        $('#kd_kab').html('').select2({
            placeholder: "Cari Kabupaten. . .",
            language: {
                "noResults": function() {
                    return "Mohon memilih provinsi dahulu";
                }
            },
        });
    }

    window.getKel = function getKel(kd_kec) {
        var token = $("input[name='_token']").val();
        $.ajax({
            url: "<?php echo route('select-kelurahan') ?>",
            method: 'POST',
            cache: false,
            data: {
                kd_kec: kd_kec,
                _token: token
            },
            success: function(data) {
                setKel(data);
            }
        });
    }
    $(document).ready(function() {

        $('#kd_prov').select2({
            placeholder: 'Cari Provinsi. . .'

        }).on('change', function() {
            let id_prov = $(this).select2('data')[0].id;
            resetKab();
            getKab(id_prov);
            resetKec();
            resetKel();
        });

        $('#kd_kab').select2({
            placeholder: "Cari Kabupaten. . .",
            language: {
                "noResults": function() {
                    return "Mohon memilih provinsi dahulu";
                }
            },
        }).on('change',function(){
            resetKec();
            getKec($(this).select2('data')[0].id);
            resetKel();
        })

        $('#kd_kel').select2({
            placeholder: "Cari Kelurahan. . .",
            language: {
                "noResults": function() {
                    return "Mohon memilih kecamatan dahulu";
                }
            },
        });

        $('#kd_kec').select2({
            placeholder: "Cari Kecamatan. . .",
            language: {
                "noResults": function() {
                    return "Mohon memilih kabupaten dahulu";
                }
            },
        }).on('change',function(){
            resetKel();
            getKel($(this).select2('data')[0].id);
        })

    })

    $(document).ready(function() {
        var old_prov = $('#old_prov').val(),
            old_kab = $('#old_kab').val(),
            old_kec = $('#old_kec').val(),
            old_kel = $('#old_kel').val();

        console.log(old_prov, old_kab, old_kec, old_kel);

        $('#kd_prov').val(old_prov);
        $('#kd_kab').val(old_kab);
        $('#kd_kec').val(old_kec);
        $('#kd_kel').val(old_kel);

    });
</script>
@endpush