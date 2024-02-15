<?php
session_start();

include 'connection.php';

if(isset($_POST['submit'])){

  $username=$_POST['name'];
  $pass=$_POST['password'];
  $password=password_hash($pass,PASSWORD_BCRYPT);
  $email=$_POST['email'];
  $check_query = "SELECT * FROM users WHERE email='$email'";

  $check= mysqli_query($con, $check_query);
  if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('User already exists.');window.location.href='signup.php';</script>";
    exit();
    }else{
      $insertQuery ="INSERT INTO users(name, email, password) VALUES ('$username','$email', '$password')";
      $res = mysqli_query($con, $insertQuery);
      if($res){
        echo "<script>alert('Data Inserted Successful..');window.location.href='signin.php';</script>";
      }else{
        echo "<script>alert('Data not inserted');</script>";
      }
   }
  }
$con->close();
?> 