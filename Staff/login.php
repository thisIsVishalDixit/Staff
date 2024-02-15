<?php 
session_start();

include 'connection.php';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $q = "SELECT * FROM users WHERE email='$email'";
    $res = mysqli_query($con, $q);

    if ($res && mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_array($res);
        $hash = $row['password'];

        if (password_verify($pass, $hash)) {
            $_SESSION['email'] = $email;
            header('location: add.php');
            exit();
        } else {
            echo "<script>alert('Data not matched.'); window.location.href='signin.php';</script>";
        }
    } else {
        echo "<script> alert('User Not Found') </script>";
    }
}
$con->close();
?>
