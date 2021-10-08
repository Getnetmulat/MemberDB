<!DOCTYPE html>
<?php
include 'includes/header.php';
?>
 <?php
include 'sidebar.php'; ?>

<?php if (login_check($mysqli) == true) : ?>
				<div id="content">
				  <div id="container">
				  			
	<div style="background-color:#D6DBDF  ;border-radius:5px;font-family:times;"> 
<p><span id ="header_logo">Welcome:[ <b><?php echo $_SESSION['username']; ?> ]&nbsp;&nbsp;&nbsp;            You are currently logged <?php echo $logged ?>.<a href="includes/logout.php">[Log Out!]</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("l").", ". date("M d") .", ". date("Y");?> </b> </p>

</div>
<table width="100%" height="0" bgcolor ="#FFFFCC">
 <tr>
	 <th height="9" colspan="5" align="center"> 
	    <h1 align="center">የብልፅግና ፓርቲ አመራሮች መረጃ ቋት</h1> 
	 	
   </tr>
</table>
<br>
					<div class="">
						<h3>Delete trainee:</h3>
						<p>
							To delete a record of trainee, enter the Identification Number of that trainee and click the 'DELETE' key <br>below. The 'RESEST' key will clear the data entered from the ID textbox.
						</p>	
						
					<br style="clear:both"/> 
					<div align='center'>
					 
					  <h2>
						<table  width ="100%" height ="10">
						<form action="delete_leader_sucess.php" method="POST" name="ian1" >   						
								<br><br>
								<img src ='images/doc7.jpg' width ='90' height ='50'>
								Enter ID to delete:<input required name="field1" type="text" id="pCode" value="" size="10" >
								<input name="cmdSubmit" type="submit" id="cmdSubmit" value="Delete"/>
								<input name="cmdReset" type="reset" id="cmdReset" value="Reset" />
								
								
								
						</form>
				

						</div><!--close content_text--> 
                         </div><!--close content_text-->  	
                       </div>						 
					<br style="clear:both"/> 				
				</div><!--close content-->	 		
				

 <!-- /.container-fluid -->	 		
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
