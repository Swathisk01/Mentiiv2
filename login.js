// script.js
document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const message = document.getElementById('message');

    if (username === '' || password === '') {
        message.textContent = 'Please fill in all fields.';
    } else {
        message.style.color = '#28a745';
        message.textContent = 'Login successful! Redirecting...';
        // Simulate a redirect (this would normally involve more complex logic)
        setTimeout(() => {
            window.location.href = 'profile.html'; // Redirect to profile page
        }, 1000);
    }
});
