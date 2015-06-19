@extends('layouts.master')

@section('title', 'New Pin | Hunger Network')

@section('content')

    New pin page

    <div class="map__wrapper">
        <div class="map__overlay"></div>
        <div id="google-map" class="map" v-on="click: createPin"></div>
    </div>

    <script>
        var map = new Vue({

            el: '#google-map',

            // Data for this view
            data: {
                pin: '',
                map: new GMaps({
                    div: '#google-map',
                    lat: -12.043333,
                    lng: -77.028333
                })
            },

            // Methods for this view
            methods: {

                createPin: function(e) {
                    console.log('hello mummy');
                }

            }


        });
    </script>

@stop
