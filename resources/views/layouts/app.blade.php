<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Thibitisha') - Medical Verification System</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Custom Styles -->
    <style>
        :root {
            --primary: #006EFD;
            --secondary: #20C997;
            --background: #F8F9FA;
            --accent: #0A4275;
        }
        
        body {
            background-color: var(--background);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .navbar-brand {
            font-weight: bold;
            color: var(--accent) !important;
        }
        
        .nav-link {
            color: var(--accent) !important;
            font-weight: 500;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
        }
        
        .logo {
            height: 40px;
            width: auto;
            margin-right: 10px;
        }
        
        .hero-section {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        
        footer {
            background-color: var(--accent);
            color: white;
            padding: 20px 0;
            margin-top: auto;
        }
        
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            transition: transform 0.2s;
        }
        
        .card:hover {
            transform: translateY(-2px);
        }
        
        .verification-placeholder, .admin-placeholder {
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            margin: 20px 0;
        }
        
        .home-logo {
            height: 100px;
            width: auto;
            margin-bottom: 20px;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Thibitisha Logo" class="logo">
                Thibitisha
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/verify">Verification</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/mkubwa">Admin Panel</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <small>&copy; {{ date('Y') }} Thibitisha - Medical Verification System. All rights reserved.</small>
        </div>
    </footer>

    <!-- Bootstrap & JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>