<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="{{ URL::to('/') }}" class="brand-link">
      <!--begin::Brand Image-->
      <img
        src="{{ asset('adminlte/assets/img/thibitisha.png') }}"
        alt="Thibitisha Logo"
        class="brand-image opacity-75 shadow"
      />
      <!--end::Brand Image-->
      <!--begin::Brand Text-->
      <span class="brand-text fw-light">Thibitisha</span>
      <!--end::Brand Text-->
    </a>
    <!--end::Brand Link-->
  </div>
  <!--end::Sidebar Brand-->
  
  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <ul
        class="nav sidebar-menu flex-column"
        data-lte-toggle="treeview"
        role="navigation"
        aria-label="Main navigation"
        data-accordion="false"
      >
        {{-- Dashboard --}}
        <li class="nav-item">
          <a href="{{ URL::to('/') }}" class="nav-link active">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        {{-- User Management Section --}}
        <li class="nav-header">User Management</li>
        
        {{-- Roles --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-shield-lock"></i>
            <p>
              Roles
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>All Roles</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ URL::to('role/add') }}" class="nav-link">
                <i class="nav-icon bi bi-circle"></i>
                <p>Add Role</p>
              </a>
            </li>
          </ul>
        </li>
        
        
        {{-- Users --}}
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-people"></i>
            <p>Users</p>
          </a>
        </li>
        
        {{-- Settings --}}
        <li class="nav-header">Settings</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-gear"></i>
            <p>System Settings</p>
          </a>
        </li>
      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->