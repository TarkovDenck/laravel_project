<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Sign Up and Login Form</title>
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Mengimpor CSS SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>
    <div class="wrapper">
        <form method="POST" action="{{ route('signup.store') }}">
            @csrf
            <h1>Sign Up</h1>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-box">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Input Email" required>
            </div>

            @error('username')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-box">
                <input type="text" name="username" value="{{ old('username') }}" placeholder="Create Username" required>
            </div>

            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-box">
                <input type="password" name="password" placeholder="Create Password" required>
            </div>

            <div class="input-box">
                <input type="password" name="password_confirmation" placeholder="Re-type Password" required>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox" name="agreeTerms" required> I Agree to Terms and Conditions</label>
            </div>

            <button type="submit" class="btn">Sign Up!</button>

            <div class="register-link">
                <p>Already have an account? <a href="/login">Log In!</a></p>
            </div>
        </form>
        
    </div>
    <!-- Mengimpor JS SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <!-- Mengimpor file JavaScript terpisah -->
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: true
            });
        @endif

        @if($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'There was an issue with your registration. Please check your form fields.',
                showConfirmButton: true
            });
        @endif
    </script>


</body>
</html>
