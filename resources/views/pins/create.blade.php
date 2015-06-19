@extends('layouts.master')

@section('title', 'New Pin | Hunger Network')

@section('content')

    New pin page

    <div class="map__wrapper">
        <div class="map__overlay"></div>
        <div id="google-map" class="map" v-on="click: createPin"></div>
    </div>

    <script>
        var Map = new Vue({

            el: '#google-map',

            // Data for this view
            data: {
                pin: false,
                map: new GMaps({
                    div: '#google-map',
                    lat: -12.043333,
                    lng: -77.028333
                })
            },

            methods: {

                onClick: function(event) {

                    // Grab click locations
                    var lat = event.latLng.lat(),
                        lng = event.latLng.lng();

                    // Build places request
                    var location = new google.maps.LatLng(lat, lng);
                    var request = {
                        location: location,
                        radius: 10,
                        types: ['store']
                    };

                    // Default marker to add
                    var marker = {
                        lat: lat,
                        lng: lng,
                        title: 'Custom Marker'
                    };

                    var self = this;

                    // Make a request to the places API to see if we can
                    // find a nearby place.
                    var service = new google.maps.places.PlacesService(this.map.map);
                    service.nearbySearch(request, function(results, status) {

                        if (status == google.maps.places.PlacesServiceStatus.OK) {

                            if(results.length > 1) {
                                var place = results[0];

                                marker = {
                                    lat: place.geometry.location.lat(),
                                    lng: place.geometry.location.lng(),
                                    title: 'Place'
                                };
                            }

                        }

                        self.map.removeMarkers();
                        self.map.addMarker(marker);
                        self.pin = marker;

                    });

                }

            }

        });

        Map.map.on('click', Map.onClick);
    </script>

@stop
