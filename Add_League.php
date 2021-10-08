<!DOCTYPE html>

<?php
include 'includes/header.php';
?>
 
<?php if (login_check($mysqli) == true) : ?>
	
<?php
include 'sidebar.php'; ?>
	
 <div class="content-wrapper">

		<div align='right'>
<form action="Add_league_Sucess.php" method="POST" name="utf8" enctype="multipart/form-data" >
 <th height="29" colspan="5" align="center"> 
 <div style="background-color:#d6dbdf  ;border-radius:5px;font-family:times;"> 
<p><span id ="header_logo">Welcome: <b><?php echo $_SESSION['username']; ?> &nbsp;&nbsp;&nbsp;            You are currently logged <?php echo $logged ?>.<a href="includes/logout.php">Log Out!</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("l").", ". date("M d") .", ". date("Y");?> </b> </p>

</div> 
<div class="card-body">
              <div class="table-responsive">
<table width="100%" height="0" bgcolor ="#3f879d">
 <tr>
	 <th height="29" colspan="5" align="center"> 
	 <h4 align="center">የብልፅግና ፓርቲ ሴቶችና ወጣቶች ሊግ መረጃ ቋት</h4>
	 <h6 align="center">
    <p class="center">An asterisk (<span class="required_star"> * </span>) indicates a mandatory field.</p>
</h6>
</th>
</tr>
</table>

<table width="100%" height="0" bgcolor ="#77bdc0">	    
   
<tr>
 <td colspan="8">
 	<legend style="border:1px solid #999;
	border-radius:5px;
	box-shadow:0 0 5px #999;
	color: #fff;
	background: #858796;">
  <h5>ጥሬ ሀቅ መረጃዎች:</h5></legend></td>	</tr>
<tr> <td>&nbsp;</td>
  </tr>
<tr>
<td><div align="right">First Name
       </div>
<div align="right">ስም</div></td>
   <td><input  required name="First_Name" type="text" id="nameRequired" value="" size="30"> <span class="required_star"> * </span>
 </td>
									  
<td><div align="right">Middle Name
       </div>
<div align="right">የአባት ስም</div></td>
   <td><input required name="Middle_Name" type="text" id="pCode" value="" size="30" > <span class="required_star"> * </span>
 </td>
<tr> <td>&nbsp;</td>
  </tr>					
</tr>

<tr>
<td><div align="right">Last Name
       </div>
<div align="right">የአያት ስም </div></td>
   <td><input required name="Last_Name" type="text" id="pCode" value="" size="30" ><span class="required_star"> * </span> 
 </td>
									  
<td><div align="right">Sex<span class="required_star"> * </span>      </div>
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
  	<span class="required_star"> * </span</td>
									  
<td><div align="right">Email</div><div align="right">ኢሜል አድሬስ</div></td>
<td><input type="email" name="Email" id="pCode" value="" size="40"/><span class="Optional">Optional</span></td>
<tr>									  
<td><div align="right">Phone Number</div><div align="right">ስልክ ቁጥር</div></td>
<td><input  name="Phone_Number" type="int" id="pCode" value="+251-" size="20" ><span class="Optional">Optional</span>      </td>

<td><div align="right">League Member<span class="required_star"> * </span></div><div align="right">የሊግ አባል</div>
</td>
<td><input type ="radio" required name ="member" value ="Women">Women 
    <input type="radio" required name="member" value="Youth">Youth</td>
</tr>

<tr> <td>&nbsp;</td>
  </tr>
  
<tr>				  
  
  		<td><div align="right">Nation</div><div align="right">ብሔር</div></td>
  <td><input  name="Nation" type="text" id="pCode" value="" size="30" > <span class="required_star"> * </span>
</td>


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
 <h5>የትምህርት ዝግጅት:</h5></legend>	</td>	</tr>
<h5>
	<tr> <td>&nbsp;</td>
  </tr>
<tr> 
    <td><div align="right">Field Of Study</div>
	  <div align="right">የትምህርት መስክ</div></td>
       <td><input  required name="Field_Of_Study" type="text" id="pCode" value="" size="30" >  <span class="required_star"> * </span></td>
<td>
<div align="right">Attach Document (CV):</div><div align="right">የት/ት መረጃ ይጨምሩ</div></td>
<td><input type="file" name="file" />   <span class="required_star">*</span>   </td>
 <tr> <td>&nbsp;</td>

  </tr>
<tr>    
</td>				  
	<td><div align="right">Education Level</div><div align="right">የትምህርት ደረጃ</div>
</td>
<td>                                       
  <input  type ="text" required name="Education" size="30" value="" id="pCode">
