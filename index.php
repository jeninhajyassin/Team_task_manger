<html>
<head>
    <title>Project</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body class='login-body'>
     <form action="login.php" method="post">
        <h2 class='h2-login'>LOGIN</h2>
        <label>Username</label>
        <input type="text" name="name" placeholder="Please enter Username"><br>
        <label>Password</label>
        <input type="password" name="pass" placeholder="Please enter Password"><br>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error-dot"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <button type="submit">Login</button>
        <span><a href="create.html">Create eAccount</a></span>
     </form>
</body>

</html>