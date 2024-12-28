<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up and Login Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script>
        window.sharedData = {};
    </script>
    
</head>

<body>
    <div class="wrapper">
        <form id="loginForm" method="POST" action="{{ route('login.submit') }}">
            @csrf
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" name="username" id="username" placeholder="Username/Email" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox" name="remember"> Remember Me!</label>
                <a href="/change-password">Forgot Password?</a>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="/singup">Sign Up!</a></p>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


    <script>
        document.getElementById('loginForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        let formData = new FormData(this);
        fetch("{{ route('login.submit') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                // Jika response tidak ok, lemparkan error
                throw new Error('Server responded with a non-OK status: ' + response.status);
            }
            return response.json(); // Mengubah response menjadi JSON jika statusnya ok
        })
        .then(data => {
            if (data.status === 'success') {
                Swal.fire('Success', data.message, 'success').then(() => {
                    window.location.href = data.redirect; // Redirect to home
                });
            } else {
                Swal.fire('Error', data.message, 'error');
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            Swal.fire('Error', 'An unexpected error occurred: ' + error.message, 'error');
        });
    });

    </script>
    
</body>

</html>
