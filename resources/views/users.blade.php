@extends('layouts.app')

@section('title', 'Users')

@section('content')
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
      <h1 class="h3 mb-1">Users</h1>
      <p class="text-muted mb-0">Manage the people in your workspace.</p>
    </div>
    <span class="badge text-bg-primary">{{ count($user) }} users</span>
  </div>

  <section class="card" aria-labelledby="users-heading">
    <div class="card-body p-0">
      <h2 id="users-heading" class="visually-hidden">User directory</h2>
      <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">City</th>
              <th scope="col">Phone</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $id => $details)
              <tr>
                <th scope="row">{{ $id }}</th>
                <td>{{ $details['name'] }}</td>
                <td>{{ $details['city'] }}</td>
                <td>{{ $details['phone'] }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
@endsection