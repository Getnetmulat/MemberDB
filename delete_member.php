<!DOCTYPE html>

<?php
include 'includes/header.php';
?>
 <?php
include 'navbar.php'; ?>

<?php if (login_check($mysqli) == true) : ?>
				<div id="content">
				  <div id="container">
				  			
	<div style="background-color:#D6DBDF  ;border-radius:5px;font-family:times;"> 
<p><span id ="header_logo">Welcome:[ <b><?php echo $_SESSION['username']; ?> ]&nbsp;&nbsp;&nbsp;            You are currently logged <?php echo $logged ?>.<a href="includes/logout.php">[Log Out!]</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("l").", ". date("M d") .", ". date("Y");?> </b> </p>

</div>
<table width="1280">
 <tr>
	 <th height="29" colspan="5" align="center"> 
	 <h1 align="center">የኢህአዴግ አባላት ንዑስ ኦርኔል መረጃ ቋት</h1> 
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
					<div class="content_item">
						<h3>Delete EPRDF Member:</h3>
						<p>
							To delete a record of EPRDF Member, enter the Identification Number of that EPRDF Member and click the 'DELETE' key <br>below. The 'RESEST' key will clear the data entered from the ID text box.
						</p>	
						
					<br style="clear:both"/> 
					<div align='center'>
					 
					  <h2>
						<table  width ="1280" height ="10">
						<form action="delete_member_sucess.php" method="POST" name="ian1" >   						
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
							
						
<?php else : 
	//header('Location: ./index.php');
endif; ?>
			</div><!--close site_content-->	
				
		</div><!--close main-->	
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
	