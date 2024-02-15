    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Signin</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1><span>Signin Page </span></h1>
        <form action="login.php" method="post">
        <label for="name">Email<span style="color:red";> *<span></label>
        <input type="text" name="email" placeholder="abc@gmail.com" required>
        <label for="name">Password<span style="color:red";> *<span></label>
        <input type="password" name="password" placeholder="*******" required>
        <input type="submit" value="Login" name="submit">
        <h5>Don't have an account?<a href="signup.php">Sign up here!</a></h5>
        </form>
        
    </body>
    </html>
    