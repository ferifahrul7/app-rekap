<script>
    var table = $('#tabel-pemohon').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        scrollX: true,
        ajax: '/admin/pemohon-ajax',
        columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            },
            {
                data: 'nama',
                name: 'nama'
            },
            {
                data: 'alamat',
                name: 'alamat'
            },
            {
                data: 'no_telepon',
                name: 'no_telepon'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                className: 'not-exported'
            },
        ],
        "language": {
            "lengthMenu": "_MENU_ ",
            "info": "<button type='button' class='btn btn-primary'> Total : <span class='badge badge-transparent'> _END_</span> dari <span class='badge badge-transparent'> _TOTAL_</span> Data</button>",
            "search": "Search Data :  ",
            "dom": "<t<p >>",
            "zeroRecords": "Tidak ada data",
            "search": "<div class='mr-2 mt-2'> _INPUT_ </div>",
            "infoFiltered": "",
            "searchPlaceholder": "Cari...",
            "infoEmpty": "Data tidak tersedia",
        },
        "bSortClasses": false,
        "pageLength": 25
    });


    var buttons = new $.fn.dataTable.Buttons(table, {
        buttons: [{
                text: '<i class="fas fa-file-pdf"></i> pdf',
                className: 'btn btn-danger',
                extend: 'pdf',
                title: '',
                messageTop: 'Data Pemohon',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                text: '<i class="fas fa-file-excel"></i> xls',
                className: 'btn btn-success',
                extend: 'excel',
                title: '',
                messageTop: 'Data Pemohon',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                text: '<i class="fas fa-print"></i> print',
                className: 'btn btn-warning',
                extend: 'print',
                title: '',
                messageTop: 'Data Pemohon',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                text: '<i class="fas fa-table"></i> visibitas kolom',
                className: 'btn btn-primary',
                extend: 'colvis',
                postfixButtons: [
                    'colvisRestore'
                ]
            },
        ]
    }).container().appendTo($('#buttons'));

// ---------------------------------------- event

 $("#saveData").click(function(event) {
        startLoading();
        var validat = $(".form-input").valid();
        var action = $(this).val();
        if (!validat) {
            finishLoading();
            return false;
        }
        event.preventDefault();
        if (action == "add") {
            var url = '/admin/pemohon/';
            var title = "Tambah Pengguna";
        } else if (action == "edit") {
            var id = $("#id_edit").val();
            var url = '/admin/pemohon/' + id;
            var title = "Ubah Pengguna";
        }
        $.ajax({
            url: url,
            method: "POST",
            data: $('.form-input').serialize(),
            dataType: 'json',
            error: function(json) {
                finishLoading();
                var errors = $.parseJSON(json.responseText);
                $.each(errors.errors, function(key, value) {
                    $('.' + key + '-error').html(value);
                });
            },
            success: function(d) {
                finishLoading();
                if (d.status == 'success') {
                    $("#formModal").modal("hide");
                    $(".form-input")[0].reset();
                    $(".method-hidden").html("");
                    table.ajax.reload();
                    notifToast(action, title, d.message);
                    return false;
                } else if ((d.status == 'error')) {
                    $("#formModal").modal("hide");
                    $(".form-input")[0].reset();
                    $(".method-hidden").html("");
                    table.ajax.reload();
                    notifToast(d.status, title, d.message);
                    return false;
                }
            }
        });
    });

    function createData() {
        $(".modal-title").html("Tambah Data Pemohon");
        $("#saveData").val("add");
        $("#saveData").html('<i class="fa fa-save"></i> Simpan');
        $("#formModal").modal("show");
    }
</script>