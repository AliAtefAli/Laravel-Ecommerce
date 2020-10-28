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

                $('#quantity-right-plus-' + id).on('click', function () {
                    var $qty = $("#qty-" + id);
                    var currentVal = parseInt($("#qty-" + id).val());

                    if (!isNaN(currentVal)) {
                        $qty.val(currentVal + 1).trigger('change');
                    }
                });
                $('#quantity-left-minus-' + id).on('click', function () {
                    var $qty = $("#qty-" + id);
                    var _val = parseInt($("#qty-" + id).val());
                    if (_val == '1') {
                        var _removeCls = $(this).parents('.cart_qty');
                        $(_removeCls).removeClass("open");
                    }
                    var currentVal = parseInt($qty.val());
                    if (!isNaN(currentVal) && currentVal > 1) {
                        $qty.val(_val - 1).trigger('change');
                    }
                })
                $("#qty-" + id).change(function (e) {
                    e.preventDefault();
                    var updateQuantity = parseInt($("#qty-" + id).val()),
                        rowId = ($("#qty-" + id).attr('row-id'));

                    $.ajax({
                        url: "/cart/update/" + rowId,
                        method: "PUT",
                        data: {
                            _token: '{{ csrf_token() }}',
                            productId: id,
                            rowId: rowId,
                            quantity: updateQuantity
                        },
                        success: function (response) {
                            if (response.success) {
                                $("#cart-dropdown").load(location.href + " #cart-dropdown");
                                $("#qty-" + id).load(location.href + " #qty-" + id);
                                $("#price-" + id).load(location.href + " #price-" + id);
                                $("#total").load(location.href + " #total");

                                $.notify({
                                    icon: 'fa fa-check',
                                    title: 'Success!',
                                    message: 'Quantity was updated successfully!'
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
                                    message: 'this is quantity not available'
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
