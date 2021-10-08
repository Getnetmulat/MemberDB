
<?PHP 
		include "includes/header.php";
		//include "includes/footer.php";
		include_once 'includes/db_connect.php';
		include_once 'includes/functions.php';
		//sec_session_start();
	?>


<body bgcolor="">

	<?php
	if (login_check($mysqli) == true) : 


include 'sidebar.php'; ?>
	 <div class="content-wrapper">
	<div align='right'>			
	<div style="background-color:#D6DBDF  ;border-radius:5px;font-family:times;"> 
<p align="right"><span id ="header_logo">Welcome:[ <b><?php echo $_SESSION['username']; ?> ]&nbsp;&nbsp;&nbsp;            You are currently logged <?php echo $logged ?>.<a href="includes/logout.php">[Log Out!]</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("l").", ". date("M d") .", ". date("Y");?> </b> </p>

</div>
	<table width="100%">
 <tr>
	 <th height="29" colspan="5" align="center"> 
	 <h3 align="center">የብልፅግና ፓርቲ ደጋፊዎች መረጃ ቋት</h3> 
	 	
       </th>
   </tr>
</table>	

	<div class="card-body">
              <div class="table-responsive">
 
<center>
<form action="" method="post">

<table width="100%"  cellpadding="4" cellspacing="4" bgcolor ="#77bdc0">
<tr> 
	<td>&nbsp;</td>
	 <td height="29" colspan="3" align="center"><h5>Edit Prosperity Party Supporter's Profiles By ID:</h5></td>
</tr>
<tr>
<td rowspan="3"><img src ='images/doc8.jpg' width ='90' height ='50'></td>
<td><label>Search Prosperity Party Supporter's</label></td>
<td>
<?php
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
	 $conn->query("SET NAMES 'utf8'");
$sql="select ID from eprdf_supporter ORDER BY ID";
$result=$conn->query($sql);
	    echo "<select required name='ID'>"; 
	    echo "<option  value=''> <b>Select Prosperity Party Supporter's Id</b> </option>\n";
	    if(mysqli_num_rows($result)) 
	    { 
	    while($row = mysqli_fetch_assoc($result)) 
	    { 
		
	    echo "<option value='$row[ID]'>".$row['ID']."</option>\n"; 
	    } 	 
	    } 
	    else 
		{
	    echo "<option> No Prosperity Party Supporter's ID  present </option>\n";  
	    }
echo"</select>";
?>	
</td>

<td><input type="submit" name="search" value="search"/> </td>
</tr>
</table>
</form>
<?php

