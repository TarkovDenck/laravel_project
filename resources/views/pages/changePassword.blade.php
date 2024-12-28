<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Change Password</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Mengimpor CSS SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div class="wrapper">
        <form id="changePasswordForm" method="POST" action="{{ route('password.update') }}">
            @csrf
            <h1>Change Password</h1>
            <div class="input-box">
                <input type="email" name="email" id="email" placeholder="Input Email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" name="old-password" id="old-password" placeholder="Old Password" required>
                <i class='bx bxs-lock'></i>
            </div>
            <div class="input-box">
                <input type="password" name="new-password" id="new-password" placeholder="New Password" required>
                <i class='bx bxs-lock'></i>
            </div>
            <div class="input-box">
                <input type="password" name="new-password_confirmation" id="new-password_confirmation" placeholder="Confirm New Password" required>
                <i class='bx bxs-lock'></i>
            </div>
            <button type="submit" class="btn">Confirm Password</button>
        </form>
    </div>

    <!-- Mengimpor JS SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Mengimpor file JavaScript terpisah -->
    <script>
        document.getElementById('changePasswordForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Hentikan submit default

            let formData = new FormData(this);
            fetch("{{ route('password.update') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = "{{ route('login.form') }}";
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Try Again'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'Try Again'
                });
            });
        });


    </script>
</body>
</html>
