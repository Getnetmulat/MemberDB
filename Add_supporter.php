<?php
include 'includes/header.php';
?>
 
<?php if (login_check($mysqli) == true) : ?>
	
<?php
include 'sidebar.php'; ?>
	
    <div class="content-wrapper">
	<div align='right'>
<form action="Add_Supporter_Sucess.php" method="POST" name="utf8" enctype="multipart/form-data">
 <th height="29" colspan="5" align="center"> 
 <div style="background-color:#D6DBDF  ;border-radius:5px;font-family:times;"> 
<p><span id ="header_logo">Welcome: <b><?php echo $_SESSION['username']; ?> &nbsp;&nbsp;&nbsp;            You are currently logged <?php echo $logged ?>.<a href="includes/logout.php">Log Out!</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("l").", ". date("M d") .", ". date("Y");?> </b> </p>

</div> 
<div class="card-body">
              <div class="table-responsive">
<table width="100%" height="0" bgcolor ="#FFFFCC">
 <tr>
	 <th height="29" colspan="5" align="center"> 
	 <h3 align="center">የብልፅግና ፓርቲ ደጋፊዎች መረጃ ቋት</h3>       
        <p align="center">An asterisk (<span class="required_star"> * </span>) indicates a mandatory field. </p>
</th>
</tr>	
<table width="100%" height="0" bgcolor ="#77bdc0">	    
   
<tr>
 <td colspan="8">
 	<legend style="border:1px solid #999;
	border-radius:5px;
	box-shadow:0 0 5px #999;
	color: #fff;
	background: #858796;">
  <h3>ጥሬ ሀቅ መረጃዎች:</h3></legend></td>	</tr>

<tr>
<td><div align="right">First Name :
       </div>
<div align="right">ስም</div></td>
   <td><input required name="First_Name" type="text" id="pCode" value="" size="30" > <span class="required_star"> * </span>
 </td>
									  
<td><div align="right">Middle Name :
       </div>
<div align="right">የአባት ስም</div></td>
   <td><input required name="Middle_Name" type="text" id="pCode" value="" size="30" > <span class="required_star"> * </span>
 </td>
<tr> <td>&nbsp;</td>
  </tr>					
</tr>

<tr>
<td><div align="right">Last Name :
       </div>
<div align="right">የአያት ስም </div></td>
   <td><input required name="Last_Name" type="text" id="pCode" value="" size="30" > <span class="required_star"> * </span>
 </td>
									  
<td><div align="right">Sex:<span class="required_star"> * </span>      </div>
<div align="right">ፆታ</div></td>
  <td><input type ="radio" required name ="Sex" value ="M">Male
    <input type="radio" required name="Sex" value="F">Female</td>
<tr> <td>&nbsp;</td>
  </tr>					
</tr>
<tr>
<td><div align="right">የትውልድ ዘመን</div>
<div align="right">Year of Birth (GC)</div></td>
  <td>
        <select name="year" required>
					<option value="">የትውልድ ዘመን ይምረጡ</option>
					<?php 
					for($year=1920;$year<=2250;$year++)
					{
					echo "<option value='$year'>$year</option>";
					}
					?>

				</select>
				<span>እድሜ</span>
  	<span class="required_star"> * </span>   </td>
									  
<td><div align="right">Email:</div><div align="right">ኢሜል</div></td>
<td><input type="email" name="Email" id="pCode" value="" size="30"/><span class="Optional">Optional</span></td>
<tr> <td>&nbsp;</td>
  </tr>					
</tr>
<tr>									  
<td><div align="right">Phone Number:</div><div align="right">ስልክ ቁጥር</div></td>
<td><input  name="Phone_Number" type="int" id="pCode" value="" size="30" > <span class="Optional">Optional</span>     </td>									  
<td><div align="right">Current Address:</div><div align="right">አድራሻ</div></td>
<td><input  required name="Address" type="int" id="pCode" value="" size="30" > <span class="required_star">*</span>     </td>
</tr>

<tr> <td>&nbsp;</td>
  </tr>					
</tr>

<tr>
 <td colspan="6">
 	<legend style="border:1px solid #999;
	border-radius:5px;
	box-shadow:0 0 5px #999;
	color: #fff;
	background: #858796;">
 <h3>የትምህርት ዝግጅት:</h3></legend>	</td>	</tr>
<h3>
<tr> 
    <td><div align="right">Field Of Study:</div>
	  <div align="right">የትምህርት መስክ</div></td>
       <td><input  name="Field_Of_Study" type="text" id="pCode" value="" size="30" >   
       	<span class="Optional">Optional</span>  
</td>
				  
	<td><div align="right">Educational Level:</div><div align="right">የትምህርት ደረጃ</div>
