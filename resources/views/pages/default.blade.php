@extends('layouts.client')

@section('title', $page->title)
@section('meta_description', $page->meta_description)
@section('meta_keywords', $page->meta_keywords)

@section('content')
    {{-- Page header/title section if needed --}}


    {{-- Render header section widgets if any --}}
    <div class="header-widgets">
        {!! $page->renderSection('header') !!}
    </div>
    
    {{-- Render main section widgets --}}
    <div class="main-widgets">
        {!! $page->renderSection('main') !!}
    </div>
    
    {{-- Render footer section widgets if any --}}
    <div class="footer-widgets">
        {!! $page->renderSection('footer') !!}
    </div>
@endsection
