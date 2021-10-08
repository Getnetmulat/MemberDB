<!DOCTYPE html>
<?PHP 
		include "includes/header.php";
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
	<table width="1280" height="0" bgcolor ="#FFFFCC">
 <tr>
	 <th height="9" colspan="5" align="center"> 
	    <h1 align="center">የኢሕአዴግ አመራሮች ንዑስ ኦርኔል መረጃ ቋት</h1> 
	 	
       </th>
       </tr>
       </table>	
<br>
 
<center>
<form align=""  action="" method="post">

<table align="" width="1280" cellpadding="4" cellspacing="4">
<tr> 
	<td>&nbsp;</td>
	 <td height="29" colspan="3" align="center"><h3>Edit EPRDF Leaders Profiles By ID:</h3></td>
</tr>
<tr>
<td rowspan="3"><img src ='images/doc8.jpg' width ='90' height ='50'></td>
<td><label>Search EPRDF Leaders</label></td>
<td>
<?php
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
	 $conn->query("SET NAMES 'utf8'");
$sql="select ID from leader where Party ='SDP' ORDER BY ID";
$result=$conn->query($sql);
	    echo "<select required name='ID'>"; 
	    echo "<option  value=''> <b>Select Leader Id</b> </option>\n";
	    if(mysqli_num_rows($result)) 
	    { 
	    while($row = mysqli_fetch_assoc($result)) 
	    { 
		
	    echo "<option value='$row[ID]'>".$row['ID']."</option>\n"; 
	    } 	 
	    } 
	    else 
		{
	    echo "<option> No member id  present </option>\n";  
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
$select="select * from leader where ID='$ID'";
$selectresult=$conn->query($select);
while($user=mysqli_fetch_assoc($selectresult))
{

?>

<form action="" method="post" >
<table width="100%" height="0">
<center><h1> Update EPRDF Leader Information</h1></center>
	<tr><tr>
 <td colspan="8">
 	<legend style="border:1px solid #999;
	border-radius:50px;
	box-shadow:0 0 10px #999;
	background: #8DC28D;">

  <h2>ጥሬ ሀቅ መረጃዎች:</h2></legend></td>	</tr></tr>
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
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>የት/ት መረጃ</td>
<td><input type="file"  name="file" value='<?php echo$user['file'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>የትምህርት መስክ</td>
<td><input type="text"  name="Field_Of_Study" value='<?php echo$user['Field_Of_Study'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>ብሔራዊ ድርጅት</td>
<td><input type="text"  name="Party" value='<?php echo$user['Party'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>የአባልነት ዘመን</td>
<td><input type="text"   name="Membership_Year" value='<?php echo$user['Membership_Year'];?>' /></td>
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

<td>የትውልድ ቦታ ክልል/ከተማ አስተዳደር</td>
<td><input type="text"  name="P_Region" value='<?php echo$user['P_Region'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>የትውልድ ቦታ ዞን/ክ/ከተማ</td>
<td><input type="text"  name="P_Zone" value='<?php echo$user['P_Zone'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>የትውልድ ቦታ ወረዳ</td>
<td><input type="text"  name="P_Woreda" value='<?php echo$user['P_Woreda'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>

<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>የመኖሪያ አድራሻ ክልል/ከተማ አስተዳደር</td>
<td><input type="text"  name="R_Region" value='<?php echo$user['R_Zone'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>

<td>የመኖሪያ አድራሻ ዞን/ክ/ከተማ</td>
<td><input type="text"  name="R_Zone"   value='<?php echo$user['R_Woreda'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>የመኖሪያ አድራሻ ወረዳ </td>
<td><input type="text"  name="R_Woreda" value='<?php echo$user['R_Woreda'];?>' /></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>Email</td>
<td><input type="text"  name="Email" value='<?php echo$user['Email'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>መለያ ጥንካሬ</td>
<td><input type="text"  name="Strength"   value='<?php echo$user['Strength'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>መለያ ድክመት</td>
<td><input type="text"  name="Weakness" value='<?php echo$user['Weakness'];?>' /></td>
</tr>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>ስልጠና የወሰዱበት ማዕከል</td>
<td><input type="text"  name="T_Center"   value='<?php echo$user['T_Center'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>የአመራርነት ደረጃ</td>
<td><input type="text"  name="T_Type" value='<?php echo$user['T_Type'];?>' /></td>
</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
<td>&nbsp;</td>
<td>ስልጠና የወሰዱበት ዓ/ም</td>
<td><input type="text"  name="T_Year"   value='<?php echo$user['T_Year'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>በስልጠናው ያገኙት ውጤት</td>
<td><input type="text"  name="T_Grade" value='<?php echo$user['T_Grade'];?>' /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>የስልጠና ዙር</td>
<td><input type="text"  name="T_Round"   value='<?php echo$user['T_Round'];?>' /></td>

</tr>
<tr>
<tr><td>&nbsp;</td>
<td>የአመራርነት ሁኔታ</td>
<td><input type="text"  name="status" value='<?php echo$user['status'];?>' /></td>
<td>&nbsp;</td><td>&nbsp;</td>
<td>ስልክ ቁጥር</td>
<td><input type="text"  name="Phone_Number"   value='<?php echo$user['Phone_Number'];?>' /></td>

</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
	
<td>&nbsp;</td>
<td>የአባልነት ክፍያ</td>

<td><input type="text"  name="Amount"   value='<?php echo$user['Amount'];?>' /></td>




</tr>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr> 
<td>&nbsp;</td><td>&nbsp;</td>
<td colspan="3" text-align ="center"><input type="submit" name="updatemember" value="መረጃውን ይቀይሩ"></td>
<td colspan="3"><input type="submit" name="exit" value="ይዝጉ"/> </td>
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
$dc=$_POST['file'];
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
$tc=$_POST['T_Center'];
$tt=$_POST['T_Type'];
$tr=$_POST['T_Round'];
$tg=$_POST['T_Grade'];
$ty=$_POST['T_Year'];
$Amount=$_POST['Amount'];
//$file=$_POST['Photo'];
if(isset($updatemember))
{
if($ID==""||$fn==""||$mn==""||$ln==""||$sex==""||$age==""||$pn==""||$email==""||$ed=="" ||$fs==""||$ex==""||$rg==""||$ro==""||
	$wp==""||$Party==""||$my==""||$status=="" ||$Strength==""||
	$Weakness==""||$Grade==""||$pr==""||$pz==""||$pw==""||
	$rr==""||$rz==""||$rw==""||$pw==""||$tc==""||$tt==""||
	$tr==""||$ty==""||$tg==""||$Amount=="")
{
	echo '<br>';
echo"<font color=\"red\"><p>መረጃውን በትክክል አልተቀየረም!! እንደገና ደግመው ይሞክሩ!!</p></font>";
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
 	 $select="select * from leader where ID='$ID'";
	  $selectresult=$conn->query($select);
	  $count=mysqli_num_rows($selectresult);
	  if($count!=0)
	  {
 $update="update leader set 
           ID ='$ID',First_Name='$fn',Middle_Name='$mn',
           Last_Name='$ln',Sex='$sex',Age='$age',
           Education='$ed',file='$dc',Field_Of_Study='$fs',
          Party='$Party',Membership_Year='$my',Grade='$Grade',
          Work_Place='$wp',Resp_In_Gov='$rg',Resp_In_Org='$ro',
          P_Region='$pr',P_Zone='$pz',P_Woreda='$pw',
          R_Region='$rr',P_Zone='$rz',R_Woreda='$rw',
          Strength='$Strength',Weakness='$Weakness',
          status='$status',Email ='$email',
          Phone_Number='$pn',
          Expriance='$ex',T_Center='$tc',T_Type='$tt',
          T_Round='$tr',T_Year='$ty',T_Grade='$tg',Amount='$Amount' where ID='$ID'";
  $updateresult=$conn->query($update);
	if($updateresult)
	{
	echo ('<script type="text/javascript" font size =\"16\">  document.write("መረጃውን በትክክል ቀይረዋል!!") </script>');
	}
	else
	{
	echo"<font color=\"red\" font size =\"16\"><b>መረጃውን በትክክል አለተቀየረም!! እንደገና ደግመው ይሞክሩ!!</b></font>";
	}
	}
	else if($count==0)
	{
	echo"<font color=\"red\"><b>መረጃውን በትክክል አለተቀየረም!! እንደገና ደግመው ይሞክሩ!!</b></font>";
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
	