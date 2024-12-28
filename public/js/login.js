document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('loginForm').addEventListener('submit', function (event) {
        event.preventDefault();

        var formData = new FormData();
        formData.append('username', document.getElementById('username').value.trim());
        formData.append('password', document.getElementById('password').value.trim());

        fetch('Php/login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log('Raw response:', response); 
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json(); 
        })
        .then(data => {
            console.log(data);
            if (data.status === 'success') {
                Swal.fire({
                    title: 'Login Success!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Great'
                }).then(() => {
                    
                    window.location.href = 'home.php'; 
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
            console.error('Error occurred:', error);
            Swal.fire({
                title: 'Error!',
                text: 'Something went wrong! \n' + error.message,
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        });
    });
});
