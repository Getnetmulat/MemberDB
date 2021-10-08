<?php
 include "includes/header.php";
			
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
    //sec_session_start();
	
?>

<?php  include 'sidebar.php';  ?>
<br>
<html>
<body>
	 <div class="content-wrapper">
	<div align='right'>
<div style="background-color:#D6DBDF; border-radius:5px;font-family:times;"> 
<p><span id ="header_logo">Welcome:[ <b><?php echo $_SESSION['username']; ?> ]&nbsp;&nbsp;&nbsp;            You are currently logged <?php echo $logged ?>.<a href="includes/logout.php">[Log Out!]</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("l").", ". date("M d") .", ". date("Y");?> </b> </p>

</div>
<br><br>
<div class="card-body">
              <div class="table-responsive">

<?php if (login_check($mysqli) == true) 
   if(isset($_POST['cmdSubmit'])) 
   { 

$fn=$_POST['First_Name'];
$mn=$_POST['Middle_Name'];
$ln=$_POST['Last_Name'];
$sex=$_POST['Sex'];
//$age=$_POST['Age'];
$email=$_POST['Email'];
$nation=$_POST['Nation'];
$pn=$_POST['Phone_Number'];
//$member=$_POST['member'];
$ed=$_POST['Education'];
//$dc=$_POST['file'];

$fs=$_POST['Field_Of_Study'];
$ex=$_POST['Expriance'];
$rg=$_POST['Resp_In_Gov'];
$ro=$_POST['Resp_In_Org'];
$wp=$_POST['Work_Place'];
$Party=$_POST['Party'];
$my=$_POST['Membership_Year'];
$status=$_POST['status'];
$mo=$_POST['Member_organization'];
$Stock=$_POST['Stock'];
$Strength=$_POST['Strength'];
$Weakness=$_POST['Weakness'];
$Grade=$_POST['Grade'];
$pr=$_POST['P_Region'];
$pz=$_POST['P_Zone'];
$pw=$_POST['P_Woreda'];
$rr=$_POST['R_Region'];
$rz=$_POST['R_Zone'];
$rw=$_POST['R_Woreda'];
$Kebele=$_POST['Kebele'];
$Amount=$_POST['Amount'];

//$Photo=$_POST['Photo'];
//$day=$_POST['day'];
//$month=$_POST['month'];
$year=$_POST['year'];
$age = (date("md", date("u", mktime(0, $year))) > date("md") ? ((date("Y")-$year)+1):(date("Y")-$year));
//echo "<p>Your Age is: $age</p>";
$date=date("Y:m:d H:i:s a");
	$doc = rand(1000,100000)."-".$_FILES['file']['name'];
     $file_loc = $_FILES['file']['tmp_name'];
	 $file_size = $_FILES['file']['size'];
	 $file_type = $_FILES['file']['type'];
	 $folder="file/";
	
	// new file size in KB
	$new_size = $file_size/1024;  
	// new file size in KB
	
	// make file name in lower case
	$new_file_name = strtolower($doc);
	// make file name in lower case
	
	$final_file=str_replace(' ','-',$new_file_name);

if($fn==""||$mn==""||$ln==""||$sex==""||$age==""||$ro==""||$Party==""||$Stock==""||$mo==""||$Kebele==""||
	$my==""||$status==""||$pr==""||$pz==""||$pw==""||$rr==""||$rz==""||$rw==""||$Amount=="")
{

echo"<font color=\"red\">Please enter All required fields Correctly!!</font>";
 echo "<font color=\"#fff\"><a href ='Add_member.php'><h4> Please Add Prosperity Member Carefully!!</h4></a>";
}
/*
else if(!preg_match("/^[a-zA-Z ]*$/",$fn))
{
echo"<font color=\"red\">First Name should be alphabets and White Space only</font>";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$mn))
{
echo"<font color=\"red\">Middle Name should be alphabets and White Space only</font>";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$ln))
{
echo"<font color=\"red\">Last Name should be alphabets and White Space only</font>";
}

else if(!preg_match("/^[a-zA-Z ]*$/",$fs))
{
echo"<font color=\"red\">Field of Study should be alphabets only</font>";
}
else if(!is_numeric($ex) ||is_numeric($ex)<=0)
{
echo"<font color=\"red\">invalid Expriance Year </font>";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$wp))
{
echo"<font color=\"red\">Work Place should be alphabets only</font>";
}

else if(!preg_match("/^[a-zA-Z ]*$/",$ro))
{
echo"<font color=\"red\">Responsibility in Organaization should be alphabets only</font>";
}

else if(!preg_match("/^[a-zA-Z ]*$/",$pz))
{
echo"<font color=\"red\">Place of Zone should be alphabets only</font>";
}


else if(!preg_match("/^[a-zA-Z ]*$/",$rz))
{
echo"<font color=\"red\">Residence of Zone should be alphabets only</font>";
}

else if(!preg_match("/^[a-zA-Z ]*$/",$Strength))
{
echo"<font color=\"red\">Strength should be alphabets only</font>";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$Weakness))
{
echo"<font color=\"red\">Weakness should be alphabets only</font>";
}

else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\.\\+=_-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email))
 { 
 echo"<font color=\"red\">invalid Email</font>"; 
 }

else if(!is_numeric($Amount) ||is_numeric($Amount)<=0)
{
echo"<font color=\"red\">The Amount Paid is not Valid. </font>";
}
*/	 
else 
{
 $conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
 $conn->query("SET character_set_results=utf8");
 $conn->query("SET NAMES 'utf8'");
 
 if(!empty($_FILES['Photo']['tmp_name']) 
 && file_exists($_FILES['Photo']['tmp_name'])) 
 {
	$file = addslashes(file_get_contents($_FILES["Photo"]["tmp_name"])); 
} 

 
 $sql = "INSERT INTO  member(
      First_Name,Middle_Name,Last_Name,Sex,Age,Email,Nation,
Phone_Number,Education,file,Field_Of_Study,Expriance,Resp_In_Gov,Resp_In_Org,Work_Place,Party,Membership_Year,status,Member_organization,Stock,Strength,Weakness,Grade,P_Region,P_Zone,P_Woreda,R_Region,R_Zone,R_Woreda,Kebele,Amount,Photo) 
VALUES(  
'$fn','$mn','$ln','$sex','$age','$email','$nation','$pn','$ed','$final_file','$fs','$ex','$rg','$ro','$wp','$Party','$my','$status','$mo','$Stock','$Strength','$Weakness','$Grade','$pr','$pz','$pw','$rr','$rz','$rw','$Kebele','$Amount','$file')";
					
$sql1result=$conn->query($sql);
if($sql1result==1)
{
echo '<h3 align="center"><font color ="#1ba508" >Registered Successfully. Thanks!!'; echo '<br>';
echo '<font color ="#000"><a href ="display_member.php"><font color ="#120ba8"/>View the Registered Data.</h5> </a></h3>';
}
}

if($sql1result==0)
{
echo ('<script type="text/javascript">  alert("Please Check CV File or Photo Size is large. The Photo Size must be Passport size!!") </script>');
}
if(move_uploaded_file($file_loc,$folder.$final_file))
	{
}

if('Phone_Number' ==$pn)
{
echo '<script type="text/javascript">  alert("this phone  already asigned") </script>';
echo"<br>";
}
if($email!=0)
{
echo '<script type="text/javascript">  alert("Email already assigned") </script>';
echo"<br>";
}
	  $conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
			if (!$conn){
				die('Could not connect: ' . mysql_error());
			}
			//mysqli_query($conn, $sql)	or die(mysql_error());  
			//header("Location: display_trainee.php");///?sorting=ASC&field=ID
   }

   	//header('Location:../index.php');
	
 else
	//header('Location: ./index.php');
//endif; ?>
	
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

			<div id="footer"> 

			<?php
                include 'footer.php';
			?>
			</div>
		</div><!--close main-->	
	</body>
</html>

