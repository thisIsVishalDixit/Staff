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
        <title>Add Staff</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <nav>
        <a href="add.php">Add Staff</a>
        <a href="display.php">Display List</a>
        <a href="check.php">Check Availability</a>
        <a href="signin.php?logout=true">Logout</a>
    </nav>
    <h1><span>Add Staff</span></h1>
    <form action="insert.php" method="post">
        <label for="name">Staff Name:</label>
        <input type="text" name="name" placeholder="E.g., John" required>

        <label for="role">Role:</label>
        <input type="text" name="role" placeholder="E.g., Java Developer "required>

        <label for="day">Day:</label>
        <input type="text" name="day" placeholder="E.g., Monday" required>

        <label for="start_time">Start Time:</label>
        <input type="text" name="start_time" placeholder="E.g., 09:00:00" required>

        <label for="end_time">End Time: (Insert time for 24 clock according)</label>
        <input type="text" name="end_time" placeholder="E.g., 17:00:00" required>
        <br>

        <input type="submit" value="Add Availability">
    </form>
    <script src="script.js" defer></script> 
    </body>
    </html>
