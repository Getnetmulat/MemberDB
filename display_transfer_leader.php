<?php
include 'includes/header.php';
require('includes/tfpdf.php');
?>
<?php
include 'navbar.php'; ?>
       <div id="content">
		  <div id="container">
<div style="background-color:#D6DBDF  ;border-radius:5px;font-family:times;"> 
<p><span id ="header_logo">Welcome:[ <b><?php echo $_SESSION['username']; ?> ]&nbsp;&nbsp;&nbsp;            You are currently logged <?php echo $logged ?>.<a href="includes/logout.php">[Log Out!]</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("l").", ". date("M d") .", ". date("Y");?> </b> </p>

</div>
<table width="800px" height="0" bgcolor ="#FFFFCC">
 <tr>
	 <th height="9" colspan="5" align="center"> 
	    <h1 align="center">የኢሕአዴግ አመራሮች ንዑስ ኦርኔል መረጃ ቋት</h1> 
	 	<h1>
		<a href ="Add_Leader.php"><img src ='images/add.png' height="25px" width="30px">&nbsp;&nbsp;ይመዝግቡ</a>&nbsp;&nbsp;
		<a href ="search_Leader.php"><img src ='images/search.png'height="25px" width="30px">&nbsp;&nbsp;ይፈልጉ</a>&nbsp;&nbsp;
		<a href ="edit_leader.php"><img src ='images/edit.png' height="25px" width="30px">&nbsp;&nbsp;ያስተካክሉ</a>&nbsp;&nbsp;
		<a href ="delete_leader.php"><img src ='images/delete.png' height="25px" width="30px"'>&nbsp;&nbsp;ይሰርዙ</a>&nbsp;&nbsp;
		<a href ="display_leader.php"><img src ='images/view.png' height="25px" width="30px">&nbsp;&nbsp;ይመልከቱ</a>&nbsp;&nbsp;
		<a href ="import_leader.php"><img src ='images/upload.PNG' height="25px" width="30px">&nbsp;&nbsp;መረጃ ይጫኑ [Import]</a>
		<a href ="view_leader_doc.php"><img src ='images/photo/folder.png' height="25px" width="30px">&nbsp;&nbsp;የትምህርት መረጃ</a>
		<a href ="transfer_Leader.php">&nbsp;&nbsp;ዝውውር</a>
       </h1>
       </th>
   </tr>
</table>
<br>
              <div class="content_item">
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
	elseif($_GET['field']=='First_Name')
		   $field = "First_Name";
	elseif($_GET['field']=='Middle_Name')
		   $field = "Middle_Name";
	elseif($_GET['field']=='Sex')
		   $field="Sex";
	elseif($_GET['field']=='R_Resp_In_Gov')
		   $field="R_Resp_In_Gov";
	elseif($_GET['field']=='R_Resp_In_Org')
		   $field="R_Resp_In_Org";
	elseif($_GET['field']=='Party')
		   $field="Party";
		elseif($_GET['field']=='T_Resp_In_Gov')
		   $field="T_Resp_In_Gov";
		elseif($_GET['field']=='T_Resp_In_Org')
		   $field="T_Resp_In_Org";
    elseif($_GET['field']=='T_Place')
		   $field="T_Place";
	}
	$rowsPerPage = 20;// rows per page
	if(isset($_GET['page'])){// if $_GET
		$pageNum= $_GET['page'];
	}else
		$pageNum = 1;
	$previousRows =($pageNum - 1) * $rowsPerPage;// preceding rows
	$sql = "SELECT *
				FROM leader_transfer    
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
					FROM  leader_transfer ";// Find the number of rows in the query
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
	echo "<table width=\"100%\" align=\"center\" border=\"0\" cellpadding=\"3\">"; //Open Table\
	echo "	<tr>
                 
                
				<th nowrap width='3%'><a href='$phpself?sorting=$sort&field=ID&page=$pageNum'>መ/ቁ </a></th>
				<th nowrap width='18%'><a href='$phpself?sorting=$sort&field=First_Name&page=$pageNum'>ስም </a></th>
				<th nowrap width='18%'><a href='$phpself?sorting=$sort&field=Middle_Name&page=$pageNum'>የአባት ስም </a></th>
				<th nowrap width='5%'><a href='$phpself?sorting=$sort&field=Sex&page=$pageNum'>ፆታ</a></th>
				<th nowrap width='10%'><a href='$phpself?sorting=$sort&field=R_Resp_In_Org&page=$pageNum'>የመንግሰት ኃላፊነት</a></th>
				<th nowrap width='15%'><a href='$phpself?sorting=$sort&field=R_Resp_In_Org&page=$pageNum'>የድርጅት ኃላፊነት</a></th>
				<th nowrap width='15%'><a href='$phpself?sorting=$sort&field=Party&page=$pageNum'> ብሔራዊ ድርጅት</a></th>
				<th nowrap width='15%'><a href='$phpself?sorting=$sort&field=R_Place&page=$pageNum'> አድራሻ</a></th>
				<th nowrap width='10%'><a href='$phpself?sorting=$sort&field=T_Resp_In_Gov&page=$pageNum'>የሚዛወርበት የመንግሰት  ኃላፊነት</a></th>
				<th nowrap width='15%'><a href='$phpself?sorting=$sort&field=T_Resp_In_Org&page=$pageNum'>የሚዛወርበት የድርጅት ኃላፊነት</a></th>
				<th nowrap width='15%'><a href='$phpself?sorting=$sort&field=T_Place&page=$pageNum'> የሚዛወሩበት አድራሻ</a></th>
				<th nowrap width='5%'><a href=''>Edit</a></th>
				<th nowrap width='5%'><a href=''>Del</a></th>
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
		   echo "
		     
						<td nowrap>".$row['ID']."</td>
						<td nowrap>".$row['First_Name']."</td>
						<td nowrap>".$row['Middle_Name']."</td>
						<td nowrap>".$row['Sex']."</td>
						<td nowrap>".$row['R_Resp_In_Gov']."</td>
						<td nowrap>".$row['R_Resp_In_Org']."</td>
						<td nowrap>".$row['Party']."</td>
						<td nowrap>".$row['R_Place']."</td>

						<td nowrap>".$row['T_Resp_In_Gov']."</td>
						<td nowrap>".$row['T_Resp_In_Org']."</td>
						<td nowrap>".$row['T_Place']."</td>	        


				";
				
if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members` WHERE `role`='ADMIN' AND `id`=".$_SESSION['user_id'].""))!=0)
			     {
echo "
<td nowrap> <a href='edit_leader.php?ID=".$row['ID']."'>
<img src='images/b_edit.png' alt='Edit leaders'></a></td>			
<td nowrap> <a href='delete_leader.php?ID=".$row['ID']."'>
<img src='images/b_drop.png' alt='Delete EPRDF Leaders Data' onclick='return confirm('ARE YOU SURE YOU WANT TO DELETE ".$row['ID']."?!\n Click OK to confirm!');'></a></td>
";
}

				


		}
	}
}
	echo "</table>"; //Close Table
	echo "<br>" . $first . $prev . " Showing page <bold>$pageNum</bold> of <bold>$lastPage</bold>.  " . $next . $last;//We print the links depending on our selections above
	echo "</div><!--close content_text--><br style=\"clear:both\"/></div><!--close content-->"; //Close Content DIV
	
else : 
	header('Location: ./index.php');
endif; 
	?>
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
	