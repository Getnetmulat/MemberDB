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


<?php if (login_check($mysqli) == true) 
   if(isset($_POST['cmdSubmit'])) 
   { 

$fn=$_POST['First_Name'];
$mn=$_POST['Middle_Name'];
$ln=$_POST['Last_Name'];
$sex=$_POST['Sex'];
//$age=$_POST['Age'];
$email=$_POST['Email'];
$pn=$_POST['Phone_Number'];
$member=$_POST['member'];
$ed=$_POST['Education'];
//$dc=$_POST['file'];

$fs=$_POST['Field_Of_Study'];
$ee=$_POST['Expert_Experience'];
$le=$_POST['Leader_Experience'];
$rg=$_POST['Resp_In_Gov'];
$ro=$_POST['Resp_In_Org'];
$wp=$_POST['Work_Place'];
$Party=$_POST['Party'];
$my=$_POST['Membership_Year'];
$nation=$_POST['Nation'];
$status=$_POST['status'];
$Strength=$_POST['Strength'];
$Weakness=$_POST['Weakness'];
$Grade=$_POST['Grade'];
$tg=$_POST['T_Grade'];
$tc=$_POST['T_Center'];
$tt=$_POST['T_Type'];
$ty=$_POST['T_Year'];
$tr=$_POST['T_Round'];
$pr=$_POST['P_Region'];
$pz=$_POST['P_Zone'];
$pw=$_POST['P_Woreda'];
$rr=$_POST['R_Region'];
$rz=$_POST['R_Zone'];
$rw=$_POST['R_Woreda'];
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


if($fn==""||$mn==""||$ln==""||$sex==""||$age==""||$ed=="" ||
	$fs==""||$le==""||$ro==""||$wp==""||$Party==""||$my==""||$status=="" ||
	$Strength==""||$Weakness==""||$Grade==""||$pr==""||$pz==""||
	$pw==""||$rr==""||$rz==""||$rw==""||$Amount=="")
{

echo"<font color=\"red\">Please enter All required fields Correctly!!</font>";
 echo "<font color=\"#fff\"><a href ='Add_League.php'><h4> Please Add Prosperity Party League Carefully!!</h4></a>";
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
else if(!is_numeric($age) ||strlen($age)>2 ||is_numeric($age)<=0)
{
echo"<font color=\"red\">invalid Age</font>";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$fs))
{
echo"<font color=\"red\">Field of Study should be alphabets only</font>";
}
else if(!is_numeric($le) ||is_numeric($le)<=0)
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
*/
else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\.\\+=_-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email))
 { 
 echo"<font color=\"red\">invalid Email</font>"; 
 }

else if(!is_numeric($Amount) ||is_numeric($Amount)<=0)
{
echo"<font color=\"red\">The Amount Paid is not Valid. </font>";
}
	 
else 
{
	$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
 $conn->query("SET character_set_results=utf8");
 $conn->query("SET NAMES 'utf8'");
$file = addslashes(file_get_contents($_FILES["Photo"]["tmp_name"])); 

if(move_uploaded_file($file_loc,$folder.$final_file))
	{
 
 $sql = "INSERT INTO  league(
      First_Name,Middle_Name,Last_Name,Sex,Age,Email,
Phone_Number,member,Education,file,Field_Of_Study,Expert_Experience,Leader_Experience,Resp_In_Gov,Resp_In_Org,Work_Place,Party,Membership_Year,Nation,status,Strength,Weakness,Grade,T_Grade,T_Center,T_Type,T_Year,T_Round,P_Region,P_Zone,P_Woreda,R_Region,R_Zone,R_Woreda,Amount,Photo) 
VALUES(  
'$fn','$mn','$ln','$sex','$age','$email','$pn','$member','$ed','$final_file','$fs','$ee','$le','$rg','$ro','$wp','$Party','$my','$nation','$status','$Strength','$Weakness','$Grade','$tg','$tc','$tt','$ty','$tr','$pr','$pz','$pw','$rr','$rz','$rw','$Amount','$file')";
					
$sql1result=$conn->query($sql);
if($sql1result==1)
{
echo '<h1 align="center"><font color ="#08a372" >Registered Successfully. Thanks!!'; echo '<br>';
echo '<a href ="display_league.php"> <font color ="#120ba8">View the Registered Data. </a></h1>';
}


if($sql1result==0)
{
echo ('<script type="text/javascript">  alert("Please Check CV File or Photo Size is large. The Photo Size must be Passport size!!") </script>');
}
}
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



