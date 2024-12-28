<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetAlert2 Example</title>
    <!-- Mengimpor CSS SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <button id="myButton">Show Alert</button>

    <!-- Mengimpor JS SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        document.getElementById('myButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Hello!',
                text: 'This is a SweetAlert2 example.',
                icon: 'success',
                confirmButtonText: 'Cool'
            });
        });
    </script>
</body>
</html>
