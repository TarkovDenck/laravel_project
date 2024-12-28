document.addEventListener('DOMContentLoaded', function () {
    const contactForm = document.querySelector('.formdesign form');

    contactForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Mencegah form dari submit default

        const formData = new FormData();
        formData.append('email', document.getElementById('emailForm').value.trim());
        formData.append('message', document.getElementById('messageForm').value.trim());

        fetch('Php/Contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                throw new Error('Invalid JSON response from the server.');
            }
            return response.json();
        })
        .then(data => {
            if (data.status === 'success') {
                Swal.fire({
                    title: 'Message Sent!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Great'
                });
                contactForm.reset();
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
            Swal.fire({
                title: 'Error!',
                text: 'Something went wrong! \n' + error.message,
                icon: 'error',
                confirmButtonText: 'Try Again'
            });
        });
    });
});
