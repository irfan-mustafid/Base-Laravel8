<script>
    $(document).ready(function() {
        $('#login').on('click', function() {
            username = $('#username').val();
            password = $('#password').val();
            $.ajax({
                type: "POST",
                url: "{{ route('login.auth') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    username: username,
                    password: password,
                },
                dataType: "json",
                success: function(data) {
                    if (data.status == true) {
                        window.location.href = data.redirect;
                    } else {
                        $.alert({
                            title: 'Peringatan... !',
                            content: data.pesan,
                            buttons: {
                                Ok: {
                                    btnClass: 'btn-warning',
                                    action: function() {
                                        window.location.href = data.redirect;

                                    }
                                }
                            }
                        });
                    }
                }
            });
        })
    });
</script>
