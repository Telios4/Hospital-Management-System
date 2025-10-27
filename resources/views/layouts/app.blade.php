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
            --primary: #8B4513;      /* SaddleBrown - Main brown */
            --secondary: #D2691E;    /* Chocolate - Lighter brown */
            --background: #FDF5E6;   /* OldLace - Warm light background */
            --accent: #654321;       /* DarkBrown - Dark accent */
            --light-brown: #DEB887;  /* BurlyWood - Light brown */
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
            border-bottom: 3px solid var(--primary);
        }
        
        .navbar-brand {
            font-weight: bold;
            color: var(--accent) !important;
        }
        
        .nav-link {
            color: var(--accent) !important;
            font-weight: 500;
            position: relative;
            padding: 8px 16px !important;
            transition: all 0.3s ease;
            margin: 0 5px;
        }
        
        .nav-link:hover {
            color: var(--primary) !important;
        }
        
        /* Active state with brown line */
        .nav-link.active {
            color: var(--primary) !important;
            font-weight: 600;
        }
        
        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 16px;
            right: 16px;
            height: 3px;
            background-color: var(--primary);
            border-radius: 2px;
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
            border-top: 3px solid var(--primary);
        }
        
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(139, 69, 19, 0.1);
            margin-bottom: 20px;
            transition: transform 0.2s;
            border-left: 4px solid var(--primary);
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(139, 69, 19, 0.15);
        }
        
        .card-header {
            background-color: var(--light-brown);
            color: var(--accent);
            font-weight: bold;
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-primary:hover {
            background-color: var(--accent);
            border-color: var(--accent);
        }
        
        .btn-warning {
            background: linear-gradient(135deg, #FFD700, #FFA500);
            border: 2px solid #FF8C00;
            color: #8B4513;
            font-weight: bold;
        }
        
        .btn-warning:hover {
            background: linear-gradient(135deg, #FFA500, #FF8C00);
            border-color: #FF6347;
            color: #654321;
        }
        
        .btn-secondary {
            background-color: var(--secondary);
            border-color: var(--secondary);
        }
        
        .text-primary {
            color: var(--primary) !important;
        }
        
        .verification-placeholder, .admin-placeholder {
            padding: 20px;
            background-color: #FAF0E6; /* Linen - light warm background */
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid var(--secondary);
        }
        
        .home-logo {
            height: 100px;
            width: auto;
            margin-bottom: 20px;
        }
        
        /* Medical icons in brown theme */
        .bi-shield-check, .bi-lightning-charge, .bi-award {
            color: var(--primary);
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
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="/about">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('verify') ? 'active' : '' }}" href="/verify">
                            Verification
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mkubwa') ? 'active' : '' }}" href="/mkubwa">
                            Admin Panel
                        </a>
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