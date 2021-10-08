<?php
include 'includes/header.php';
?>
<?php
//include 'sidebar.php'; ?>
 

	 <div class="card-body">
              <div class="table-responsive">
<form method="post" action="" width="70%">
<table width ='80%' align="center" bgcolor="#77bdc0" align="center">

   <tr>
	 <td align=''><img src ="images/doc3.png"></td>	
	 <td colspan=3 align='justify'> <h4> If you have any queries, you can reach us by Email or phone:</h4>
	<hr>
</td>
</tr>
	<tr>
		<th align='justify'>&nbsp;&nbsp;</th> 
		<th align='justify'><h6>Contact Person:</h6></th> 
		<th align='justify'><h6>Email:</h6></th>
		<th align='justify'><h6>Phone NO:</h6></th>
		<th align='justify'><h6>Position:</h6></th>
</tr>
	<tr>
		<td align='justify'>&nbsp;&nbsp;</td> 
		<td align='justify'>Getnet Mulat</td> 
		<td align='justify'>getnetmulat11@gmail.com</td>
		<td align='justify'>0910784735</td>
		<td align='justify'>Senior Software Developer and Administrator Expert</td>
</tr>

	<tr>
		<td align='justify'>&nbsp;&nbsp;</td> 
		<td colspan=3 align='justify'> <h5> Or You can reach us by E-mail:</h5></th> 
			<hr>
</tr>
	<tr>
		<td colspan=3 align='justify'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
<tr>
<center>
<td><br>
<big>User Name:</big><br><br>
<big>E-Mail Address:</big><br><br>
<big>Subject:</big><br><br>
<big>comment:</big><br><br><br><br>
<h5 align="center">
<input type="submit" name="send" value="Send  Comment"></center><br></h5>
</td>
<td>
<input type="text" required  name="user_name" title="User name is required"/><br><br>
<input type="text" required name="email" title="Email is required"/><br><br>
<input type="text" name="subject" required title="Subject is  required"/><br><br>
<textarea name="body"  required cols="30" rows="4" maxlength="100" title="comment is required" ></textarea><br>
</td>
<p align="right">
</tr><td><a href="index.php">Login Page</td>
</table>


</form>
<?php
if(isset($_POST['send']))
{

 $date=date("Y:m:d H:i:s a");
$uname=$_POST['user_name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$body=$_POST['body'];
$send=$_POST['send'];

if(isset($send))
{
// if(preg_match("/^[a-zA-Z_ -.,:]+$/", $uname)=== 0)
{
//echo"<font color=\"red\"> user name contains letteres  underscores </font>";
}

if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\.\\+=_-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email))
 { 
 echo('<script type="text/javascript">  alert(" Invalid Email!!") </script>');
 }

 else
 {
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$con="INSERT INTO contactus(user_name,email,subject,body,comment_Date)
VALUES ('$uname','$email','$subject','$body','$date')";
$sql1result=$conn->query($con);
if($sql1result ==1)
{
echo('<script type="text/javascript">  alert(" Comment seccessfuly send!! Thank You for your Suggestion") </script>');
}
if (!$sql1result)
echo mysqli_error();
}
}
}
?>
<br>

					</div><!--close content_text-->  		
							
				</div><!--close content-->	
               </div>				

			</div><!--close site_content-->	
			<div id="footer"> 
			<?php
                include 'footer.php';
			?>
			</div>
		</div><!--close main-->	
	</body>
</html>