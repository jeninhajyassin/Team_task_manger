<html>
<head>
    <title>Project</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    include("db.php");					
    $result = mysqli_query($mysqli, "SELECT * FROM `tasks` WHERE status = 'Active'");
     ?>
        <div>
            <span>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSh1zMqjJzcoqZl9AeZdceoKM-kicg1HIH2YQ&usqp=CAU" />
            </span>
            <span><strong>My Tasks project</strong></span>
            <span><a href="about.php">About</a></span>
            <span><a href="contact.php">Contact</a></span>
            <span><a href="index.php">Logout</a></span>
        </div>        
        <?php
        $menu=file_get_contents("menu.txt");
        $base=basename($_SERVER['PHP_SELF']);
        $menu=preg_replace("|<li><a href=\"".$base."\">(.*)</a></li>|U", "<li id=\"current\">$1</li>", $menu);
        echo $menu;
        ?>
      <div id="container">
       contact
      </div>
    <div id="footer">
        <span><img id='smalllogo' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSh1zMqjJzcoqZl9AeZdceoKM-kicg1HIH2YQ&usqp=CAU" /></span>
        <span>© <?php echo date("Y"); ?> Copyright.</span>
    </div>
</body>
</html>