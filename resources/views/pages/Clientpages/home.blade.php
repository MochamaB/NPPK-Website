@extends('layouts.client')

@section('title', 'Welcome to Our Website')

@section('content')
    @if(isset($slider) && $slider)
        {!! $slider->render() !!}
    @endif

    @if(isset($whatWeDo) && $whatWeDo)
        {!! $whatWeDo->render() !!}
    @endif

    @if(isset($counterStats) && $counterStats)
        {!! $counterStats->render() !!}
    @endif

   

    @if(isset($magazine) && $magazine)
        {!! $magazine->render() !!}
    @endif
@endsection
