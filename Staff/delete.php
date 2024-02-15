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

    $id = $_GET['id'];
    $deleteQuery = "DELETE FROM staff_availability WHERE id = $id";
    $query = mysqli_query($con, $deleteQuery);
    if($query){
        echo "<script>
        alert('Data Deleted Successful..');          
        window.location.href='display.php';
        </script>";
    }
    ?>
