
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Availability</title>
    <link rel="stylesheet" href="style.css">
</head>z
<body>
<nav>
        <a href="add.php">Add Staff</a>
        <a href="display.php">Display List</a>
        <a href="check.php">Check Availability</a>
        <a href="signin.php?logout=true">Logout</a>
    </nav>
    <h1><span>Available Staff </span></h1>
<div class="container">
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
        $day = $_POST["day"];
        $time = $_POST["time"];
        $formattedTime = date("H:i:s", strtotime($time));
      
        $sql = "SELECT id, name, role, day, start_time, end_time
                FROM staff_availability
                WHERE day = ? AND start_time <= ? AND end_time >= ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sss", $day, $formattedTime, $formattedTime);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result === false) {
            echo "<p class='error-message'>Error executing query: " . $con->error . "</p>";
        } else {
            if ($result->num_rows > 0) {
                echo "<h3>Staff Available on $day at $time:</h3>";
                echo "<ul>";
                while ($row = $result->fetch_assoc()) {
                    echo "<li>{$row['name']} (Role: {$row['role']}) - Available from {$row['start_time']} to {$row['end_time']}</li>";
                }
                echo "</ul>";
            } else {
                echo "<li>No staff available on $day at $time.</li>";
            }
        }
    
        $stmt->close();
    }
    
    $con->close();
    ?>
</div>
<script src="script.js" defer></script>
</body>
</html>
