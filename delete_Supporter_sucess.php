<?php
include 'includes/header.php';
?>
 <br>  <br>  <br>  <br> 
<?php if (login_check($mysqli) == true) : 
					$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
					$ID = $_REQUEST['field1'];
					$sql = "DELETE FROM eprdf_supporter WHERE ID = '$ID'";
					 echo "<h3> The entire Supporter is Deleted Successfully !!</h3>";
					 echo "<a href ='delete_Supporter.php'> Back</a>";
					if (!$conn){
						die('Could not connect: ' . mysql_error());
					}
					mysqli_query($conn, $sql)	or die(mysql_error());
					//
else : 
	header('Location: ./index.php');
endif; ?>
			</div><!--close site_content-->	
			</div><!--close main-->	
			<div id="footer"> 
			<?php
                include 'footer.php';
			?>
			</div>		
		
	</body>
</html>
