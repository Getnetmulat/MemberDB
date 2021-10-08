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
$pn=$_POST['Phone_Number'];
$Add=$_POST['Address'];
$fs=$_POST['Field_Of_Study'];
$fj=$_POST['Field_of_Job'];
$ed=$_POST['Education'];
$ex=$_POST['Expriance'];
$wp=$_POST['Work_Place'];
$resp=$_POST['Resp'];
$sp=$_POST['Support_Party'];
$sy=$_POST['Supporter_Year'];
$ss=$_POST['Supporter_Status'];
//$Photo=$_POST['Photo'];
//$day=$_POST['day'];
//$month=$_POST['month'];
$year=$_POST['year'];
$age = (date("md", date("u", mktime(0, $year))) > date("md") ? ((date("Y")-$year)+1):(date("Y")-$year));
//echo "<p>Your Age is: $age</p>";

if($fn==""||$mn==""||$ln==""||$sex==""||$age==""||$Add=="" ||$wp==""||$sp==""||$sy==""||$ss=="")
{

echo"<font color=\"red\">Please enter All required fields Correctly!!</font>";
 echo "<a href ='Add_Supporter.php'><h4> Please Add Prosperity Pary Supporter's Carefully!!</h4></a>";
}
/*
else if(!preg_match("/^[a-zA-Z ]*$/",$fn))
{
echo"<font color=\"red\">First Name name should be alphabets and White Space only</font>";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$mn))
{
echo"<font color=\"red\">Middle Name name should be alphabets and White Space only</font>";
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

else if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\.\\+=_-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email))
 { 
 echo"<font color=\"red\">invalid Email</font>"; 
 }
*/
else
{
 $conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
 $conn->query("SET character_set_results=utf8");
 $conn->query("SET NAMES 'utf8'");
$file = addslashes(file_get_contents($_FILES["Photo"]["tmp_name"])); 

 $sql = "INSERT INTO eprdf_supporter(
      First_Name,Middle_Name,Last_Name,Sex,Age,Phone_Number,Email,Address,Field_Of_Study,
	  Field_of_Job,Education,Expriance,Work_Place,Resp,Support_Party,Supporter_Year,Supporter_Status,Photo) 
VALUES(  
	'$fn','$mn','$ln','$sex','$age','$pn','$email','$Add','$fs','$fj','$ed','$ex','$wp','$resp','$sp','$sy','$ss','$file')";

						
$sql1result=$conn->query($sql);
if($sql1result==1)
{ 
echo '<h3 align="center"><font color ="Green"> Registered Successfully.</br>';
echo '<font color ="#000"><a href ="display_Supporter.php"> <font color ="#120ba8"/>View the Registrered Data. </a></h3>';
}
if($sql1result==0)
{
echo ('<script type="text/javascript">  alert("Email or Phone Number is already exit.") </script>');
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
			
	</body>
</html>
