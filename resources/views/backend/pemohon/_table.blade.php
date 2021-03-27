@push('css')
	@include('datatables.datatables-css')
@endpush
<div class="col-sm-12">
    <div class="text-right" id="buttons"></div>
</div>
<table id="tabel-pemohon" class="table table-hover table-sm table-sm-responsive" style="width:100%">
    <thead class="bg-info">
        <tr>
            <th>#</th>
            <th>NAMA PEMOHON</th>
            <th>ALAMAT PEMOHON</th>
            <th>PROVINSI</th>
            <th>KABUPATEN</th>
            <th>KECAMATAN</th>
            <th>KELURAHAN</th>
            <th>NO TELEPON</th>
            <th class="text-right">AKSI</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@push('scripts')
    @include('datatables.datatables-js')
@endpush