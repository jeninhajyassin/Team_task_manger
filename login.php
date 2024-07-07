<?php
session_start(); 
include_once("db.php");

if (isset($_POST['name']) && isset($_POST['pass'])) {
    $name = $_POST['name'];
    $password = $_POST['pass'];
    if (empty($name) || empty($password)) {
        header("Location: index.php?error=Userame or Password is required");
        exit();
    }else{
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$name' AND password='$password'");
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $name && $row['password'] === $password) {
                echo "Successfuly logged in!";
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            }else{
                header("Location: index.php?error=Incorect Username or password");
                exit();
            }
        }else{
            header("Location: index.php?error=Incorect Username or password");
            exit();
        }
    }
}else{
    header("Location: index.php");
    exit();
}?>