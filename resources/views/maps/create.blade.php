@extends('layouts.master')

@section('title', 'New Hunger Map | Hunger Network')

@section('content')
    <div class="map__wrapper">
        <div class="map-overlay">
            <h2 class="map-overlay__heading">What do you want to eat?</h2>

            <form action="{{route('maps.store')}}" class="form form--map-create">
                <div class="form__row">
                    <label for="food_type" class="form__label"><span>Cuisine</span></label>
                    <input name="food_type" class="form__input" type="text" placeholder="Chinese"/>
                </div>
            </form>

        </div>

        <div id="google-map" class="map" v-on="click: createPin"></div>
    </div>

    <script>
        var map = new Vue({
            el: '#google-map',
            data: {
                pin: '',
                map: new GMaps({
                    div: '#google-map',
                    lat: -12.043333,
                    lng: -77.028333
                })
            },
            methods: {
                createPin: function(e) {
                    console.log('hello mummy');
                }
            }
        });
    </script>
@stop