if(isset($_POST['search']))
{
$search=$_POST['search'];
$ID=$_POST['ID'];
if(isset($search))
{
if($ID=="")
{
echo"<font color=\"red\">please select Prosperity Party Supporter's id</font>";
}
else
{
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
	 $conn->query("SET NAMES 'utf8'");
$select="select * from eprdf_supporter where ID='$ID'";
$selectresult=$conn->query($select);
while($user=mysqli_fetch_assoc($selectresult))
{

?>

<form action="" method="post" enctype="multipart/form-data">
<table width="100%" height="0" bgcolor="#77bdc0">
<center>
	
 	
  <h5>Update Prosperity Party Supporter's Information:</h5></center>
		<tr><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>መታወቂያ ቁጥር
</td>
<td><input type="text"  readonly name="ID" value='<?php echo $user['ID'];?>' /></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>ስም</td>
<td><input type="text"  name="First_Name" value='<?php echo$user['First_Name'];?>' /></td>

</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>የአባት ስም</td>
<td><input type="text"  name="Middle_Name" value='<?php echo$user['Middle_Name'];?>' /></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>የአያት ስም </td>
<td><input type="text"  name="Last_Name" value='<?php echo$user['Last_Name'];?>' /></td>

</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>ፆታ</td>
<td><input type="text"  name="Sex" value='<?php echo$user['Sex'];?>' /></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>እድሜ</td>
<td><input type="text"  name="Age" value='<?php echo$user['Age'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>የትምህርት ደረጃ</td>
<td><input type="text"  name="Education" value='<?php echo$user['Education'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>የትምህርት መስክ</td>
<td><input type="text"  name="Field_Of_Study" value='<?php echo$user['Field_Of_Study'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>Region/City Office you Support</td>
<td><input type="text"  name="Support_Party" value='<?php echo $user['Support_Party'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>የደጋፊነት ዘመን</td>
<td><input type="text"  name="Supporter_Year" value='<?php echo$user['Supporter_Year'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>የደጋፊነት ሁኔታ</td>
<td><input type="text"  name="Supporter_Status" value='<?php echo$user['Supporter_Status'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>የስራ ቦታ</td>
<td><input type="text"  name="Work_Place"   value='<?php echo$user['Work_Place'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>

<tr>
<td>&nbsp;</td>
<td>ኃላፊነት</td>
<td><input type="text"  name="Resp" value='<?php echo $user['Resp'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>

<td>የተሰማሩበት የስራ መስክ</td>
<td><input type="text"  name="Field_of_Job" value='<?php echo$user['Field_of_Job'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>የስራ ልምድ በዓመት</td>
<td><input type="text"  name="Expriance" value='<?php echo$user['Expriance'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>

<td>አድራሻ</td>
<td><input type="text"  name="Address" value='<?php echo$user['Address'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>ስልክ ቁጥር</td>
<td><input type="text"  name="Phone_Number" value='<?php echo$user['Phone_Number'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>ኢሜል</td>
<td><input type="text"  name="Email" value='<?php echo$user['Email'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>ፎቶ</td>
<td><input type="file"  name="Photo" value='<?php '<img src="data:Photo;base64,'.base64_encode($row['Photo'] ).'" />'  ?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr> 
<td>&nbsp;</td><td>&nbsp;</td>
<td colspan="3" text-align ="center"><input type="submit" name="updatemember" value="Update"></td>
<td colspan="3"><input type="submit" name="exit" value="Exit"/> </td>
</tr>
</table>

</form>
<?php
}
}
}
}
?>
<?php
if(isset($_POST['updatemember']))
{

//$exit=$_POST['exit'];
$updatemember=$_POST['updatemember'];
$ID=$_POST['ID'];
$fn=$_POST['First_Name'];
$mn=$_POST['Middle_Name'];
$ln=$_POST['Last_Name'];
$sex=$_POST['Sex'];
$age=$_POST['Age'];
$email=$_POST['Email'];
$pn=$_POST['Phone_Number'];
$add=$_POST['Address'];
$fs=$_POST['Field_Of_Study'];
$fj=$_POST['Field_of_Job'];
$ed=$_POST['Education'];
$ex=$_POST['Expriance'];
$wp=$_POST['Work_Place'];
$Resp=$_POST['Resp'];
$sp=$_POST['Support_Party'];
$sy=$_POST['Supporter_Year'];
$ss=$_POST['Supporter_Status'];
//$Photo=$row['Photo'];	

if(isset($updatemember))
{
if($ID==""||$fn==""||$mn==""||$ln==""||$sex==""||$age==""||$pn==""||$email==""||$ed=="" ||$fs==""||$ex==""||$fj==""||$Resp==""||$wp==""||$sp==""||$sy==""||$ss==""||$add=="")
{
echo"<font color=\"red\">You have not update the entires Data!!</font>";
}
/*
else  if(preg_match("/^[a-zA-Z0-9 _  - . , :]+$/", $user_id) ===0)
{
echo"<font color=\"red\">invalid user id</font>";
}
else if(!ctype_alpha($fname))
{
echo"<font color=\"red\">first name should be alphabets only</font>";
}
else if(!ctype_alpha($lname))
{
echo"<font color=\"red\">last name should be alphabets only</font>";
}
else if(!ctype_alpha($profetion))
{
echo"<font color=\"red\">profetion should be alphabets only</font>";
}
else  if(preg_match("/^[a-zA-Z0-9 _  - . , :]+$/", $address) ===0)
{
echo"<font color=\"red\">invalid customer address</font>";
}
else  if(preg_match("/^[a-zA-Z0-9 _  - . , :]+$/", $country) ===0)
{
echo"<font color=\"red\">invalid customer country</font>";
}
/*else if(!ctype_alnum($address))
{
echo"<font color=\"red\">invalid customer id</font>";
}*/

/*else if(!ctype_alpha($country))
{
echo"<font color=\"red\">country name should be alphabets only</font>";
}
else  if(preg_match("/^[0-9]+$/", $phone) ===0)
{
echo"<font color=\"red\">phone should be integer number</font>";
}
/*else if(!is_numeric($phone))
{
echo"<font color=\"red\">phone should be number</font>";
}
else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\.\\+=_-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email))
 { 
 echo"<font color=\"red\">invalid email</font>"; 
 }
 /*else if(!ctype_alnum($address))
{
echo"<font color=\"red\">invalid customer address</font>";
}*/
/*
else  if(preg_match("/^[a-zA-Z0-9 _  - . , :]+$/", $password) ===0)
{
echo"<font color=\"red\">invalid password</font>";
}

else if(strlen($user_id)<1 ||strlen($user_id)>15)
{
echo"<font color=\"red\">bad length of customerid</font>";
}
else if(strlen($fname)<1 ||strlen($fname)>15)
{
echo"<font color=\"red\">bad length of first name</font>";
}
 else if(strlen($lname)<1 ||strlen($lname)>15)
{
echo"<font color=\"red\">bad length of last name</font>";
}
else if(strlen($profetion)<1 ||strlen($profetion)>15)
{
echo"<font color=\"red\">bad length of profetion</font>";
}
 else if(strlen($phone)<1 ||strlen($phone)>16)
{
echo"<font color=\"red\">bad length of phone number</font>";
}
 else if(strlen($email)>30)
{
echo"<font color=\"red\">bad length of email</font>";
}
*/

else
{
echo"<br><br><br>";
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$file = addslashes(file_get_contents($_FILES["Photo"]["tmp_name"]));
	 $conn->query("SET NAMES 'utf8'");
 	 $select="select * from eprdf_supporter where ID='$ID'";
	  $selectresult=$conn->query($select);
	  $count=mysqli_num_rows($selectresult);
	  if($count!=0)
	  {
 $update="update eprdf_supporter set 
   ID ='$ID',First_Name='$fn',Middle_Name='$mn',Last_Name='$ln',
   Sex='$sex',Age='$age',Phone_Number='$pn',Email ='$email',Expriance='$ex',Education='$ed',Field_Of_Study='$fs',Field_of_Job='$fj',Resp='$Resp',Support_Party='$sp',Supporter_Year='$sy',Supporter_Status='$ss', Work_Place='$wp',Address='$add',Photo='$file' where ID='$ID'";
  $updateresult=$conn->query($update);
	if($updateresult)
	{
	echo ('<script type="text/javascript">  alert("Prosperity Party Supporter update successfully!!") </script>');
	}
	else
	{
	echo"<font color=\"red\"><b>the member data is not updated</b></font>";
	}
	}
	else if($count==0)
	{
	echo"<font color=\"red\"><b>the member data is not found in user table</b></font>";
	}		
	}
	}
	if(isset($exit))
	{
	exit();
	}
}

?>
</div>

</center>
			
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

</body>
</html>

<?php else : ?>
            <div align='center'><p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p></div>
 <?php endif; ?>

			<div id="footer"> 

			<?php
                include 'footer.php';
			?>
			</div>
		</div><!--close main-->	
	</body>
</html>
