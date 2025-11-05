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
              <a href="{{ URL::to('roles') }}" class="nav-link">
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
          <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users*') ? 'active' :"";}}">
            <i class="nav-icon bi bi-people"></i>
            <p>Users</p>
          </a>
        </li>

        {{-- User Management Section --}}
        <li class="nav-header">Practitioner Management</li>

        {{-- Practitioners --}}
       <li class="nav-item">
          <a href="{{ route('practitioners.index') }}" class="nav-link {{ request()->is('Practitioners*') ? 'active' :"";}}">
            <i class="nav-icon bi bi-person-check"></i>
            <p>Practitioners</p>
          </a>
        </li>


        {{-- User Management Section --}}
        <li class="nav-header">Administration </li>

        {{--Status --}}
       <li class="nav-item">
          <a href="{{ route('Statuses.index') }}" class="nav-link {{ request()->is('Statuses*') ? 'active' :"";}}">
            <i class="nav-icon bi bi-info-circle"></i>
            <p>Statuses</p>
          </a>
        </li>

        {{--Specialities--}}
       <li class="nav-item">
          <a href="{{ route('Specialities.index') }}" class="nav-link {{ request()->is('Specialities*') ? 'active' :"";}}">
            <i class="nav-icon bi bi-star"></i>
            <p>Specialities</p>
          </a>
        </li>

        {{-- Sub Specialities --}}
       <li class="nav-item">
          <a href="{{ route('subspecialities.index') }}" class="nav-link {{ request()->is('subspecialities*') ? 'active' :"";}}">
            <i class="nav-icon bi bi-star-half"></i>
            <p>Subspecialities</p>
          </a>
        </li>

        {{-- Institutions --}}
       <li class="nav-item">
          <a href="{{ route('institutions.index') }}" class="nav-link {{ request()->is('Institutions*') ? 'active' :"";}}">
            <i class="nav-icon bi bi-building"></i>
            <p>Institutions</p>
          </a>
        </li>

        {{-- Degrees --}}
       <li class="nav-item">
          <a href="{{ route('degrees.index') }}" class="nav-link {{ request()->is('Degrees*') ? 'active' :"";}}">
            <i class="nav-icon bi bi-mortarboard"></i>
            <p>Degrees</p>
          </a>
        </li>

        
        {{-- Settings --}}
        <li class="nav-header">Settings</li>
        <li class="nav-item">
          <a href="{{ route('settings.index') }}" class="nav-link {{ request()->is('settings*') ? 'active' :"";}}">
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