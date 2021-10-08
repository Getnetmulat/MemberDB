<?php
include 'includes/header.php';

if (login_check($mysqli) == true) : 
?>
<?php
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
   $conn->query("SET NAMES 'utf8'");
if(isset($_GET['status']))
{
$status1=$_GET['status'];
$select=$conn->query("select * from members where id='$status1'");
while($row=mysqli_fetch_object($select))
{
$status_var=$row->status;
if($status_var=='0')
{
$status_state=1;
}
else
{
$status_state=0;
}
$update=$conn->query("update members set status='$status_state' where id='$status1' ");
if($update)
{
header("Location:Activate.php");
}
else
{
echo mysql_error();
}
}
?>
<?php
}
?>
<?php else : 
	//header('Location: ./index.php');
endif; ?>