@extends('layouts.backend.master')

@section('title')
Roles
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
                                <h4><i class="fas fa-bars"></i> Daftar Roles</h4>
                            </li>
                            <li class="list-inline-item float-right">
                                <div class="d-none d-md-block">
                                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary mb-3 mr-auto">
                                        <i class="fas fa-plus mx-2"></i>
                                        Roles
                                    </a>
                                </div>
                                <div class="d-md-none float-right">
                                    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary mb-3">
                                        <i class="fas fa-plus mx-2"></i>

                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal">
                            <div class="row mb-3">
                                <div class="col-lg-12 d-inline-flex justify-content-end align-items-center align-items-stretch">
                                    <input type="text" class="form-control col-lg-3" name="term" placeholder="Pencarian">
                                    <button type="submit" class="btn btn-sm btn-outline-primary mx-1"><i class="fas fa-search mx-2"></i></a>
                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-lg-12"> 
                                
                                @include('backend.roles._table')

                                {!! $roles->appends(request()->except('page'))->links() !!}
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

<script>
    const app = new Vue({
        el: '#app',
        data() {
            return {
                fields: {
                    _method: 'DELETE',
                },
                errorMessage: '',
                hasError: false,

            }
        },
        methods: {
            hapus: function(url) {
                window.Swal.fire({
                    title: 'Apakah anda yakin?',
                    text: "Data tidak bisa dikembalikan setelah dihapus!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus'
                }).then((result) => {
                    if (result.value) {
                        axios
                            .post(url, this.fields)
                            .then((response) => {
                                if (response.data.code === 500) {
                                    this.hasError = true;
                                    this.errorMessage = response.data.message;
                                } else if (response.data.code === 200) {

                                    toastr.success(response.data.message).then(() => {
                                        location.reload()
                                    });


                                }

                            })
                            .catch((error) => {
                                if (error.response.status === 422) {
                                    this.errors = error.response.data.errors || {};
                                }
                            });
                    }
                })

            },
            showImage: function(link) {

                window.Swal.fire({
                    imageUrl: link,
                    width: 600,
                    padding: '3em',
                })
            }
        }
    });
</script>
@endpush