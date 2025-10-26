@extends('layouts.app')

@section('title', 'Verification')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4 text-center mb-4">Doctor Verification</h1>
            
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="bi bi-search-heart text-primary" style="font-size: 4rem;"></i>
                        <h3>Verify Medical Credentials</h3>
                        <p class="text-muted">Enter the doctor's information to verify their credentials</p>
                    </div>
                    
                    <div class="verification-placeholder">
                        <div class="text-center">
                            <img src="https://via.placeholder.com/400x200/006EFD/ffffff?text=Verification+Interface+Placeholder" 
                                 alt="Verification System" 
                                 class="img-fluid rounded mb-4">
                            <p class="text-muted">This is where the verification interface will be implemented.</p>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h5 class="text-primary">Features Include:</h5>
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-check-circle text-success"></i> License number verification</li>
                                    <li><i class="bi bi-check-circle text-success"></i> Medical board certification check</li>
                                    <li><i class="bi bi-check-circle text-success"></i> Specialization validation</li>
                                    <li><i class="bi bi-check-circle text-success"></i> Practice status confirmation</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-primary">Verification Types:</h5>
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-person-check text-info"></i> Doctor Registration</li>
                                    <li><i class="bi bi-building text-info"></i> Hospital Affiliation</li>
                                    <li><i class="bi bi-file-medical text-info"></i> License Status</li>
                                    <li><i class="bi bi-shield-check text-info"></i> Certificate Validation</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button class="btn btn-primary btn-lg" disabled>
                            <i class="bi bi-gear"></i> Verification System Coming Soon
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection