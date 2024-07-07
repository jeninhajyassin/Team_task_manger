<?php
include_once("db.php");
$name = $_POST['name'];
$pass = $_POST['pass'];
$username = $_POST['username'];
$qualification = $_POST['qualification'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$identity_number = $_POST['identity_number'];
$nationality = $_POST['nationality'];
$result = mysqli_query($mysqli, "INSERT INTO login(
        name, identity_number, nationality, address, mobile, email, qualification,password,username) 
        VALUES('$name', '$identity_number', '$nationality', '$address','$mobile','$email','$qualification','$pass','$username')");
header("Location: login.php");
?>