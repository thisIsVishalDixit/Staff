    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Update Data</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <nav>
        <a href="add.php">Add Staff</a>
        <a href="display.php">Staff List</a>
        <a href="check.php">Check Availability</a>
        <a href="home.php?logout=true">Logout</a>
    </nav>
    <h1><span>update Staff</span></h1>
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
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $showquery = "SELECT * FROM staff_availability WHERE id=$id";
        $showdata = mysqli_query($con, $showquery);
        
    
        if($showdata && mysqli_num_rows($showdata) > 0) {
            $arrdata = mysqli_fetch_array($showdata);

            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $role = $_POST['role'];
                $day = $_POST['day']; 
                $start_time = $_POST['start_time'];
                $end_time = $_POST['end_time'];
                $updateQuery = "UPDATE staff_availability SET name='$name', role='$role', day='$day', start_time='$start_time', end_time='$end_time' WHERE id=$id";
                
                $res = mysqli_query($con, $updateQuery);
            
                if($res){
                    echo "<script>
                    alert('Data Updated Successful..');          
                    window.location.href='display.php';
                    </script>";
                }else {
                    echo "<script>alert('Data not updated');</script>";
                }
            }
        } else {
            echo "<script>alert('No data found for the given ID');</script>";
        }
    }
    ?>
    <form action="" method="POST">
        <label for="name">Staff Name:</label>
        <input type="text" name="name" value="<?php echo isset($arrdata['name']) ? $arrdata['name'] : ''; ?>" >

        <label for="role">Role:</label>
        <input type="text" name="role" value="<?php echo isset($arrdata['role']) ? $arrdata['role'] : ''; ?>">

        <label for="day">Day:</label>
        <input type="text" name="day" value="<?php echo isset($arrdata['day']) ? $arrdata['day'] : ''; ?>">

        <label for="start_time">Start Time:</label>
        <input type="text" name="start_time" value="<?php echo isset($arrdata['start_time']) ? $arrdata['start_time'] : ''; ?>">

        <label for="end_time">End Time:</label>
        <input type="text" name="end_time" value="<?php echo isset($arrdata['end_time']) ? $arrdata['end_time'] : ''; ?>">
        <input type="submit" name="submit" value="Update">
    </form>
    <script src="script.js" defer></script>
    </body>
    </html>