<span class="required_star"> * </span>
	 </td>
	 <td><div align="right">Experiance on Political Leadership</div><div align="right">የአመራርነት የስራ ልምድ በዓመት</div></td>
	<td><input  required name="Leader_Experience" type="text" id="pCode" value="" size="20" onkeypress="return isNumberKey(this,event)"><span class="required_star"> * </span>
	</td>							  
 <tr> <td>&nbsp;</td>
	  </tr>
</tr>
	
<tr>					  			  
 <td><div align="right">Experiance on Other Profession</div><div align="right">የስራ ልምድ በዓመት</div></td>
	<td><input  required name="Expert_Experience" type="text" id="pCode" value="" size="20" onkeypress="return isNumberKey(this,event)"><span class="required_star"> * </span>
	<td><div align="right">Work Place</div><div align="right">የስራ ቦታ</div></td>
	<td><input  required name="Work_Place" type="text" id="pCode" value="" size="30" > <span class="required_star"> * </span>   
  </td>
</td>
	<tr> <td>&nbsp;</td>
 </tr></tr>
<tr>
	<td><div align="left">Responsibility In The Gov't</div><div align="right">በመንግስት ያለው ኃላፊነት</div></td>
  <td><input  name="Resp_In_Gov" type="text" id="pCode" value="" size="30" > <span class="Optional"> Optional </span>
</td>
 <td>
 	<div align="left">Responsibility In The Orgn.</div><div align="right">በድርጅት ያለው ኃላፊነት</div></td>
   <td><input  required name="Resp_In_Org" type="text" id="pCode" value="" size="30" ><span class="required_star"> * </span> 
	  </td>
	<tr> <td>&nbsp;</td>
</tr></tr>
</h5>
<tr> <td>&nbsp;</td>
  </tr>
<tr>
	<td colspan="8">
  	<legend style="border:1px solid #999;
	border-radius:5px;
	box-shadow:0 0 5px #999;
	color: #fff;
	background: #858796;">
	<h5>የአባልነት ሁኔታ:</h5></legend>	</td>	</tr>
	<tr> <td>&nbsp;</td>
  </tr>
   <tr>		 				         
	   <td><div align="right">Regional/City Office</div>
<div align="right">የክልል/ከተማ ጽ/ቤት</div></td>
   <td>     
    <select type ="text" required name="Party">
		<option value="">የክልል/ከተማ ጽ/ቤት ይምረጡ</option>
		
		<option value="Head Office">የብልፅግና ፓርቲ ዋና ጽ/ቤት</option>
			                <option value="Oromia">የኦሮሚያ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="አማራ ">የአማራ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
    	                    <option value="SNNPRS">የደቡብ ብሄሮች፣ ብሄረሰቦችና ህዝቦች ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Somali">የሶማሌ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Tigiray">የትግራይ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Afar">የአፋር ክልል ብልፅግና ፓርቲ</option>
		                    <option value="Benshangul">የቤንሻንጉል/ጉሙዝ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Gambela">የጋምቤላ  ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Hareri">የሐረሪ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="Sidama"> የሲዳማ ክልል ብልፅግና ፓርቲ ጽ/ቤት</option>
							<option value="AA">የአዲስ አበባ ብልፅግና ፓርቲ ጽ/ቤት</option>
		                    <option value="DD">ድሬዳዋ ብልፅግና ፓርቲ ጽ/ቤት</option>
							<option value="Federal">የፌደራል ተቋማት </option>
	</select>
<span class="required_star"> * </span>	
 </td>	 
					
<td><div align="right">Membership Year</div>
    <div align="right">የአባልነት ዘመን</div>
 </td>
<td>						  
<input required name="Membership_Year" type=" text" size="30" value="" id="pCode">
   <span class="required_star"> * </span>  
  </td>	
  <tr> <td>&nbsp;</td>
</tr>
   
<tr>				  
  					  
<td><div align="right">Strength<span class="required_star"> * </span></div><div align="right">ቁልፍ ጥንካሬ</div></td>
<td>
	<textarea  required name="Strength" cols="20" rows="2" id="textarea" onkeydown="textCounter(this.form.Strength,this.form.remLen2,125);" 
 onkeyup="textCounter(this.form.Strength,this.form.remLen2,125);"></textarea>
<font color="#663399">
<input readonly type=text name=remLen2 size="3" maxlength="3" value="125" />
</font><font color="#0000FF">Characters left</font><font color="#663399">&nbsp; 
</font>
</td>
<td><div align="right">Grade</div><div align="right">ደረጃ</div>
</td>
<td>
<select  type ="text" required required name="Grade">
	<option value="">ደረጃ ይምረጡ</option>
	<option value="A">A</option>
	<option value="B">B</option>
	<option value="C">C</option>
 </select>
