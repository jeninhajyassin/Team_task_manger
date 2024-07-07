<html>
<head>
    <title>Add Task</title>
</head>
<body>
<?php
include_once("db.php");
if(isset($_POST['Submit'])) {	
    $title = $_POST['title'];
    $description = $_POST['description'];
    $end_date = $_POST['end_date'];
    $start_date = $_POST['start_date'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $assigned_to = $_POST['assigned_to'];
    $d=date("Y/m/d");

    if(empty($title)) {				
        echo "<font color='red'>Title field is empty.</font><br/>";		
    } else { 
        $result = mysqli_query($mysqli, "INSERT INTO tasks(title, description, date, end_date,start_date,priority,assigned_to,assigning,status) VALUES('$title', '$description', '$d', '$end_date','$start_date','$priority','$assigned_to','Gamal','$status')");
        header("Location: home.php");
    }
}
?>
</body>
</html>