<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item d-block d-xl-none">
        <button class="nav-link sidebartoggler border-0 bg-transparent" id="headerCollapse" type="button"
                aria-label="Toggle navigation" aria-controls="main-wrapper">
          <i class="ti ti-menu-2" aria-hidden="true"></i>
        </button>
      </li>
      <li class="nav-item dropdown">
        <button class="nav-link border-0 bg-transparent" type="button" id="drop1" data-bs-toggle="dropdown"
                aria-expanded="false" aria-label="Notifications">
          <i class="ti ti-bell" aria-hidden="true"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
          <div class="message-body">
            <p class="dropdown-item mb-0 text-muted">You are all caught up.</p>
          </div>
        </div>
      </li>
    </ul>

    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
        <li class="nav-item dropdown">
          <button class="nav-link border-0 bg-transparent" type="button" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false" aria-label="Open account menu">
            <img src="{{ asset('images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
          </button>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
              <a href="{{ route('users.index') }}" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-user fs-6"></i>
                <p class="mb-0 fs-3">Users</p>
              </a>
              <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-layout-dashboard fs-6"></i>
                <p class="mb-0 fs-3">Dashboard</p>
              </a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>