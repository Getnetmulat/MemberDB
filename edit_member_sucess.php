<?php
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
	sec_session_start();
    
		if (login_check($mysqli) == true) : 
		if(isset($_POST['cmdSubmit']))
{
$ID=$_POST['ID'];
$fn=$_POST['First_Name'];
$mn=$_POST['Middle_Name'];
$ln=$_POST['Last_Name'];
$sex=$_POST['Sex'];
$age=$_POST['Age'];
$pn=$_POST['Phone_Number'];
$email=$_POST['Email'];
$ed=$_POST['Education'];
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
$Amount=$_POST['Amount'];
$Photo=$_POST['Photo'];
	
$sql = "UPDATE member 
    	SET 
		First_Name =  '".$fn."',
		Middle_Name =  '".$mn."',
		Last_Name =  '".$ln."',
		Sex =  '".$sex."',
		Age =  ".$age.",
		Phone_Number =  '".$pn."',
		Email =  '".$email."',
		Education =  '".$ed."',
		Field_Of_Study =  '".$fs."',
		Expriance =  '".$ex."',
		Resp_In_Gov =  '".$rg."',
		Resp_In_Org =  '".$ro."',
		Work_Place =  '".$wp."',
		Party =  '".$Party."',
		Membership_Year =  ".$my.",
		status =  '".$status."',
		Strength =  '".$Strength."',
		Weakness =  '".$Weakness."',
		Grade =  '".$Grade."',
		P_Region =  '".$pr."',
		P_Zone =  '".$pz."',
		P_Woreda =  '".$pw."',
		R_Region =  '".$rr."',
		R_Zone =  '".$rz."',
		R_Woreda =  '".$rw."',
		
		Amount =  '".$Amount."',
		Photo =  '".$Photo."',
						
		WHERE ID = ".$ID."";
	
			$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
			if (!$conn){
				die('Could not connect: ' . mysql_error());
			}

			
	  $updateresult=mysqli_query($update,$conn);
	if($updateresult)
	{
echo ('<script type="text/javascript">  alert("EPRDF Member updated successfully") </script>');
	}
	else
	{
	echo"<font color=\"red\"><b>the EPRDF Member data is not updated</b></font>";
	}
	}
	
?>			
<?php else : 
	header('Location: ./index.php');
endif; ?>
			</div><!--close site_content-->	
			<div id="footer">  
				
				<?php
                include 'footer.php';
			?>
			</div><!--close footer-->	
		</div><!--close main-->	
	</body>
</html>
