@extends('layouts.backend.master')
@section('title')
Tambah Data Pemohon
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <h4>Tambah Data Pemohon</h4>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pemohon.index') }}"> Back</a>
                        </div>
                    </div>


                    {!! Form::model($pemohonModel, array('route' => 'pemohon.store','method'=>'POST', 'id' => 'user-form')) !!}

                    @include('backend.pemohon._form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection