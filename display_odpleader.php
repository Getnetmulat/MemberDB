
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


include 'navbar.php'; ?>
	
				<div id="content">
				  <div id="container">			
	<div style="background-color:#D6DBDF  ;border-radius:5px;font-family:times;"> 
<p><span id ="header_logo">Welcome:[ <b><?php echo $_SESSION['username']; ?> ]&nbsp;&nbsp;&nbsp;            You are currently logged <?php echo $logged ?>.<a href="includes/logout.php">[Log Out!]</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("l").", ". date("M d") .", ". date("Y");?> </b> </p>

</div>
	<table>
 <tr>
	 <th height="29" colspan="5" align="center"> 
	 <h1 align="center">የኢሕአዴግ አባላት ንዑስ ኦርኔል መረጃ ቋት</h1> 
	 	<h3>
		<a href ="Add_member.php"><img src ='images/add.png' height="25px" width="30px">&nbsp;&nbsp;ይመዝግቡ</a>&nbsp;&nbsp;
		<a href ="search_member.php"><img src ='images/search.png'height="25px" width="30px">&nbsp;&nbsp;ይፈልጉ</a>&nbsp;&nbsp;
		<a href ="search_member_more.php">Search More</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href ="edit_member.php"><img src ='images/edit.png' height="25px" width="30px">&nbsp;&nbsp;ያስተካክሉ</a>
		<a href ="delete_member.php"><img src ='images/delete.png' height="25px" width="30px"'>&nbsp;&nbsp;ይሰርዙ</a>&nbsp;&nbsp;
		<a href ="display_member.php"><img src ='images/view.png' height="25px" width="30px">&nbsp;&nbsp;ይመልከቱ</a>&nbsp;&nbsp;
		<a href ="import_member.php"><img src ='images/upload.PNG' height="25px" width="30px">&nbsp;&nbsp;መረጃ ይጫኑ</a>&nbsp;&nbsp;
		<a href ="#">&nbsp;&nbsp;የትምህርት መረጃ(CV)</a>&nbsp;&nbsp;
		
       </h3>
       </th>
   </tr>
</table>	
<br><br>
 
<center>
<form align=""  action="" method="post">

<table align=""  cellpadding="4" cellspacing="4">
<tr> 
	<td>&nbsp;</td>
	 <td height="29" colspan="3" align="center"><h3>Edit EPRDF members Profiles By ID:</h3></td>
</tr>
<tr>
<td rowspan="3"><img src ='images/doc8.jpg' width ='90' height ='50'></td>
<td><label>Search EPRDF members</label></td>
<td>
<?php
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
	 $conn->query("SET NAMES 'utf8'");
$sql="select ID from member where Party ='ODP' ORDER BY ID";
$result=$conn->query($sql);
	    echo "<select required name='ID'>"; 
	    echo "<option  value=''> <b>Select EPRDF member Id</b> </option>\n";
	    if(mysqli_num_rows($result)) 
	    { 
	    while($row = mysqli_fetch_assoc($result)) 
	    { 
		
	    echo "<option value='$row[ID]'>".$row['ID']."</option>\n"; 
	    } 	 
	    } 
	    else 
		{
	    echo "<option> No EPRDF member ID  present </option>\n";  
	    }
echo"</select>";
?>	
</td>
</tr>
<tr>
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
echo"<font color=\"red\">please select member id</font>";
}
else
{
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
	 $conn->query("SET NAMES 'utf8'");
$select="select * from member where ID='$ID'";
$selectresult=$conn->query($select);
while($user=mysqli_fetch_assoc($selectresult))
{

?>

<form action="" method="post" name="ian1" >
<table width="100%" height="0">
<center>
	<tr>
	<td colspan="8">
 	<legend style="border:1px solid #999;
  border-radius:20px;
  box-shadow:0 0 1px #999;
   font-family:ebrima;
   color:#058119;
 background: #8DC28D;">
  <h2>Update EPRDF members Information:</h2></legend></td></tr></center>
	<tr><tr>
 </tr></tr>
<tr>
<td>&nbsp;</td>
<td>መታወቂያ ቁጥር
</td>
<td><input type="text"  name="ID" value='<?php echo $user['ID'];?>' /></td>
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
<td>ብሔራዊ ድርጅት</td>
<td><input type="text"  name="Party" value='<?php echo $user['Party'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>የአባልነት ዘመን</td>
<td><input type="text"  name="Membership_Year" value='<?php echo$user['Membership_Year'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>ደረጃ</td>
<td><input type="text"  name="Grade" value='<?php echo$user['Grade'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>የስራ ቦታ</td>
<td><input type="text"  name="Work_Place"   value='<?php echo$user['Work_Place'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>

<tr>
<td>&nbsp;</td>
<td>በመንግስት ያለው ኃላፊነት</td>
<td><input type="text"  name="Resp_In_Gov" value='<?php echo $user['Resp_In_Gov'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>

<td>በድርጅት ያለው ኃላፊነት</td>
<td><input type="text"  name="Resp_In_Org" value='<?php echo$user['Resp_In_Org'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>[የስራ ልምድ በዓመት</td>
<td><input type="text"  name="Expriance" value='<?php echo$user['Expriance'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>

<td>የትውልድ ቦታ [ክልል]</td>
<td><input type="text"  name="P_Region" value='<?php echo$user['P_Region'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>የትውልድ ቦታ [ዞን]</td>
<td><input type="text"  name="P_Zone" value='<?php echo$user['P_Zone'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>የትውልድ ቦታ [ወረዳ]</td>
<td><input type="text"  name="P_Woreda" value='<?php echo$user['P_Woreda'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>

<tr>
<td>&nbsp;</td>
<td>Residence of Region</td>
<td><input type="text"  name="R_Region" value='<?php echo$user['R_Zone'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>

<td>Residence of Zone</td>
<td><input type="text"  name="R_Zone"   value='<?php echo$user['R_Woreda'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>Residence of Woreda</td>
<td><input type="text"  name="R_Woreda" value='<?php echo$user['R_Woreda'];?>' /></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Email</td>
<td><input type="text"  name="Email" value='<?php echo$user['Email'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>Strength</td>
<td><input type="text"  name="Strength"   value='<?php echo$user['Strength'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>Weakness</td>
<td><input type="text"  name="Weakness" value='<?php echo$user['Weakness'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<tr><td>&nbsp;</td>
<td>member Status</td>
<td><input type="text"  name="status" value='<?php echo$user['status'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>Phone Number</td>
<td><input type="text"  name="Phone_Number"   value='<?php echo$user['Phone_Number'];?>' /></td>

</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<tr><td>&nbsp;</td>
<td>ፎቶ</td>
<td><input type="file" name="Photo" value='<?php echo$user['Photo'];?>'/></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>የአባልነት ክፍያ</td>

<td><input type="text"  name="Amount"   value='<?php echo$user['Amount'];?>' /></td>

</tr>


</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr> 
<td>&nbsp;</td><td>&nbsp;</td>
<td colspan="3" text-align ="center"><input type="submit" name="updatemember" value="updatemember"></td>
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
$pn=$_POST['Phone_Number'];
$email=$_POST['Email'];
$ed=$_POST['Education'];
$fs=$_POST['Field_Of_Study'];
$ex=$_POST['Expriance'];
$rg=$_POST['Resp_In_Gov'];
$ro=$_POST['Resp_In_Org'];
$wp=$_POST['Work_Place'];
$Party=$_POST['Party'];
$my=$_POST['Membership_Year'];
$status=$_POST['status'];
$Strength=$_POST['Strength'];
$Weakness=$_POST['Weakness'];
$Grade=$_POST['Grade'];
$pr=$_POST['P_Region'];
$pz=$_POST['P_Zone'];
$pw=$_POST['P_Woreda'];
$rr=$_POST['R_Region'];
$rz=$_POST['R_Zone'];
$rw=$_POST['R_Woreda'];
$Amount=$_POST['Amount'];
$Photo=$_POST['Photo'];
if(isset($updatemember))
{
if($ID==""||$fn==""||$mn==""||$ln==""||$sex==""||$age==""||$pn==""||$email==""||$ed=="" ||$fs==""||$ex==""||$rg==""||$ro==""||$wp==""||$Party==""||$my==""||$status=="" ||$Strength==""||$Weakness==""||$Grade==""||$pr==""||$pz==""||$pw==""||$rr==""||$rz==""||$rw==""||$Amount==""||
	$Photo=="")
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
	 $conn->query("SET NAMES 'utf8'");
 	 $select="select * from member where ID='$ID'";
	  $selectresult=$conn->query($select);
	  $count=mysqli_num_rows($selectresult);
	  if($count!=0)
	  {
 $update="update member set 
       ID ='$ID',First_Name='$fn',Middle_Name='$mn',Last_Name='$ln',
       Sex='$sex',Age='$age',Phone_Number='$pn',Email ='$email',Expriance='$ex',Education='$ed',Field_Of_Study='$fs',
       Party='$Party',Membership_Year='$my',Grade='$Grade',
       Work_Place='$wp',Resp_In_Gov='$rg',Resp_In_Org='$ro',
       P_Region='$pr',P_Zone='$pz',P_Woreda='$pw',R_Region='$rr',
       P_Zone='$rz',R_Woreda='$rw',Strength='$Strength',
       Weakness='$Weakness',status='$status',Photo='$Photo',Amount='$Amount' where ID='$ID'";
  $updateresult=$conn->query($update);
	if($updateresult)
	{
	echo ('<script type="text/javascript">  alert("EPRDF member update successfully!!") </script>');
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
<br>
<?php else : ?>
            <div align='center'><p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p></div>
        <?php endif; ?>

</center>
</body>
</html>

 <!-- /.container-fluid -->	 		


<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>			
	