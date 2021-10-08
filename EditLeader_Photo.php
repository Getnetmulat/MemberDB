<?php

include ('Importexcel_db.php');

$get_id=$_REQUEST['ID'];

move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);			
$location1=$_FILES["image"]["name"];

$con = mysqli_connect(HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_NAME) or die ("error");
$sql = "UPDATE leader SET Photo ='$location1' WHERE ID = '$get_id' ";

$con->query($sql);
echo "<script>alert('Successfully Updated!!!'); window.location='index.php'</script>";
?>