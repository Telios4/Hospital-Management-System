@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="hero-section">
    <div class="container">
        <img src="{{ asset('images/logo.png') }}" alt="Thibitisha Logo" style="height: 100px; margin-bottom: 20px;">
        <h1 class="display-4 fw-bold">Welcome to Thibitisha</h1>
        <p class="lead">Trusted Medical Professional Verification System</p>
        <p>Ensuring authenticity in healthcare through secure verification</p>
        <a href="/verify" class="btn btn-light btn-lg mt-3">Start Verification</a>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-shield-check text-primary" style="font-size: 2rem;"></i>
                    <h5 class="card-title text-primary mt-2">Secure</h5>
                    <p class="card-text">Advanced security measures to protect medical data and ensure authenticity.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-lightning-charge text-primary" style="font-size: 2rem;"></i>
                    <h5 class="card-title text-primary mt-2">Fast</h5>
                    <p class="card-text">Quick verification process that saves time for both doctors and institutions.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="bi bi-award text-primary" style="font-size: 2rem;"></i>
                    <h5 class="card-title text-primary mt-2">Reliable</h5>
                    <p class="card-text">Trusted by medical institutions nationwide for credential verification.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection