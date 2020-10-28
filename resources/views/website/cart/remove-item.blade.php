@push('script')

    <script src="{{ asset('assets/js/change-quantity.custom.js') }}"></script>
    <script>
        var length = $('.qty-box').length,
            ids = [];
        // set Cart ids as array
        for (let i = 0; i < length; i++) {
            ids.push($($(".qty-box input")[i]).attr('cart-id'));
        }
        $(document).ready(function () {
            ids.forEach(function (id) {

                $("#remove-" + id).on('click', function (e) {
                    e.preventDefault();
                    var rowId = ($("#qty-" + id).attr('row-id'));

                    $.ajax({
                        url: "/cart/destroy/" + rowId,
                        method: "PATCH",
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function (response) {
                            if (response.success) {
                                // refresh the content of the table
                                $("#cart-dropdown").load(location.href + " #cart-dropdown");
                                $("#data-" + id).remove();
                                $("#total").load(location.href + " #total");

                                $.notify({
                                    icon: 'fa fa-check',
                                    title: 'Success!',
                                    message: ' Item was removed successfully!'
                                }, {
                                    element: 'body',
                                    position: null,
                                    type: "success",
                                    allow_dismiss: true,
                                    newest_on_top: false,
                                    showProgressbar: true,
                                    placement: {
                                        from: "top",
                                        align: "right"
                                    }});
                            } else {
                                $.notify({
                                    icon: 'fa fa-check',
                                    title: 'Sorry!',
                                    message: ' There are an error'
                                }, {
                                    element: 'body',
                                    position: null,
                                    type: "danger",
                                    allow_dismiss: true,
                                    newest_on_top: false,
                                    showProgressbar: true,
                                    placement: {
                                        from: "top",
                                        align: "right"
                                    }});
                            }
                        }
                    });
                });
            });
        });

    </script>
@endpush
