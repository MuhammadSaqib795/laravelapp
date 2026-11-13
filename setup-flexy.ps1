if (-not (Test-Path "artisan")) {
    Write-Host "ERROR: Yeh script Laravel project ke root folder se chalayein (jahan artisan file hai)." -ForegroundColor Red
    exit 1
}

$utf8 = New-Object System.Text.UTF8Encoding($false)

function Write-File($path, $content) {
    $dir = Split-Path $path -Parent
    if ($dir -and -not (Test-Path $dir)) { New-Item -ItemType Directory -Force $dir | Out-Null }
    if (Test-Path $path) { Copy-Item $path "$path.bak" -Force }
    [System.IO.File]::WriteAllText((Join-Path (Get-Location) $path), $content, $utf8)
    Write-Host "Created: $path" -ForegroundColor Green
}

# 1. app.scss
Write-File "resources\scss\app.scss" @'
@import url("https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap");

@import "flexy/variables/variables";

@import "bootstrap/scss/bootstrap";

@import "flexy/variables/theme-variables";

@import "simplebar/dist/simplebar.css";
@import "../css/tabler-icons/tabler-icons.css";

@import "flexy/layouts/sidebar";
@import "flexy/layouts/header";
@import "flexy/layouts/layouts";
@import "flexy/component/reboot";
@import "flexy/component/card";
@import "flexy/utilities/icon-size";
@import "flexy/pages/dashboard1";
'@

# 2. jquery-global.js
Write-File "resources\js\jquery-global.js" @'
import $ from 'jquery';
window.$ = window.jQuery = $;
'@

# 3. app.js
Write-File "resources\js\app.js" @'
import './jquery-global';
import * as bootstrap from 'bootstrap';
window.bootstrap = bootstrap;
import 'simplebar';
import 'iconify-icon';
import './theme/sidebarmenu';
import './theme/app.min';
'@

# 4. dashboard.js ke upar 2 lines
$dash = "resources\js\pages\dashboard.js"
if (Test-Path $dash) {
    $c = [System.IO.File]::ReadAllText((Join-Path (Get-Location) $dash))
    if ($c -notmatch 'window\.ApexCharts') {
        $header = "import ApexCharts from 'apexcharts';`r`nwindow.ApexCharts = ApexCharts;`r`n`r`n"
        [System.IO.File]::WriteAllText((Join-Path (Get-Location) $dash), $header + $c, $utf8)
        Write-Host "Updated: $dash" -ForegroundColor Green
    }
} else {
    Write-Host "WARNING: $dash nahi mili" -ForegroundColor Yellow
}

# 5. vite.config.js
Write-File "vite.config.js" @'
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
                'resources/js/pages/dashboard.js',
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                silenceDeprecations: ['import', 'global-builtin', 'color-functions', 'mixed-decls'],
            },
        },
    },
});
'@

# 6a. sidebar
Write-File "resources\views\partials\sidebar.blade.php" @'
<aside class="left-sidebar">
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="{{ url('/') }}" class="text-nowrap logo-img">
        <img src="{{ asset('images/logos/logo.svg') }}" alt="Logo" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-6"></i>
      </div>
    </div>

    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
          <span class="hide-menu">Home</span>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
            <i class="ti ti-atom"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('users*') ? 'active' : '' }}" href="#">
            <i class="ti ti-users"></i>
            <span class="hide-menu">Users</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
'@

# 6b. header
Write-File "resources\views\partials\header.blade.php" @'
<header class="app-header">
  <nav class="navbar navbar-expand-lg navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item d-block d-xl-none">
        <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
          <i class="ti ti-menu-2"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="ti ti-bell"></i>
          <div class="notification bg-primary rounded-circle"></div>
        </a>
        <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
          <div class="message-body">
            <a href="javascript:void(0)" class="dropdown-item">Item 1</a>
            <a href="javascript:void(0)" class="dropdown-item">Item 2</a>
          </div>
        </div>
      </li>
    </ul>

    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
        <li class="nav-item dropdown">
          <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="ti ti-user fs-6"></i>
                <p class="mb-0 fs-3">My Profile</p>
              </a>
              <a href="#" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>
'@

# 7a. layout
Write-File "resources\views\layouts\app.blade.php" @'
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | {{ config('app.name') }}</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}">
  @vite(['resources/scss/app.scss', 'resources/js/app.js'])
  @stack('styles')
</head>
<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
       data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

    @include('partials.sidebar')

    <div class="body-wrapper">
      @include('partials.header')

      <div class="body-wrapper-inner">
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
    </div>
  </div>
  @stack('scripts')
</body>
</html>
'@

# 7b. dashboard page
Write-File "resources\views\dashboard.blade.php" @'
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Flexy Laravel mein chal gaya!</h5>
      <p class="mb-0">Yeh aapka pehla page hai.</p>
    </div>
  </div>
@endsection
'@

# 8. routes/web.php
$routes = "routes\web.php"
$rp = Join-Path (Get-Location) $routes
Copy-Item $routes "$routes.bak" -Force
$r = [System.IO.File]::ReadAllText($rp)
$pattern = "Route::get\('/',\s*function\s*\(\)\s*\{\s*return view\('welcome'\);\s*\}\);"
if ($r -match $pattern) {
    $r = [regex]::Replace($r, $pattern, "Route::view('/', 'dashboard')->name('dashboard');")
    [System.IO.File]::WriteAllText($rp, $r, $utf8)
    Write-Host "Updated: $routes (welcome route replace hua)" -ForegroundColor Green
} elseif ($r -notmatch "name\('dashboard'\)") {
    $r = $r.TrimEnd() + "`r`n`r`nRoute::view('/', 'dashboard')->name('dashboard');`r`n"
    [System.IO.File]::WriteAllText($rp, $r, $utf8)
    Write-Host "Updated: $routes (naya route add hua, purana '/' route ho to hata dein)" -ForegroundColor Yellow
}

Write-Host ""
Write-Host "Sab kuch tayyar hai! Ab 'npm run dev' aur 'php artisan serve' chalayein." -ForegroundColor Cyan