@extends('layouts.master')

@section('title', 'New Pin | Hunger Network')

@section('content')
    <div class="map__wrapper">
        <div class="map-overlay">
            <form action="{{route('pins.store')}}" method="post" id="suggest" class="form form--map-suggest">
                <h2 class="map-overlay__heading">What do you want to suggest for {{ $map->user->name }}? He wants to eat {{ $map->looking_for }}.</h2>
                <div class="form__row">
                    <p>Click on the map to select a suggestion</p>
                </div>
                <div class="form__row">
                    <label for="friend_name" class="form__label"><span>Name</span></label>
                    <input name="friend_name" class="form__input" type="text" placeholder="Joe Bloggs"/>
                </div>
                <div class="form__row">
                    <label for="comment" class="form__label"><span>Comment</span></label>
                    <textarea name="comment" class="form__input" placeholder="Leave some information about this place"></textarea>
                </div>
                <div class="form__row">
                    <input type="submit" name="submit" value="Submit Suggestion" v-on="click: submit">
                </div>
            </form>
        </div>
        <div id="google-map" class="map"></div>
    </div>

    <script>
        var suggest = new Vue({
            el: '#suggest',

            data: {
                friend_name: '',
                comment: '',
                lat: 0,
                lng: 0
            },

            methods: {

                submit: function() {

                    var data = {
                        friend_name: this.friend_name,
                        comment: this.comment,
                        lat: this.lat,
                        lng: this.lng
                    };

                    $.post('{{ route('pins.store') }}', data, 'json')
                        .done(function(data) {
                            console.log(data);
                        });

                }

            }
        });
        var Map = new Vue({
            el: '#google-map',

            // Data for this view
            data: {
                pin: false,
                map: new GMaps({
                    div: '#google-map',
                    lat: {{ $map->lat }},
                    lng: {{ $map->lng }}
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

        Map.map.drawCircle({
            lat: {{ $map->lat }},
            lng: {{ $map->lng }},
            radius: 50,
            fillColor: '#000',
            strokeColor: '#fff'
        });

    </script>

@stop
