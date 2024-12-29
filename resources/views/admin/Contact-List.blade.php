@extends('admin.adminpage')

@section('title', 'Contact List')

@section('header', 'Contact List')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Contact Data</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Email</th>
          <th>Message</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($contacts as $contact)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $contact->email }}</td>
          <td>{{ $contact->message }}</td>
          <td>{{ $contact->created_at->format('d-m-Y H:i') }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="5" class="text-center">No contacts found</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
