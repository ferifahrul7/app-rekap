@push('css')
	@include('datatables.datatables-css')
@endpush
<div class="col-sm-12">
    <div class="text-right" id="buttons"></div>
</div>
<table id="tabel-imb" class="table table-hover table-sm table-sm-responsive" style="width:100%">
    <thead class="bg-info text-nowrap">
        <tr>
            <th>NO</th>
            <th>TANGGAL PENDAFTARAN</th>
            <th>NOMOR IMB</th>
            <th>NAMA PEMOHON</th>
            <th>ALAMAT</th>
            <th>BANGUNAN</th>
            <th>LOKASI BANGUNAN</th>
            <th>LOKASI KECAMATAN</th>
            <th>KONDISI BANGUNAN</th>
            <th>TINGKAT BANGUNAN</th>
            <th>UKURAN BANGUNAN</th>
            <th>DIATAS TANAH MILIK</th>
            <th>TANGGAL DITETAPKAN</th>
            <th class="text-right">AKSI</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

@push('scripts')
    @include('datatables.datatables-js')
@endpush