@extends('layouts.master')

@section('title', 'Login | Hunger Network')

@section('content')
    <h1>Welcome</h1>
    <a class="button button--facebook" href="{{ $loginUrl }}">Login with Facebook</a>
@stop
