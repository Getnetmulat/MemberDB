<!DOCTYPE html>
<html>
	<head>
	
	<style>
		th, td {
		  text-align: left;
		  padding:0px;
		}

		tr:nth-child(even) {background-color: #f2f2f2;}
		tr:nth-child(odd) {background-color: #BDBDBD;}
		table {
 		  border-collapse: border;
 
		 }

		.topnav {
  
		  background-color: #333;
		  color: #f2f2f2;
		  text-align: center;
					font-family: cursive;
					  font-size: 0px;
		 }
	</style>
	</head>

<?php
include "includes/header.php";
			
	include_once 'includes/db_connect.php';
	include_once 'includes/functions.php';
    //sec_session_start();
require('includes/tfpdf.php');
?>
<?php
include 'sidebar.php'; ?>
       <div class="content-wrapper">

		<div align='right'>
<div style="background-color:#D6DBDF  ;border-radius:5px;font-family:times;"> 
<p><span id ="header_logo">Welcome:[ <b><?php echo $_SESSION['username']; ?> ]&nbsp;&nbsp;&nbsp;            You are currently logged <?php echo $logged ?>.<a href="includes/logout.php">[Log Out!]</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("l").", ". date("M d") .", ". date("Y");?> </b> </p>

</div>
<div class="card-body">
              <div class="table-responsive">
              <div class="content_item">
              	<table width="100%" height="0" bgcolor ="#3f879d">
 <tr>
	 <th height="9" colspan="5" align="center" bgcolor ="#3f879d"> 
	    <h4 align="center">የብልፅግና ፓርቲ ሴቶችና ወጣቶች ሊግ መረጃ ቋት</h4> 
	 	
   </th>
</tr>
</table>
<br>
<?php

if (login_check($mysqli) == true) : 
	$phpself = $_SERVER['PHP_SELF'];//we use ceil which rounds up the result, because if we have 4.2 as an answer, we'd need 5 pages.
	$field='ID';
	$sort='ASC';
	if(isset($_GET['sorting'])){
		if($_GET['sorting']=='ASC')
			$sort='DESC';
		else
			$sort='ASC';
	
	if($_GET['field']=='ID')
			$field = "ID";
	elseif($_GET['field']=='Photo')
		   $field = "Photo";
	elseif($_GET['field']=='First_Name')
		   $field = "First_Name";
	elseif($_GET['field']=='Middle_Name')
		   $field = "Middle_Name";
	elseif($_GET['field']=='Last_Name')
		   $field = "Last_Name";

	elseif($_GET['field']=='Sex')
		   $field="Sex";
	elseif($_GET['field']=='Age')
		   $field="Age";
	elseif($_GET['field']=='Education')
		   $field="Education";
	elseif($_GET['field']=='Field_Of_Study')
		   $field="Field_Of_Study";
	elseif($_GET['field']=='file')
		   $field="	file";
	elseif($_GET['field']=='Party')
		   $field="Party";
		elseif($_GET['field']=='Membership_Year')
		   $field="Membership_Year";
    elseif($_GET['field']=='Grade')
		   $field="Grade";
	}
	$rowsPerPage = 10;// rows per page
	if(isset($_GET['page'])){// if $_GET
		$pageNum= $_GET['page'];
	}else
		$pageNum = 1;
	$previousRows =($pageNum - 1) * $rowsPerPage;// preceding rows
	$sql = "SELECT *
				FROM league WHERE Age>=34 and member='Youth' and Party in ('South','ደቡብ')     
				ORDER BY $field $sort 
				LIMIT $previousRows, $rowsPerPage";
	$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
	 $conn->query("SET NAMES 'utf8'");
	if ($conn->connect_error)
		trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
	$result = $conn->query($sql);
	if($result === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
	}
	$sqlcount = "	SELECT COUNT(ID) 
					AS numrows 
					FROM league WHERE Age>=34 and member='Youth' and Party in ('South','ደቡብ')";// Find the number of rows in the query
	$resultcount = $conn->query($sqlcount);
	$rowcount = $resultcount->fetch_assoc();//use an associative array
	$numrows = $rowcount['numrows'];
	$lastPage = ceil($numrows/$rowsPerPage);// find the last page number
	if ($pageNum > 1){//if the current page is greater than 1, that is, it isn't the first page, then we print first and previous links
		$page = $pageNum - 1;
		$prev = " <a href=\"$phpself?page=$page&sorting=&field=$field\" title=\"Page $page\"><img src='images/arrow_left.png' alt='Back' width='30px' height='30px'></a> ";
		$first = " <a href=\"$phpself?page=1&sorting=&field=$field\" title=\"Page 1\"><img src='images/arrow_first.png' alt='First Page'></a> ";
	}else{//otherwise we do not print a link, because the current page is the first page, and there are no previous pages
		$prev = "<img src='images/arrow_left.png' alt='Back' width='30px' height='30px'>";
		$first = "<img src='images/arrow_first.png' alt='First Page'>";
	}
	if ($pageNum < $lastPage){// We print the links for the next and last page only if the current page isn't the last page
		$page = $pageNum + 1;
		$next = " <a href=\"$phpself?page=$page&sorting=&field=$field\" title=\"Page $page\"><img src='images/arrow_right.png' alt='Next' width='30px' height='30px'></a> ";
		$last = " <a href=\"$phpself?page=$lastPage&sorting=&field=$field\" title=\"Page $lastPage\"><img src='images/arrow_last.png' alt='Last Page'></a> ";
	}else{//the current page is the last page, so we don't print links for the last and next pages, there is of course no next page.
		$next = "<img src='images/arrow_right.png' alt='Next' width='30px' height='30px'>";
		$last = "<img src='images/arrow_last.png' alt='Last Page'>";
	}
	echo "<div id=\"content\"><div align='center'>"; //Open Content DIV
	echo "<table width=\"100%\" align=\"center\" border=\"0\" bgcolor =\"#3f879d\" cellpadding=\"3\">"; //Open Table\
	echo "	<tr> 
                
				<th nowrap width='5%'><a href='$phpself?sorting=$sort&field=ID &page=$pageNum'>ID  </a></th>

                 <th nowrap width='15%'><a href='$phpself?sorting=$sort&field=Photo &page=$pageNum'>Photo  </a></th>

				<th nowrap width='18%'><a href='$phpself?sorting=$sort&field=First_Name&page=$pageNum'>First Name </a></th>

				<th nowrap width='18%'><a href='$phpself?sorting=$sort&field=Middle_Name&page=$pageNum'>Middle Name </a></th>
				<th nowrap width='18%'><a href='$phpself?sorting=$sort&field=Last_Name&page=$pageNum'>Last Name </a></th>
				<th nowrap width='5%'><a href='$phpself?sorting=$sort&field=Sex&page=$pageNum'>Sex</a></th>
				<th nowrap width='5%'><a href='$phpself?sorting=$sort&field=Age&page=$pageNum'>Age </a></th>
				<th nowrap width='10%'><a href='$phpself?sorting=$sort&field=Education&page=$pageNum'>Education</a></th>
				
				<th nowrap width='15%'><a href='$phpself?sorting=$sort&field=Field_Of_Study&page=$pageNum'>Field Of Study</a></th>
				
				<th nowrap width='25%'><a href='$phpself?sorting=$sort&field=Party&page=$pageNum'> Region/City Office</a></th>
				<th nowrap width='15%'><a href='$phpself?sorting=$sort&field=Membership_Year&page=$pageNum'> Membership_Year</a></th>
				<th nowrap width='18%'><a href='$phpself?sorting=$sort&field=Grade&page=$pageNum'>Grade</a></th>
				<th nowrap width='25%'><a href='$phpself?sorting=$sort&field=file&page=$pageNum'> Document (CV)</a></th>
				
			</tr>";

	$numberOfRows = mysqli_num_rows($result);
	If ($numberOfRows == 0) {
		//echo 'Sorry No Record Found!';
	}
	else if ($numberOfRows > 0) {
		$i=0;
		while($row = $result->fetch_assoc()){
			while($row = $result->fetch_assoc()){
				if(($i%2)==0) {
					$bgcolor ='#FFFFFF';
				}else{
					$bgcolor ='#d3d3d3';//$bgcolor ='@C0C0C0';
				}			
		echo "<tr bgcolor='$bgcolor'>";// Open Table Row
		
              echo '
              <td nowrap>'.$row['ID'].'</td>
                 <td>  

              <img src="data:Photo;base64,'.base64_encode($row['Photo'] ).'" alt ="Photo" class="img-circle" style =" height :100px; width:100px;" class="img-thumnail" />  
              </td>    ';               
                  ?> 

 <script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg',]) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script>  
		<?php
		       echo '
		     
	<td nowrap>'.$row['First_Name'].'</td>
	<td nowrap>'.$row['Middle_Name'].'</td>
	<td nowrap>'.$row['Last_Name'].'</td>
	<td nowrap>'.$row['Sex'].'</td>
	<td nowrap>'.$row['Age'].'</td>
	<td nowrap>'.$row['Education'].'</td>
	';
	?>
	
<?php
	echo '
	<td nowrap>'.$row['Field_Of_Study'].'</td>				
	<td nowrap>'.$row['Party'].'</td>
	<td nowrap>'.$row['Membership_Year'].'</td>	
	<td nowrap>'.$row['Grade'].'</td>	        
';
?>
<td nowrap><a href="file/<?php echo $row["file"] ?>" target="_blank"><center><img src ="images/download.png" width ="80" height ="50" title="Download"></center></a></td>
<?php
				
if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members` WHERE `role`='ADMIN' AND `id`=".$_SESSION['user_id'].""))!=0)
			     {
echo "
<td nowrap> <a href='edit_league.php?ID=".$row['ID']."'>
<img src='images/b_edit.png' alt='Edit leagues'></a></td>			
<td nowrap> <a href='#?ID=".$row['ID']."'>
<img src='images/b_drop.png' alt='Delete EPRDF Leagues Data' onclick='return confirm('ARE YOU SURE YOU WANT TO DELETE ".$row['ID']."?!\n Click OK to confirm!');'></a></td>
";
        }
      }
	}
}
	echo "</table>"; //Close Table
	echo "<br>" . $first . $prev . " Showing page <bold>$pageNum</bold> of <bold>$lastPage</bold>.  " . $next . $last;//We print the links depending on our selections above
	echo "</div><!--close content_text--><br style=\"clear:both\"/></div><!--close content-->"; //Close Content DIV
	

?>
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
