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
<br>

<div class="card-body">
<div class="table-responsive">
<?php if (login_check($mysqli) == true) 
   if(isset($_POST['cmdSubmit'])) 
   { 

$City=$_POST['City'];
$Sub_City=$_POST['Sub_City'];
$Woreda=$_POST['Woreda'];
$Farmer_Party=$_POST['Farmer_Party'];
$Farmer_Cell=$_POST['Farmer_Cell'];
$Farmer_Male=$_POST['Farmer_Male'];
$Farmer_Female=$_POST['Farmer_Female'];

$Elit_Party=$_POST['Elit_Party'];
$Elit_Cell=$_POST['Elit_Cell'];
$Elit_Male=$_POST['Elit_Male'];
$Elit_Female=$_POST['Elit_Female'];

$Labader_Party=$_POST['Labader_Party'];
$Labader_Cell=$_POST['Labader_Cell'];
$Labader_Male=$_POST['Labader_Male'];  
$Labader_Female=$_POST['Labader_Female'];

$Teacher_Party=$_POST['Teacher_Party'];
$Teacher_Cell=$_POST['Teacher_Cell'];
$Teacher_Male=$_POST['Teacher_Male'];  
$Teacher_Female=$_POST['Teacher_Female'];

$Student_Party=$_POST['Student_Party'];
$Student_Cell=$_POST['Student_Cell'];
$Student_Male=$_POST['Student_Male'];  
$Student_Female=$_POST['Student_Female'];

$City_Party=$_POST['City_Party'];
$City_Cell=$_POST['City_Cell'];
$City_Male=$_POST['City_Male'];  
$City_Female=$_POST['City_Female'];

$Small_Enterprise_Party=$_POST['Small_Enterprise_Party'];
$Small_Enterprise_Cell=$_POST['Small_Enterprise_Cell'];
$Small_Enterprise_Male=$_POST['Small_Enterprise_Male'];  
$Small_Enterprise_Female=$_POST['Small_Enterprise_Female'];

$PublicServant_Party=$_POST['PublicServant_Party'];
$PublicServant_Cell=$_POST['PublicServant_Cell'];
$PublicServant_Male=$_POST['PublicServant_Male'];  
$PublicServant_Female=$_POST['PublicServant_Female'];

$Balehabit_Party=$_POST['Balehabit_Party'];
$Balehabit_Cell=$_POST['Balehabit_Cell'];
$Balehabit_Male=$_POST['Balehabit_Male'];  
$Balehabit_Female=$_POST['Balehabit_Female'];

if($City==""||$Sub_City==""||$Woreda=="")
{

echo"<font color=\"red\">Please enter All required fields Correctly!!</font>";
 echo "<a href ='Zone_Organ.php'><h4> Please Add Prosperity City Organization Carefully!!</h4></a>";
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

 $sql = "INSERT INTO city_Organ(
      City,Sub_City,Woreda,Farmer_Party,Farmer_Cell,Farmer_Male,Farmer_Female,Elit_Party,Elit_Cell,Elit_Male,
      Elit_Female,Labader_Party,Labader_Cell,Labader_Male,Labader_Female,Teacher_Party,Teacher_Cell,Teacher_Male,Teacher_Female,Student_Party,Student_Cell,Student_Male,
      Student_Female,City_Party,City_Cell,City_Male,City_Female,Small_Enterprise_Party,Small_Enterprise_Cell,
      Small_Enterprise_Male,Small_Enterprise_Female,PublicServant_Party,PublicServant_Cell,PublicServant_Male,
      PublicServant_Female,Balehabit_Party,Balehabit_Cell,Balehabit_Male,Balehabit_Female) 
VALUES(  
	'$City','$Sub_City','$Woreda','$Farmer_Party','$Farmer_Cell','$Farmer_Male','$Farmer_Female','$Elit_Party','$Elit_Cell','$Elit_Male','$Elit_Female','$Labader_Party','$Labader_Cell','$Labader_Male','$Labader_Female','$Teacher_Party','$Teacher_Cell','$Teacher_Male','$Teacher_Female','$Student_Party','$Student_Cell','$Student_Male','$Student_Female','$City_Party','$City_Cell','$City_Male','$City_Female','$Small_Enterprise_Party','$Small_Enterprise_Cell','$Small_Enterprise_Male','$Small_Enterprise_Female','$PublicServant_Party','$PublicServant_Cell','$PublicServant_Male','$PublicServant_Female','$Balehabit_Party','$Balehabit_Cell','$Balehabit_Male','$Balehabit_Female')";

						
$sql1result=$conn->query($sql);
if($sql1result==1)
{
echo '<h3 align="center"><font color ="Green"> City Organaization Recoreded Successfully.</br>';
echo '<font color ="black"><a href ="View_City_Organ.php"><font color ="black">  View the Registrered Data. </a></h3>';
}

}

$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
if (!$conn){
die('Could not connect: ' . mysql_error());
}
			//mysqli_query($conn, $sql)	or die(mysql_error());  
			//header("Location: display_trainee.php");///?sorting=ASC&field=ID
   }

   	//header('Location:../index.php');
	

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
