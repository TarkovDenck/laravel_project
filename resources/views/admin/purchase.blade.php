// resources/views/admin/purchase.blade.php

@extends('admin.adminpage')

@section('title', 'Table Purchases')

@section('header', 'Table Purchases')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Purchases</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Product</th>
          <th>Username</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>Status</th>
          <th>Email</th>
          <th>Address</th>
          <th>City</th>
          <th>ZIP</th>
          <th>Date Created</th>
          <th>Date Updated</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($purchases as $purchase)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $purchase->product->name }}</td>
          <td>{{ $purchase->user->username }}</td>
          <td>{{ $purchase->quantity }}</td>
          <td>{{ $purchase->total_price }}</td>
          <td>{{ $purchase->status }}</td>
          <td>{{ $purchase->user->email }}</td>
          <td>{{ $purchase->address }}</td>
          <td>{{ $purchase->city }}</td>
          <td>{{ $purchase->zip }}</td>
          <td>{{ $purchase->created_at }}</td>
          <td>{{ $purchase->updated_at }}</td>
          <td>
            <!-- Tombol Complete -->
            <form action="{{ route('admin.purchases.update-status', $purchase->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="complete">
                <button type="submit" class="btn btn-success">Complete</button>
            </form>
        
            <!-- Tombol Cancel -->
            <form action="{{ route('admin.purchases.update-status', $purchase->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="cancel">
                <button type="submit" class="btn btn-danger">Cancel</button>
            </form>
        </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
