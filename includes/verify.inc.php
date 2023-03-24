
    <html>
    <head>
        <title>Activate Your Account</title>
    </head>
    <body>
    <h1>Activate Your Account</h1>
    <form method="post" action="../php/user_activation.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="user_verification_code">Verification Code:</label>
        <input type="text" id="user_verification_code" name="user_verification_code" required>
        <br>
        <button type="submit">Activate Account</button>
    </form>
    </body>
    </html>
