@extends('layouts.client')

@section('title', 'Welcome to Our Website')

@section('content')
<div class="home-page">
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Welcome to Our Website</h1>
                    <p>Your compelling tagline goes here</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Section -->
    <section class="featured-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-box">
                        <h3>Feature 1</h3>
                        <p>Description of feature 1</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h3>Feature 2</h3>
                        <p>Description of feature 2</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h3>Feature 3</h3>
                        <p>Description of feature 3</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
