<script type="text/javascript">
    $(document).ready(function() {
        $('#table-coba').DataTable();

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
                success: function(response) {

                }
            });
        })
    });


    function edit(id, name) {
        $('#project_id').val(id);
        $('#project_name').val(name);
    }
</script>
