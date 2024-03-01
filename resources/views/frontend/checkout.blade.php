@extends('frontend.layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('frontend/css/radio.css') }}">
    <script src="https://use.fontawesome.com/b4564248e6.js"></script>
@endsection

@section('content')
    @livewire('frontend.checkout')
@endsection
