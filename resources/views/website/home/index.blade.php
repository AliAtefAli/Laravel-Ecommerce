@extends('website.layouts.master')

@section('content')

    @include('website.home.partials.home-slider')

    @include('website.home.partials.tap-product')

    @include('website.home.partials.services')

    @include('website.home.partials.blog-section')

@endsection

@push('script')
    <script>

      $(".add-to-cart").click(function (e) {
        e.preventDefault();
        var element = $(this);
        var id = element.attr("data-id");

        $.ajax({
          url: "cart/add/" + id,
          method: "POST",

          data: {
            _token: '{{ csrf_token() }}',
            id: id,
          },

          success: function (response) {
              $.notify({
                  icon: 'fa fa-check',
                  title: 'Success!',
                  message: 'Item Successfully added to your cart'
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
                  },
                  offset: 20,
                  spacing: 10,
                  z_index: 1031,
                  delay: 1000,
                  animate: {
                      enter: 'animated fadeInDown',
                      exit: 'animated fadeOutUp'
                  }});
              // Add product to cart-dropdown
              $("#cart-dropdown").load(location.href + " #cart-dropdown");

              toastr.success(response.success, {
              timeOut: "50000",
            })
          },
          error: function (response) {
            toastr.warning(response.error, "Progress Bar", {
              progressBar: !0
            });
          },
        });
      });
    </script>
@endpush



