<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Comments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/comment.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <!-- Import JS SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-main">
        <div class="container-fluid nav-content">
            <div class="flexing-row navlogo">
                <h1 class="display-6" style="font-weight: 500; color: #000000; letter-spacing: 15px;">LERO</h1>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse navbar-collapse-sorting" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="/home" style="color: #000000;">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/catalog" style="color: #000000;">Shop</a></li>
                    <li class="nav-item active"><a class="nav-link" href="/about" style="color: #000000;">About us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact" style="color: #000000;">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="/comment" style="color: #000000;">Comments</a></li>
                </ul>
                @guest
                    <a href="/login" class="btn btn-primary">Log in</a>
                @endguest
                @auth
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <div class="catalog">
        <section class="darkbg">
            <div class="container-fluid container-general main">
                <h1 class="display-5 text-center animated animatedFadeInUp fadeInUp" style="color: #f9faff;">
                    <span class="gradient-text-blue">COMMENT</span>
                </h1>
            </div>
        </section>

        <section class="darkbg">
            <div class="container-fluid container-general pillars">
                <div class="container-fluid cardlist">
                    <div class="card cardbg cardsize">
                        <div class="card-body card-content card-typography card-design">
                            <div class="formdesign">
                                @auth
                                    <div class="d-flex flex-row add-comment-section mt-4 mb-4 addcomment">
                                        <input type="text" class="form-control mr-3" id="comment-input" placeholder="Add comment">
                                        <button class="btn btn-primary" id="comment-button" type="button">Comment</button>
                                    </div>
                                @else
                                <div class="alert alert-warning text-center" role="alert">
                                    <strong>Login Required!</strong> Please 
                                    <a href="{{ route('login.form') }}" class="alert-link">log in</a> to add a comment.
                                </div>
                                @endauth

                                <!-- Display submitted comments -->
                                <div id="comments-section">
                                    @foreach($comments as $comment)
                                        <div class="comment">
                                            <strong>{{ $comment->user->username }}</strong> <!-- Display username -->
                                            <p>{{ $comment->comment }}</p>  <!-- Display comment text -->
                                        </div>
                                    @endforeach
                                </div>

                                <div class="comment-navigation">
                                    <nav class="comment-navigation" aria-label="...">
                                        <ul class="pagination">
                                            {{ $comments->links() }}
                                        </ul>
                                    </nav>
                                </div>

                                <div class="comment-navigation">
                                    <nav class="comment-navigation" aria-label="...">
                                        <ul class="pagination">
                                            {{ $comments->links() }} <!-- Paginate comments -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="footer">
        <div class="footer-subcontent">
            <div class="images">
                <img src="icon/Group 33.svg" alt="">
                <img src="icon/Group 34.svg" alt="">
                <img src="icon/Group 35.svg" alt="">
                <img src="icon/Group 36.svg" alt="">
                <img src="icon/Group 37.svg" alt="">
                <img src="icon/Group 38.svg" alt="">
                <img src="icon/Group 39.svg" alt="">
            </div>
            <p class="lead">
                © Start, 2022. All rights reserved.
            </p>
        </div>
    </div>

    <script>
        document.getElementById('comment-button').addEventListener('click', function() {
            const comment = document.getElementById('comment-input').value;

            if (comment) {
                // Send the comment to the server using AJAX
                fetch('{{ route('comments.store') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ comment: comment })
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: 'Comment Added',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });

                    // Clear the input field
                    document.getElementById('comment-input').value = '';

                    // Optionally, append the new comment to the comments section
                    const newComment = document.createElement('div');
                    newComment.classList.add('comment');
                    newComment.innerHTML = `<strong>${data.username}</strong><p>${data.comment}</p>`;
                    document.getElementById('comments-section').prepend(newComment);
                })
                .catch(error => {
                    Swal.fire({
                        title: 'Error',
                        text: 'An error occurred. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                });
            } else {
                Swal.fire({
                    title: 'Error',
                    text: 'Please enter a comment.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            }
        });

    </script>
</body>
</html>
