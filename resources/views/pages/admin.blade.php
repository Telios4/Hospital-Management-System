@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4 text-center mb-4">Admin Panel</h1>
            
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <i class="bi bi-lock-fill text-primary" style="font-size: 4rem;"></i>
                        <h3>Administrative Access</h3>
                        <p class="text-muted">Backend system under development</p>
                    </div>
                    
                    <div class="admin-placeholder">
                        <div class="text-center">
                            <img src="https://via.placeholder.com/400x200/0A4275/ffffff?text=Admin+Dashboard+Placeholder" 
                                 alt="Admin Dashboard" 
                                 class="img-fluid rounded mb-4">
                            <p class="text-muted">The administrative backend will be implemented in future phases.</p>
                        </div>
                        
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h5 class="text-primary">Planned Features:</h5>
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-people text-secondary"></i> User management</li>
                                    <li><i class="bi bi-list-check text-secondary"></i> Verification requests monitoring</li>
                                    <li><i class="bi bi-graph-up text-secondary"></i> Analytics and reporting</li>
                                    <li><i class="bi bi-gear text-secondary"></i> System configuration</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-primary">Admin Tools:</h5>
                                <ul class="list-unstyled">
                                    <li><i class="bi bi-shield-lock text-secondary"></i> Role-based access control</li>
                                    <li><i class="bi bi-clock-history text-secondary"></i> Audit logs</li>
                                    <li><i class="bi bi-database text-secondary"></i> Data management</li>
                                    <li><i class="bi bi-bell text-secondary"></i> Notification system</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button class="btn btn-secondary btn-lg" disabled>
                            <i class="bi bi-tools"></i> Backend System Coming Soon
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection