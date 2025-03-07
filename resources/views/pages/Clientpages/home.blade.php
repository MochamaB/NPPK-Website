@extends('layouts.client')

@section('title', 'Welcome to Our Website')

@section('content')
@if(isset($slider) && $slider)
        {!! $slider->render() !!}
    @endif

@endsection
