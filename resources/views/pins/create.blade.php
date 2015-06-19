@extends('layouts.master')

@section('title', 'New Pin | Hunger Network')

@section('content')
    <div class="map__wrapper">
        <div class="map-overlay">
            <h2 class="map-overlay__heading">What do you want to suggest for Craig? He wants to eat Chinese.</h2>
            <div class="form__row">
                <p>Click on the map to select a suggestion for him</p>
            </div>
            <form action="{{route('maps.store')}}" class="form form--map-create">
            </form>
        </div>
        <div id="google-map" class="map" v-on="click: createPin"></div>
    </div>

    <script>
        var constructor = (function() {
            var Map = new Vue({
                el: '#google-map',

                // Data for this view
                data: {
                    pin: false,
                    map: new GMaps({
                        div: '#google-map',
                        lat: 0,
                        lng: 0
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
                            types: ['food', 'restaurant', 'cafe', 'bar']
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
            return Map;
        });

        GMaps.geolocate({
            success: function(position) {
                var map = constructor().map;
                var lat = position.coords.latitude,
                    lng = position.coords.longitude;

                map.setCenter(lat, lng);
                map.drawCircle({
                    lat: lat,
                    lng: lng,
                    radius: 50,
                    fillColor: '#000',
                    strokeColor: '#fff'
                });
            },
            error: function(error) {
                alert('Geolocation failed: '+error.message);
            },
            not_supported: function() {
                alert("Your browser does not support geolocation");
            }
        });

    </script>

@stop