<span class="required_star"> * </span>
</td>
</tr>
   <tr> <td>&nbsp;</td>
 </tr>
</tr>
<tr>			
  <td><div align="right">Weakness<span class="required_star"> * </span></div><div align="right">ቁልፍ ድክመት</div></td>
 <td><textarea  required name="Weakness" cols="20" rows="2" id="textarea2"
 onkeydown="textCounter(this.form.Weakness,this.form.remLen2,125);" 
onkeyup="textCounter(this.form.Weakness,this.form.remLen2,125);"></textarea>
 <font color="#663399"> 
<input readonly type=text name=remLen2 size=3 maxlength=3 value="125" />
</font><font color="#0000FF">Characters left</font><font color="#663399">&nbsp; 
  </font>
</td>								  
 <td><div align="right">Leadership Status</div><div align="right">የአመራርነት ሁኔታ</div></td>
   <td>  
 <select  type ="text" required name="status">
	<option value="">የአመራርነት ሁኔታ ይምረጡ</option>
	<option value="Federal Leader ">የፈፌዴራል አመራር</option>
	<option value="Region Leader ">የክልል አመራር</option>
	<option value="Zone Leader">የዞን አመራር</option>
	<option value="Woreda Leader">የወረዳ አመራር</option>
	<option value="Kebele Leader">የቀበሌ አመራር</option>
	<option value ="Member">የሊግ አባል</option>
 </select>
<span class="required_star"> * </span> 	</td> 			  
<tr> <td>&nbsp;</td>
  </tr>
</tr>
<tr>
 <td><div align="right">Membership Fee</div>
<div align="right">የአባልነት ክፍያ መጠን በብር</div></td>
  <td><input  required name="Amount" type="text" id="pCode" value="" size="20" onkeypress="return isNumberKey(this,event)"><span class="required_star"> * </span>   </td>
</tr>
<tr> <td>&nbsp;</td>
  </tr>
<tr>
	<td colspan="8">
  	<legend style="border:1px solid #999;
	border-radius:5px;
	box-shadow:0 0 5px #999;
	color: #fff;
	background: #858796;">
	<h5>የአመራርነት ስልጠና ሁኔታ:</h5></legend>	</td>	</tr>
	<tr> <td>&nbsp;</td>
  </tr>
<tr>
<td><div align="right">Training Center
       </div>
<div align="right">የስልጠናው ማዕከል</div></td>
   <td><input name="T_Center" type="text" id="pCode" value="" size="30" >
    <span class="Optional">Optional</span> 
 </td>
									  
<td><div align="right">Training Type
       </div>
<div align="right">የስልጠና አይነት</div></td>
     <td>  
 <select  type ="text" name="T_Type">
	<option value="">የአመራርነት ስልጠና አይነቱን ይምረጡ</option>
	<option value="Higher Leader">ከፍተኛ አመራር</option>
	<option value="Medium  Leader">መካከለኛ አመራር</option>
	<option value="Junior Leader">ጀማሪ አመራር</option>
	<option value="Expert">ባለሙያ</option>
	<option value="Not Trained">ስልጠና ያልወሰደ/ች</option>
 </select><span class="Optional">Optional</span></td>
<tr> <td>&nbsp;</td>
  </tr>					
</tr>

<tr>
<td><div align="right">Training Round
       </div>
<div align="right">የስልጠናው ዙር</div></td>
   <td><input name="T_Round" type="text" id="pCode" value="" size="30" ><span class="Optional">Optional</span>
 </td>
									  
<td><div align="right">Training Year      </div>
<div align="right">ስልጠና የተወሰደበት ዓ.ም</div></td>
  <td><input name="T_Year" type="text" id="pCode" value="" size="30" > <span class="Optional">Optional</span>
 </td>
<tr> <td>&nbsp;</td>
  </tr>					
</tr>

<tr>
	<td><div align="right">Training Result</div><div align="right">የስልጠና ውጤት</div>
</td>
<td>
<select  type ="text" name="T_Grade">
	<option value="">የስልጠና ውጤት ይምረጡ</option>
	<option value="A">A</option>
	<option value="B">B</option>
	<option value="C">C</option>
	<option value="NG">NG</option>
 </select>
 <span class="Optional">Optional</span>
</td>
</tr>
   <tr> <td>&nbsp;</td>
 </tr>
</tr>
<tr>
	<td colspan="8">
  	<legend style="border:1px solid #999;
	border-radius:5px;
	box-shadow:0 0 5px #999;
	color: #fff;
	background: #858796;">
	<h5>የትውልድ ቦታ</h5></legend>	</td>	</tr>
<tr> <td>&nbsp;</td>
  </tr>
