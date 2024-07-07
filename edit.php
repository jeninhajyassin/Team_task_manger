<?php
include_once("db.php");

if(isset($_POST['update']))
{	
    $id = $_POST['id'];

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
        $result = mysqli_query($mysqli, "UPDATE tasks SET title='$title', description='$description', date='$d', end_date='$end_date',start_date='$start_date',priority='$priority',assigned_to='$assigned_to' WHERE id=$id");
        header("Location: home.php");
    }
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($mysqli, "SELECT * FROM tasks WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $title = $res['title'];
    $description = $res['description'];
    $end_date = $res['end_date'];
    $start_date = $res['start_date'];
    $priority = $res['priority'];
    $status = $res['status'];
    $assigned_to = $res['assigned_to'];
    $assigning = $res['assigning'];
    $d=date("Y/m/d");
}
?>
<html>
<head>	
    <title>Edit Task</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>


<body class='login-body'>
<form name="form1" method="post" action="edit.php">
        <h2 class='h2-login'>Edit Task</h2>
        <table width="25%" border="0">
            <tr> 
                <td>Title <span>*</span></td>
                <td><input type="text" name="title" required value="<?php echo $title;?>"></td>
            </tr>
            <tr> 
                <td>Description</td>
                <td><input type="text" name="description" value="<?php echo $description;?>"></td>
            </tr>
            <tr> 
                <td>End Date <span>*</span></td>
                <td><input type="text" name="end_date" value="<?php echo $end_date;?>"></td>
            </tr>
            <tr> 
                <td>Start Date <span>*</span></td>
                <td><input type="text" name="start_date" value="<?php echo $start_date;?>"></td>
            </tr>
            <tr> 
                <td>Priority</td>
                <td>
                    <div class="priority">
                        <input type="radio" name="priority" id="1" value="HIGH" <?php if ( $priority == 'HIGH'): ?>checked='checked'<?php endif; ?>>
                        <label for="age1">HIGH</label><br>
                        <input type="radio" name="priority" id="2" value="MED" <?php if ( $priority == 'MED'): ?>checked='checked'<?php endif; ?>>
                        <label for="age1">MED</label><br>
                        <input type="radio" name="priority" id="3"  value="LOW" <?php if ( $priority == 'LOW'): ?>checked='checked'<?php endif; ?>>
                        <label for="age1">LOW</label><br>
                    </div>
                </td>
            </tr>
            <tr> 
                <td>Assigned To <span>*</span></td>
                <td><input type="text" name="assigned_to" value="<?php echo $assigned_to;?>"></td>
            </tr>
            <tr> 
                <td>Assigning</td>
                <td><input type="text" name="assigning" value="<?php echo $assigning;?>" disabled></td>
            </tr>
            <tr> 
                <td>Status</td>
                <td>
                    <div class="status">
                        <input type="radio" name="status" id="1" value="Active" <?php if ( $status == 'Active'): ?>checked='checked'<?php endif; ?>>
                        <label>Active</label><br>
                        <input type="radio" name="status" id="1" value="Pending" <?php if ( $status == 'Pending'): ?>checked='checked'<?php endif; ?>>
                        <label >Pending</label><br>
                        <input type="radio" name="status" id="2" value="Late">
                        <label >Late</label><br>
                        <input type="radio" name="status" id="3"  value="Finished" <?php if ( $status == 'Finished'): ?>checked='checked'<?php endif; ?>>
                        <label >Finished</label><br>
                    </div>
                </td>
            </tr>
            <tr> 
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
            </tr>
        </table>
    </form>
</body>
</html>