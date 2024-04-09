@extends('layout')

@section('title', 'Test')

@section('css')
@stop

@section('header')
    @include('partial.header')
@stop

@section('sidebar')
    @include('partial.sidebar')
    @include('partial.slider')
@stop

@section('content')
    <div class="main-content">
       @include('partial.content')
    </div>
@stop

@section('footer')
    @include('partial.footer')
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>
@stop
