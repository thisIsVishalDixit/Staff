    <?php
    session_start();

    include 'connection.php';
    if (!isset($_SESSION["email"])) {
        header("Location: signin.php");
        exit();
    }


    if (isset($_GET["logout"])) {
        session_destroy();
        header("Location: signin.php");
        exit();
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Check </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <nav>
        <a href="add.php">Add Staff</a>
        <a href="display.php">Display List</a>
        <a href="check.php">Check Availability</a>
        <a href="signin.php?logout=true">Logout</a>
    </nav>
    <h1><span>Check Availability</span></h1>

    <form action="check_details.php" method="post">
        <label for="day">Select Day:</label>
        <input type="text" name="day" placeholder="E.g., Monday" required>

        <label for="time">Select Time:(Insert time for 24 clock according)</label>
        <input type="text" name="time" placeholder="E.g., 13:00:00" required>

        <input type="submit" value="Check Availability">
    </form>
    <script src="script.js" defer></script>
    </body>
    </html>


