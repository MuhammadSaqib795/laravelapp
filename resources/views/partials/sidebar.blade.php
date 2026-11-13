<aside class="left-sidebar">
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
        <img src="{{ asset('images/logos/logo.svg') }}" alt="Flexy" />
      </a>
      <button class="close-btn d-xl-none d-block sidebartoggler btn p-0 border-0" id="sidebarCollapse"
              type="button" aria-label="Close navigation">
        <i class="ti ti-x fs-6" aria-hidden="true"></i>
      </button>
    </div>

    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <span class="hide-menu">Home</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->routeIs('dashboard', 'flexy.dashboard') ? 'active' : '' }}"
             href="{{ route('dashboard') }}">
            <i class="ti ti-layout-dashboard" aria-hidden="true"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->routeIs('users.index') ? 'active' : '' }}"
             href="{{ route('users.index') }}">
            <i class="ti ti-users" aria-hidden="true"></i>
            <span class="hide-menu">Users</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>