</td>
<td>                                       
	<input  type ="text" name="Education" id="pCode" value="" size="30" >
<span class="Optional">Optional</span>
	 </td>							  
 <tr> <td>&nbsp;</td>
	  </tr>
</tr>
	
<tr>					  			  
 <td><div align="right">Experiance:</div><div align="right">
 የስራ ልምድ በዓመት</div></td>
	<td><input  name="Expriance" type="text" id="pCode" value="" size="30" onkeypress="return isNumberKey(this,event)"><span class="Optional">Optional </span></td>
	<td><div align="right">Work Place:</div><div align="right">የስራ ቦታ</div></td>
	<td><input  required name="Work_Place" type="text" id="pCode" value="" size="30" > <span class="required_star"> * </span>
  </td>
</td>
	<tr> <td>&nbsp;</td>
 </tr></tr>
<tr>
	<td><div align="right">Responsibility:</div><div align="right">ኃላፊነት</div></td>
  <td><input  name="Resp" type="text" id="pCode" value="" size="30" > 
  	<span class="Optional">Optional </span>
</td>
 <td><div align="right">Field of Job:</div><div align="right">የተሰማሩበት የስራ መስክ</div></td>
  <td><input type="text" required name="Field_of_Job"  id="pCode" value="" size="30" > <span class="required_star"> * </span>
</td>
	<tr> <td>&nbsp;</td>
</tr></tr>
</h3>
<tr>
	<td colspan="8">
  	<legend style="border:1px solid #999;
	border-radius:5px;
	box-shadow:0 0 5px #999;
	color: #fff;
	background: #858796;">
	<h3>የደጋፊነት ሁኔታ:</h3></legend>	</td>	</tr>
   <tr>		 				         
	   <td><div align="right">Region/City Office you Support:</div>
<div align="right">የሚደግፉት ክልል/ከተማ ጽ/ቤት</div></td>
   <td>     
    <select type ="text" required name="Support_Party"> 
		<option value="">የሚደግፉትን ክልል/ከተማ ጽ/ቤት ይምረጡ</option>
							<option value="Head Office">ብልፅግና ፓርቲ ዋና ጽ/ቤት</option>
		                    <option value="Oromia">የኦሮሚያ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Amhara">የአማራ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
    	                    <option value="South">የደቡብ ብሄሮች፣ ብሄረሰቦችና ህዝቦች  ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Somali">የሶማሌ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Tigiray">የትግራይ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Afar">የአፋር ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Benshangul">የቤንሻንጉል/ጉሙዝ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Gambela">የጋምቤላ  ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Hareri">የሐረሪ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Sidama"> የሲዳማ ክልል ብልፅግና ፓርቲ</option>
							<option value="AA">የአዲስ አበባ ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="DD">ድሬዳዋ ብልፅግና ፓርቲ ጽ/ቤት</option>
	</select>	<span class="required_star"> * </span>
 </td>	 
					
<td><div align="right">Supporter's Year:</div>
    <div align="right">የደጋፊነት ዘመን</div>
 </td>
<td>						  
<input type="number" required name="Supporter_Year" value="" id="pCode" size="30"> 
  
		<span class="required_star"> * </span>  
  </td>		    
	<tr> <td>&nbsp;</td>
</tr>

<tr>		 				         
	   <td><div align="right">Supporter's Status:</div>
<div align="right">የደጋፊነት ሁኔታ</div></td>
   <td>     
    <select type ="text" required name="Supporter_Status">
		<option value="">select Supporter Status</option>
		<option value="Local">Local</option>
		<option value="Foreign">Foreign</option>
    	
	</select>	<span class="required_star"> * </span>
 </td>	 
 </tr>

<tr>
	<td colspan="8">
  	<legend style="border:1px solid #999;
	border-radius:5px;
	box-shadow:0 0 5px #999;
	color: #fff;
	background: #858796;">
	<h3>ፎቶ ይጨምሩ:</h3></legend>	</td>	</tr>
<tr>						  
 <td>
<div align="right">Photo:</div><div align="right">ፎቶ</div></td>
<td><input type="file" name="Photo" />   <span class="Optional">Optional</span>   </td>									 
 <td>&nbsp;</td>
</tr>
 <tr>			  
 <td><div align="right"></div></td>
 <td> <div align="left"> 
<br><br>
<input name="cmdSubmit" type="submit" id="cmdSubmit" value="ላክ/Send"/>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input name="cmdReset" type="reset" id="cmdReset" value="አጽዳ/Clear" />
      </div>
    </td>
<td>&nbsp;</td>
     </tr>
   </table>
</fieldset>
 </form>
</div><!--close content_text-->
 </div>					
	<br style="clear:both"/> 				
</div><!--close content-->	 		
			
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
