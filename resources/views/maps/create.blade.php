@extends('layouts.master')

@section('title', 'New Hunger Map | Hunger Network')

@section('content')
    <div class="map__wrapper">
        <div class="map-overlay">
            <form action="{{route('maps.store')}}" class="form form--map-create">
                <h2 class="map-overlay__heading">What do you want to eat?</h2>
                <div class="form__row">
                    <label for="food_type" class="form__label"><span>Cuisine</span></label>
                    <input name="food_type" class="form__input" type="text" placeholder="Chinese"/>
                </div>
            </form>

        </div>

        <div id="google-map" class="map" v-on="click: createPin"></div>
    </div>

    <script>
        var UI = (function() {
            var Overlay = new Vue({
                el: '.map-overlay',
            });

            var Map = new Vue({
                el: '#google-map',
                data: {
                    map: new GMaps({
                        div: '#google-map',
                        lat: -12.043333,
                        lng: -77.028333
                    })
                }
            });

            return {
                'map': Map,
                'overlay': Overlay
            };
        });

        GMaps.geolocate({
            success: function (position) {
                var map = UI().map.map,
                    lat = position.coords.latitude,
                    lng = position.coords.longitude;

                map.setCenter(lat, lng);

                map.addMarker({
                    'lat': lat,
                    'lng': lng,
                    'title': 'Hello'
                });

                map.setCenter(lat, lng);
            },

            failure: function () {
                alert('We couldn\'t retrieve your location, so fuck off out of here.');
            }
        });
    </script>
@stop