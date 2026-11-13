<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Dashboard') | {{ config('app.name') }}</title>
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
        <main class="container-fluid">
          @yield('content')
        </main>
      </div>
    </div>
  </div>
  @stack('scripts')
</body>
</html>