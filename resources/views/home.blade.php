@extends('master')
@section('title', 'Home')
@section('content')
    <style>
        body, html {
            height: 100%;
        }
    </style>
    <div class="view" style="background-image: url('{{asset('img/background.jpg')}}'); background-repeat: no-repeat; background-size: cover; background-position: center center; height: 100%; background-blend-mode: darken;">
        <div class="d-flex flex-row justify-content-center align-items-center" style="height: 100%;">
            <div class="p-4 text-white">
                <h1>Welcome {{ Auth::user()->forename }} {{Auth::user()->surname}}.</h1>
            </div>
        </div>
    </div>
@endsection