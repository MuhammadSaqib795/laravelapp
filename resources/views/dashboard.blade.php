@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
      <p class="text-primary fw-semibold mb-1">OVERVIEW</p>
      <h1 class="h3 mb-1">Dashboard</h1>
      <p class="text-muted mb-0">Here is what is happening with your store today.</p>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-primary">
      <i class="ti ti-users me-1" aria-hidden="true"></i>
      View users
    </a>
  </div>

  <section class="row g-4 mb-4" aria-label="Key metrics">
    <div class="col-sm-6 col-xl-3">
      <article class="card dashboard-summary-card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <div>
              <p class="text-muted mb-2">Total revenue</p>
              <h2 class="h4 mb-2">$12,450</h2>
              <span class="text-success small fw-semibold">
                <i class="ti ti-trending-up" aria-hidden="true"></i> 12.8%
              </span>
              <span class="text-muted small"> vs last month</span>
            </div>
            <span class="dashboard-metric-icon bg-primary-subtle text-primary">
              <i class="ti ti-currency-dollar" aria-hidden="true"></i>
            </span>
          </div>
        </div>
      </article>
    </div>
    <div class="col-sm-6 col-xl-3">
      <article class="card dashboard-summary-card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <div>
              <p class="text-muted mb-2">Orders</p>
              <h2 class="h4 mb-2">1,245</h2>
              <span class="text-success small fw-semibold">
                <i class="ti ti-trending-up" aria-hidden="true"></i> 8.2%
              </span>
              <span class="text-muted small"> vs last month</span>
            </div>
            <span class="dashboard-metric-icon bg-info-subtle text-info">
              <i class="ti ti-shopping-cart" aria-hidden="true"></i>
            </span>
          </div>
        </div>
      </article>
    </div>
    <div class="col-sm-6 col-xl-3">
      <article class="card dashboard-summary-card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <div>
              <p class="text-muted mb-2">Customers</p>
              <h2 class="h4 mb-2">845</h2>
              <span class="text-success small fw-semibold">
                <i class="ti ti-trending-up" aria-hidden="true"></i> 5.4%
              </span>
              <span class="text-muted small"> vs last month</span>
            </div>
            <span class="dashboard-metric-icon bg-success-subtle text-success">
              <i class="ti ti-users" aria-hidden="true"></i>
            </span>
          </div>
        </div>
      </article>
    </div>
    <div class="col-sm-6 col-xl-3">
      <article class="card dashboard-summary-card">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between">
            <div>
              <p class="text-muted mb-2">Growth</p>
              <h2 class="h4 mb-2">24.6%</h2>
              <span class="text-success small fw-semibold">
                <i class="ti ti-trending-up" aria-hidden="true"></i> 2.1%
              </span>
              <span class="text-muted small"> vs last month</span>
            </div>
            <span class="dashboard-metric-icon bg-warning-subtle text-warning">
              <i class="ti ti-chart-line" aria-hidden="true"></i>
            </span>
          </div>
        </div>
      </article>
    </div>
  </section>

  <section class="row g-4 mb-4" aria-label="Sales reports">
    <div class="col-xl-8">
      <article class="card h-100">
        <div class="card-body">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-3">
            <div>
              <h2 class="h5 card-title mb-1">Sales overview</h2>
              <p class="text-muted mb-0">Revenue and orders this week</p>
            </div>
            <span class="badge rounded-pill text-bg-light">This week</span>
          </div>
          <div id="sales-overview" class="dashboard-chart-container"
               role="img" aria-label="Bar chart comparing revenue and orders from Monday through Sunday"></div>
          <div class="d-flex justify-content-center gap-4 mt-2">
            <span class="small text-muted"><i class="ti ti-point-filled text-primary" aria-hidden="true"></i> Revenue</span>
            <span class="small text-muted"><i class="ti ti-point-filled text-secondary" aria-hidden="true"></i> Orders</span>
          </div>
        </div>
      </article>
    </div>
    <div class="col-xl-4">
      <article class="card h-100">
        <div class="card-body">
          <h2 class="h5 card-title mb-1">Sales by channel</h2>
          <p class="text-muted mb-4">Where your orders come from</p>

          <div class="mb-4">
            <div class="d-flex justify-content-between mb-2">
              <span>Online store</span><span class="fw-semibold">62%</span>
            </div>
            <div class="progress" role="progressbar" aria-label="Online store sales" aria-valuenow="62"
                 aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar" style="width: 62%"></div>
            </div>
          </div>
          <div class="mb-4">
            <div class="d-flex justify-content-between mb-2">
              <span>Marketplace</span><span class="fw-semibold">26%</span>
            </div>
            <div class="progress" role="progressbar" aria-label="Marketplace sales" aria-valuenow="26"
                 aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar bg-secondary" style="width: 26%"></div>
            </div>
          </div>
          <div>
            <div class="d-flex justify-content-between mb-2">
              <span>In-store</span><span class="fw-semibold">12%</span>
            </div>
            <div class="progress" role="progressbar" aria-label="In-store sales" aria-valuenow="12"
                 aria-valuemin="0" aria-valuemax="100">
              <div class="progress-bar bg-success" style="width: 12%"></div>
            </div>
          </div>
        </div>
      </article>
    </div>
  </section>

  <section class="row g-4" aria-label="Store details">
    <div class="col-xl-7">
      <article class="card h-100">
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
              <h2 class="h5 card-title mb-1">Recent orders</h2>
              <p class="text-muted mb-0">Latest activity from your store</p>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table align-middle mb-0">
              <thead>
                <tr>
                  <th scope="col">Order</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" class="fw-semibold">#FL-1048</th>
                  <td>Olivia Rhye</td>
                  <td>$240.00</td>
                  <td><span class="badge bg-success-subtle text-success">Completed</span></td>
                </tr>
                <tr>
                  <th scope="row" class="fw-semibold">#FL-1047</th>
                  <td>Phoenix Baker</td>
                  <td>$125.50</td>
                  <td><span class="badge bg-warning-subtle text-warning-emphasis">Pending</span></td>
                </tr>
                <tr>
                  <th scope="row" class="fw-semibold">#FL-1046</th>
                  <td>Lana Steiner</td>
                  <td>$89.00</td>
                  <td><span class="badge bg-success-subtle text-success">Completed</span></td>
                </tr>
                <tr>
                  <th scope="row" class="fw-semibold">#FL-1045</th>
                  <td>Demi Wilkinson</td>
                  <td>$310.00</td>
                  <td><span class="badge bg-danger-subtle text-danger">Cancelled</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </article>
    </div>
    <div class="col-xl-5">
      <article class="card h-100">
        <div class="card-body">
          <div class="mb-3">
            <h2 class="h5 card-title mb-1">Top products</h2>
            <p class="text-muted mb-0">Best performers this month</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex align-items-center gap-3 px-0">
              <img class="dashboard-product-image rounded-3" src="{{ asset('images/products/s1.jpg') }}"
                   alt="Product sample one" width="48" height="48">
              <div class="flex-grow-1">
                <h3 class="h6 mb-1">Modern workspace</h3>
                <span class="small text-muted">84 orders</span>
              </div>
              <span class="fw-semibold">$2,840</span>
            </li>
            <li class="list-group-item d-flex align-items-center gap-3 px-0">
              <img class="dashboard-product-image rounded-3" src="{{ asset('images/products/s2.jpg') }}"
                   alt="Product sample two" width="48" height="48">
              <div class="flex-grow-1">
                <h3 class="h6 mb-1">Everyday essentials</h3>
                <span class="small text-muted">67 orders</span>
              </div>
              <span class="fw-semibold">$1,960</span>
            </li>
            <li class="list-group-item d-flex align-items-center gap-3 px-0">
              <img class="dashboard-product-image rounded-3" src="{{ asset('images/products/s3.jpg') }}"
                   alt="Product sample three" width="48" height="48">
              <div class="flex-grow-1">
                <h3 class="h6 mb-1">Weekend collection</h3>
                <span class="small text-muted">52 orders</span>
              </div>
              <span class="fw-semibold">$1,420</span>
            </li>
          </ul>
        </div>
      </article>
    </div>
  </section>
@endsection

@push('scripts')
  @vite('resources/js/pages/dashboard.js')
@endpush
