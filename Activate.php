<?php
include 'includes/header.php';

if (login_check($mysqli) == true) : 
?>
<?php
include 'sidebar.php'; ?>
 <div class="content-wrapper">
	<div align='right'>

<head>
<div class="card-body">
              <div class="table-responsive"> 
<style type="text/css">
* { margin:0px; padding:0px; font-family:Times; background-color:; color:;  }
a { text-decoration:none; }
.act { color:red; }
.deact { color:green;}
.header { width:650px; min-height:450px; border:0px green dashed; margin:0 auto; padding:10px; }
.left { float:left; font-size:15px; text-transform:uppercase; text-align:center; width:190px; min-height:20px; font-size:15px; border-bottom:1px #003 solid; padding:10px; }
.right { float:left; font-size:15px; text-transform:uppercase; text-align:center; width:190px; min-height:20px; font-size:15px; border-bottom:1px #003 solid; padding:10px; }
.left1 { float:left; text-align:center; width:190px; min-height:20px; border-right:0px #666 solid; font-size:20px; border-bottom:1px #666 solid; padding:5px; }
.right1 { float:left; text-align:center; width:190px; min-height:20px; border-left:0px #666 solid; font-size:20px; border-bottom:1px #666 solid; padding:5px; }

</style>
</head>

<h5 align="center">Admin Control Online Users List.</h5>
<div class="header">
<th>
<div class="left">ID</div>
<div class="left"> User Name </div>
<div class="right"> Status </div>
</th>
<?php 
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
   $conn->query("SET NAMES 'utf8'");
$select=$conn->query("select * from members");
while($row = mysqli_fetch_assoc($select))
{
$id=$row['id'];
$data=$row['username'];
$status=$row['status'];

?>
<div class="left1"> <?php echo $id?> </div>
<div class="left1"> <?php echo $data?> </div>
<div class="right1"> 
<?php
if(($status)=='0')
{
?>
<a href="action.php?status=<?php echo $row['id'];?>" 
 class="act" onclick="return confirm('Activate <?php echo $data?>');"> Deactivate </a>
<?php
}
if(($status)=='1')
{
?>
<a href="action.php?status=<?php echo $row['id'];?>" 
 class="deact" onclick="return confirm('De-activate <?php echo $data?>');"> Activate</a>
<?php
}
?>
</div>

<?php }?> 
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

		</div><!--close main-->	
	</body>
</html>
