@extends('website.layouts.master')

@section('content')

    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="{{ route('checkout.store') }}" method="POST">
                        <div class="row">
                            @csrf
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="checkout-title">
                                    <h3>Billing Details</h3>
                                </div>
                                <div class="row check-out">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="name" value="{{ auth()->user()->name }}"
                                               placeholder="Name">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="phone" value="{{ auth()->user()->phone }}"
                                               placeholder="Phone">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="email" value="{{ auth()->user()->email }}"
                                               placeholder="Email Address">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input id="address-input" type="text" name="address"
                                               value="{{ auth()->user()->address }}"
                                               placeholder="Address">
                                    </div>

                                    <div id="map" class="form-group col-md-12 col-sm-12 col-xs-12"
                                         style="width: 500px; height: 300px;">
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">

                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box">
                                            <div>Product <span>Total</span></div>
                                        </div>
                                        <ul class="qty">
                                            @foreach(Cart::content() as $cart)
                                                <li>{{ $cart->name }} × {{ $cart->qty }}
                                                    <span>${{ $cart->price }}</span>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <ul class="total">
                                            <li>Total <span class="count">${{ Cart::total() }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="payment-box">
                                        <div class="upper-box">
                                            <div class="payment-options">
                                                <ul>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment_method"
                                                                   value="on_delivey" id="payment-2"
                                                                   checked="checked">
                                                            <label for="payment-2">Cash On Delivery<span
                                                                    class="small-text">Please send a check to Store
                                                                    Name, Store Street, Store Town, Store State /
                                                                    County, Store Postcode.</span></label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option">
                                                            <input type="radio" name="payment_method"
                                                                   value="payment" id="payment-1">
                                                            <label for="payment-1">Check Payments<span
                                                                    class="small-text">Please send a check to Store
                                                                    Name, Store Street, Store Town, Store State /
                                                                    County, Store Postcode.</span></label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="radio-option paypal">
                                                            <input type="radio" name="payment_method" value="paypal"
                                                                   id="payment-3">
                                                            <label for="payment-3">PayPal<span class="image"><img
                                                                        src="../assets/images/paypal.png"
                                                                        alt=""></span></label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <button class="btn btn-solid">Place order</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
@endsection


@push('js')

    <script>
        $("#address-input").focusin(function () {
            $(this).val('');
        });

        $('#latitude').val('');
        $('#longitude').val('');


        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.

        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initMap() {
            let map = new google.maps.Map(document.getElementById("map"), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8,
            });

            // move pin and current location
            infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };
                    map.setCenter(pos);
                    var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(pos),
                        map: map,
                        title: 'Your location'
                    });
                    markers.push(marker);
                    marker.addListener('click', function () {
                        geocodeLatLng(geocoder, map, infoWindow, marker);
                    });
                    // to get current position address on load
                    google.maps.event.trigger(marker, 'click');
                }, function () {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                console.log('Your Browser doesn\'t support Geolocation');
                handleLocationError(false, infoWindow, map.getCenter());
            }

            var geocoder = new google.maps.Geocoder();
            google.maps.event.addListener(map, 'click', function (event) {
                SelectedLatLng = event.latLng;
                geocoder.geocode({
                    'latLng': event.latLng
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            deleteMarkers();
                            addMarkerRunTime(event.latLng);
                            SelectedLocation = results[0].formatted_address;
                            console.log(results[0].formatted_address);
                            splitLatLng(String(event.latLng));
                            $("#address-input").val(results[0].formatted_address);
                        }
                    }
                });
            });

            function geocodeLatLng(geocoder, map, infowindow, markerCurrent) {
                var latlng = {lat: markerCurrent.position.lat(), lng: markerCurrent.position.lng()};
                /* $('#branch-latLng').val("("+markerCurrent.position.lat() +","+markerCurrent.position.lng()+")");*/
                $('#latitude').val(markerCurrent.position.lat());
                $('#longitude').val(markerCurrent.position.lng());

                geocoder.geocode({'location': latlng}, function (results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            map.setZoom(8);
                            var marker = new google.maps.Marker({
                                position: latlng,
                                map: map
                            });
                            markers.push(marker);
                            infowindow.setContent(results[0].formatted_address);
                            SelectedLocation = results[0].formatted_address;
                            $("#address-input").val(results[0].formatted_address);

                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                });
                SelectedLatLng = (markerCurrent.position.lat(), markerCurrent.position.lng());
            }

            function addMarkerRunTime(location) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markers.push(marker);
            }

            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            function clearMarkers() {
                setMapOnAll(null);
            }

            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }

            // Create the search box and link it to the UI element.
            var input = document.getElementById('address-input');
            $("#address-input").placeholder("Search here");
            var searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function () {
                searchBox.setBounds(map.getBounds());
            });

            var markers = [];
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function (marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function (place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(100, 100),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));


                    $('#latitude').val(place.geometry.location.lat());
                    $('#longitude').val(place.geometry.location.lng());

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }

        function splitLatLng(latLng) {
            var newString = latLng.substring(0, latLng.length - 1);
            var newString2 = newString.substring(1);
            var trainindIdArray = newString2.split(',');
            var lat = trainindIdArray[0];
            var Lng = trainindIdArray[1];

            $("#latitude").val(lat);
            $("#longitude").val(Lng);
        }

    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?
    key=AIzaSyBFMTEaPmE_DXK8L9UtNo8ZELZCzPVpROU
    &callback=initMap&language=en&region=EG
         async defer" type="text/javascript"></script>
@endpush
