
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Staff Availability List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="add.php">Add Staff</a>
        <a href="display.php">Display List</a>
        <a href="check.php">Check Availability</a>
        <a href="signin.php?logout=true">Logout</a>
    </nav>
    <h1><span>Display Staff</span></h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
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
            $selectquery = "SELECT * FROM staff_availability";
            $query = mysqli_query($con, $selectquery);
            while($res = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $res['name']; ?></td>
                    <td><?php echo $res['role']; ?></td>
                    <td><?php echo $res['day']; ?></td>
                    <td><?php echo $res['start_time']; ?></td> 
                    <td><?php echo $res['end_time']; ?></td>
                    <td><a href="update.php?id=<?php echo $res['id']; ?>" title="Update">Update</a></td>
                    <td><a href="delete.php?id=<?php echo $res['id']; ?>" title="Delete">Delete</a></td>
                </tr>
            <?php   
            }
            ?>
        </tbody>
    </table>
    <script src="script.js" defer></script>
</body>
</html>
