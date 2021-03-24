@extends('layouts.backend.master')
@section('title')
Data Pemohon
@endsection
@section('content')
<div class="container-fluid">
    <div class="fade-in">
        <div class="row">
            <div class="col-lg-12">
                <div class="card rounded-lg">
                    <div class="card-header pb-0">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item float-left">
                                <h4><i class="fas fa-bars"></i> Data Pemohon</h4>
                            </li>
                            <li class="list-inline-item float-right">
                                <div class="d-none d-md-block">
                                    <a href="{{ route('pemohon.create') }}" class="btn btn-sm btn-primary mb-3 mr-auto">
                                        <i class="fas fa-plus mx-2"></i>
                                        Pemohon
                                    </a>
                                </div>
                                <div class="d-md-none float-right">
                                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary mb-3">
                                        <i class="fas fa-plus mx-2"></i>

                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @include('backend.pemohon._table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@include('backend.pemohon.scripts');
@endpush