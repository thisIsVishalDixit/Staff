
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signup</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1><span>Signup Page</span></h1>
        <form action="registration.php" method="post">
        <label for="name">Name<span style="color:red";> *<span></label>
        <input type="text" name="name" placeholder="E.g., John" required>
        <label for="name">Email<span style="color:red";> *<span></label>
        <input type="text" name="email" placeholder="E.g., John" required>
        <label for="name">Password<span style="color:red";> *<span></label>
        <input type="password" name="password" placeholder="*******" required>
        <input type="submit" value="Sign up" name="submit">
        <h5>Already have an account? <a href="signin.php">Login</a></h5>
        </form>
        
    </body>
    </html>
