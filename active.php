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
        <table width='100%' border=0>
        <tr class='table-header'>
                <td>Title</td>
                <td>Description</td>
                <td>Date</td>
                <td>End Date</td>
                <td>Start Date</td>
                <td>Priority</td>
                <td>Status</td>
                <td>Assigned To</td>
                <td>Assigning</td>
                <td><a href='add.html'>Add Task</a></td>
            </tr>
            <?php 
            while($res = mysqli_fetch_array($result)) {    
                $rows[] = $res;       
                echo "<tr>";
                echo "<td>".$res['title']."</td>";
                echo "<td>".$res['description']."</td>";
                echo "<td>".$res['date']."</td>";
                echo "<td>".$res['end_date']."</td>";
                echo "<td>".$res['start_date']."</td>";
                $priority_colors = array('MED' => '#7676f3', 'LOW' => '#86d786', 'HIGH' => '#f14040');
                echo "<td style=\"background-color:".$priority_colors[$res['priority']].";color:black;\">".$res['priority']."</td>";
                echo "<td>".$res['status']."</td>";
                echo "<td>".$res['assigned_to']."</td>";
                echo "<td>".$res['assigning']."</td>";
                echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a></td>";       
            }
            echo "Total records =".count($rows);
            ?>
            
        </table>      
      </div>
    <div id="footer">
        <span><img id='smalllogo' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSh1zMqjJzcoqZl9AeZdceoKM-kicg1HIH2YQ&usqp=CAU" /></span>
        <span>©MyTasksProject <?php echo date("Y"); ?> Copyright.</span>
    </div>
</body>
</html>