<tr>
<td>
<div align="right">Region/City Administration</div><div align="right">ክልል/ከተማ አስተዳደር</div></td>					 
<td>     
    <select type ="text" required name="P_Region">
		<option value="">የተወለዱበትን ክልል/ከተማ አስተዳደር ይምረጡ</option>
		<option value="Addis Ababa (city) ">Addis Ababa (city) </option>
		<option value="Afar Region">Afar Region</option>
    	<option value="Amhara Region">Amhara Region</option>
		<option value="Benishangul-Gumuz Region">Benishangul-Gumuz Region</option>
		<option value="Dire Dawa (city) ">Dire Dawa (city) </option>
		<option value="Gambela Region">Gambela Region</option>
		<option value="Harari Region">Harari Region</option>
		<option value="Oromia Region">Oromia Region</option>
		<option value="Somali Region">Somali Region</option>
    	<option value="SNNP Region">SNNP Region</option>
    	<option value="Tigray Region">Tigray Region</option>
    	<option value="Sidama Region"> Sidama Region</option>
	</select>	
<span class="required_star"> * </span>
 </td>	 
	
<td>
<div align="right">Zone/Sub City</div><div align="right">ዞን/ክ/ከተማ</div></td>					 
<td>      
<input required name="P_Zone" type="text" id="pCode" value="" size="30" ><span class="required_star"> * </span> </td>
     <tr> <td>&nbsp;</td>
</tr>
</tr>
<tr>
<td>
<div align="right">Woreda</div><div align="right">ወረዳ</div></td>					 
<td>      
<input required name="P_Woreda" type="text" id="pCode" value="" size="30" ><span class="required_star"> * </span> </td>
<tr> <td>&nbsp;</td>
  </tr>
<tr>
	<td colspan="8">
  	<legend style="border:1px solid #999;
	border-radius:5px;
	box-shadow:0 0 5px #999;
	color: #fff;
	background: #858796;">
	<h5>የመኖሪያ አድራሻ:</h5></legend>	</td>	</tr>
	<tr> <td>&nbsp;</td>
  </tr>
<tr>
<td>
<div align="right">Region/City Administration</div><div align="right">ክልል/ከተማ አስተዳደር</div></td>					 
<td>     
    <select type ="text" required name="R_Region">
		<option value="">የሚኖሩበትን  ክልል/ከተማ አስተዳደር ይምረጡ</option>
		<option value="Addis Ababa (city) ">Addis Ababa (city) </option>
		<option value="Afar Region">Afar Region</option>
    	<option value="Amhara Region">Amhara Region</option>
		<option value="Benishangul-Gumuz Region">Benishangul-Gumuz Region</option>
		<option value="Dire Dawa (city) ">Dire Dawa (city) </option>
		<option value="Gambela Region">Gambela Region</option>
		<option value="Harari Region">Harari Region</option>
		<option value="Oromia Region">Oromia Region</option>
		<option value="Somali Region">Somali Region</option>
    	<option value="SNNP Region">SNNP Region</option>
    	<option value="Tigray Region">Tigray Region</option>
    	<option value="Sidama Region"> Sidama Region</option>
	</select>	<span class="required_star"> * </span>
 </td>	 
	
<td>
<div align="right">Zone/Sub City</div><div align="right">ዞን/ክ/ከተማ</div></td>					 
<td>      
<input required name="R_Zone" type="text" id="pCode" value="" size="30" ><span class="required_star"> * </span> </td>
     <tr> <td>&nbsp;</td>
</tr>
</tr>
<tr> 							 
	<td>
<div align="right">Woreda</div><div align="right">ወረዳ</div></td>					 
<td>      
<input required name="R_Woreda" type="text" id="pCode" value="" size="30" ><span class="required_star"> * </span> </td>
</tr>
</tr>
<tr> <td>&nbsp;</td>
  </tr>
<tr>
	<td colspan="8">
  	<legend style="border:1px solid #999;
	border-radius:5px;
	box-shadow:0 0 5px #999;
	color: #fff;
	background: #858796;">
	<h5>ፎቶ ይጨምሩ:</h5></legend>	</td>	</tr>
	<tr> <td>&nbsp;</td>
  </tr>
<tr>						  
 <td>
<div align="right">Photo:</div><div align="right"> ፎቶ</div></td>
<td><h6>Photo support must be .jpg,.png 
</h6></td>
<td>
<input type="file" required name="Photo" id="image" />
<span class="required_star">*</span>   </td>									<td>&nbsp;</td> 
</tr>
 <tr>			  
 <td><div align="right"></div></td>
 <td> <div align="right"> 
<br><br>
<input name="cmdSubmit" type="submit" id="cmdSubmit" value="ላክ"/>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input name="cmdReset" type="reset" id="cmdReset" value="አጽዳ" />
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
