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



