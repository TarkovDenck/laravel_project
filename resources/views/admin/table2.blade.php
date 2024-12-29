@extends('admin.adminpage')

@section('title', 'Table Comment')

@section('header', 'Table Comment')

@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Data Comment</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped" id="commentsTable">
      <thead>
        <tr>
          <th>#</th>
          <th>Username</th>
          <th>Comment</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($comments as $comment)
        <tr id="comment-{{ $comment->id }}">
          <td>{{ $comment->id }}</td>
          <td>{{ $comment->user->username }}</td>
          <td>{{ $comment->comment }}</td>
          <td>{{ $comment->created_at }}</td>
          <td>
            <button class="btn btn-danger btn-sm delete-comment" data-id="{{ $comment->id }}">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.delete-comment').click(function () {
            let commentId = $(this).data('id');
            let url = `{{ route('comments.destroy', ':id') }}`.replace(':id', commentId);
            let row = $(`#comment-${commentId}`);

            if (confirm('Are you sure you want to delete this comment?')) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            row.remove(); // Remove the row from the table
                            alert(response.message);
                        } else {
                            alert('Failed to delete the comment.');
                        }
                    },
                    error: function () {
                        alert('An error occurred. Please try again.');
                    }
                });
            }
        });
    });
</script>
@endsection
