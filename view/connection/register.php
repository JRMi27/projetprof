<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
   
</head>
<body>

    <div class="register-container">
        <h2>Register</h2>
        <form id="registerForm">
            <label for="nomClient">Last Name:</label>
            <input type="text" id="nomClient" name="nomClient" required>

            <label for="prenomClient">First Name:</label>
            <input type="text" id="prenomClient" name="prenomClient" required>

            <label for="emailClient">Email:</label>
            <input type="email" id="emailClient" name="emailClient" required>

            <label for="identifiantClient">Username:</label>
            <input type="text" id="identifiantClient" name="identifiantClient" required>

            <label for="mdpClient">Password:</label>
            <input type="password" id="mdpClient" name="mdpClient" required>

            <label for="confirmMdpClient">Confirm Password:</label>
            <input type="password" id="confirmMdpClient" name="confirmMdpClient" required>
            <div class="password-match-error" id="passwordError">Passwords do not match.</div>

            <button type="submit">Register</button>
        </form>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            const password = document.getElementById('mdpClient').value;
            const confirmPassword = document.getElementById('confirmMdpClient').value;
            const passwordError = document.getElementById('passwordError');

            if (password !== confirmPassword) {
                passwordError.style.display = 'block';
                event.preventDefault(); 
            } else {
                passwordError.style.display = 'none';
            }
        });
    </script>

</body>
</html>