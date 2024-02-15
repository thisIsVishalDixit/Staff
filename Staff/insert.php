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
        // Add staff availability
        $name = $_POST["name"];
        $role = $_POST["role"];
        $day = $_POST["day"];
        $start_time = $_POST["start_time"];
        $end_time = $_POST["end_time"];

        $sql_availability = "INSERT INTO staff_availability (name, role, day, start_time, end_time) VALUES ('$name', '$role', '$day', '$start_time', '$end_time')";
        $result = mysqli_query($con, $sql_availability);
        if ($result) {
            echo "<script>
            alert('Data Inserted Successful..');          
            window.location.href='add.php';
            </script>";
        } else {
            echo "Error adding staff availability: " . $con->error;
        }
    }

    $con->close();
    ?>
