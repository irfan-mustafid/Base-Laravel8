<script type="text/javascript">
    $(document).ready(function() {


        $('#simpan_modal').on('click', function() {
            var id = $('#project_id').val();
            var project_name = $('#project_name').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('dashboard.simpan') }}",
                data: {
                    id: id,
                    project_name: project_name,
                },
                cache: false,
                global: false,
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        $.alert({
                            title: 'Peringatan... !',
                            content: data.pesan,
                            buttons: {
                                Ok: {
                                    btnClass: 'btn-warning',
                                    action: function() {
                                        location.reload();
                                    }
                                }
                            }
                        });
                    }
                },
                beforeSend: function() {
                    $("#simpan_modal").html("Loading...");
                    $("#simpan_modal").prop('disabled', true);
                },
                error: function(request, status, error) {
                    $.alert({
                        title: 'Peringatan... !',
                        content: request,
                        buttons: {
                            Ok: {
                                btnClass: 'btn-warning',
                                action: function() {
                                    location.reload();
                                }
                            }
                        }
                    });
                }
            });
        })
    });

    var tableJaminanProses = $('#table-coba').DataTable({
        processing: true,
        ajax: {
            type: 'GET',
            url: "{{ route('dashboard.getDataJaminan') }}", //get
            data: function(data) {
                data.tgl_awal = null;
                data.tgl_akhir = null;
            }
        },
        columns: [{
                data: 'spk_no',
                title: 'No Dokumen',
                class: "center",
            },
            {
                data: 'project_name',
                title: "Nama Pekerjaan",
                class: "center",

            },
            {
                data: null,
                title: "Action",
                render: function(data, type, full, meta) {
                    return `<a href="{{ url('dashboard/getEditDetail/${full.id}') }}">
                              <i class="ion-ios-eye"></i>
                            </a>`
                },
                class: "center",

            },
        ],

        initComplete: function(settings, json) {
            $("#table-coba").wrap("<div style='overflow:auto; width:100%;position:relative;'></div>");
        },
    }).on('error.dt', function(e, settings, techNote, message) {
        // pesan('error', message);
        console.log('Error DataTables: ', message);
    });


    function edit(id, name) {
        $('#project_id').val(id);
        $('#project_name').val(name);
    }
</script>
