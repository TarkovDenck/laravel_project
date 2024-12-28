document.addEventListener('DOMContentLoaded', function () {
    // Ambil elemen form signup
    const signupForm = document.getElementById('signupForm');

    // Tambahkan event listener untuk submit form
    signupForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Mencegah form refresh page

        // Ambil data form
        const formData = new FormData(signupForm);

        // Kirim request ke server
        fetch('Php/signup.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                // Pastikan response adalah JSON
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Response Data:', data);
                if (data.status === 'success') {
                    Swal.fire({
                        title: 'Sign Up Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'Great'
                    }).then(() => {
                        // Simpan data signup ke sharedData jika diperlukan
                        window.sharedData = {
                            signupData: {
                                email: data.data.email,
                                username: data.data.username,
                            }
                        };
                        // Redirect ke halaman login
                        window.location.href = 'login.html';
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
                console.error('Error during fetch:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong! \n' + error,
                    icon: 'error',
                    confirmButtonText: 'Try Again'
                });
            });
    });
});
