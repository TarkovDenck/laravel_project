@extends('admin.adminpage')

@section('title', 'Table Users')

@section('header', 'Table Users')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Users</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Tanggal Pembuatan</th>
          <th>Tanggal Update</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
        <tr>
          <td>{{ $loop->iteration }}</td> <!-- Display the row number -->
          <td>{{ $user->username }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at  }}</td> <!-- Assuming the 'phone' column exists in users table -->
          <td>{{ $user->updated_at }}</td>
          <td>
            <!-- Tombol Delete -->
            <form action="{{ route('table1.delete', $user->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
