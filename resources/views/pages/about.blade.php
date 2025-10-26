@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4 text-center mb-4">About Thibitisha</h1>
            
            <div class="card">
                <div class="card-body">
                    <h3 class="text-primary">Our Mission</h3>
                    <p>Thibitisha is dedicated to creating a secure and efficient platform for verifying medical professionals' credentials. We aim to combat medical fraud and ensure that only qualified practitioners provide healthcare services.</p>
                    
                    <h3 class="text-primary mt-4">What We Do</h3>
                    <p>Our system provides:</p>
                    <ul>
                        <li><i class="bi bi-check-circle text-success"></i> Real-time verification of medical licenses</li>
                        <li><i class="bi bi-check-circle text-success"></i> Credential authentication for doctors and specialists</li>
                        <li><i class="bi bi-check-circle text-success"></i> Secure database of registered medical professionals</li>
                        <li><i class="bi bi-check-circle text-success"></i> Easy-to-use interface for institutions and patients</li>
                    </ul>
                    
                    <h3 class="text-primary mt-4">Benefits</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">For Patients</h5>
                                    <p class="card-text">Verify your healthcare provider's credentials with confidence and ensure you're receiving care from qualified professionals.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">For Institutions</h5>
                                    <p class="card-text">Streamline your hiring process with instant verification of medical credentials and reduce administrative overhead.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h3 class="text-primary mt-4">Our Commitment</h3>
                    <p>We are committed to maintaining the highest standards of data security and privacy while providing a reliable verification service that benefits the entire healthcare ecosystem.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection