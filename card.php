
<?php
 //include "includes/header.php";
			
 include_once 'includes/db_connect.php';
 include_once 'includes/functions.php';
 require "vendor/autoload.php";
//if(!isset($_COOKIE['adminid'])&&$_COOKIE['adminemail']){ header('location:index.php');
  //    exit;}
	

$serial="0001";
$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();
$code = $Bar->getBarcode($serial, $Bar::TYPE_CODE_128);
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>Prosperity Part ID Card</title>
<style>
  body{
		  	background:#008080;
		  }
#bg {
  width: 1000px;
  height: 450px;
 
  margin:60px;
 	float: left; 
  background:lime;
 		
}

#id {
  width:250px;
  height:450px;
  position:absolute;
  opacity: 0.88;
font-family: sans-serif;

		  	transition: 0.4s;
		  	background-color: #FFFFFF;
		  	border-radius: 2%;
		}

#id::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: url('images/PPLogo.png');   /*if you want to change the background image replace logo.png*/
  background-repeat:repeat-x;
  background-size: 250px 450px;
  opacity: 0.2;
  z-index: -1;
  text-align:center;
 
}
 .container{
		  	font-size: 12px;
		  	font-family: sans-serif;
		    
		  }
		 .id-1{
		  	transition: 0.4s;
		  	width:250px;
		  	height:450px;
		  	background: #FFFFFF;
		  	text-align:center;
		  	font-size: 16px;
		  	font-family: sans-serif;
		  	float: left;
		  	margin:auto;		  	
		  	margin-left:270px;
		  	border-radius:2%;

		  	
		  }
</style>
	</head>
<?php 
$conn = mysqli_connect(HOST,USER,PASSWORD,DATABASE);
$conn->query("SET character_set_results=utf8");
$conn->query("SET NAMES 'utf8'");

$sqluse ="SELECT * FROM leader WHERE id=1 ";
$retrieve = mysqli_query($conn,$sqluse);
    $numb=mysqli_num_rows($retrieve); 
	while($foundk = mysqli_fetch_array($retrieve))
	     {
          $profile= $foundk['First_Name'];
				  $name = $foundk['Middle_Name'];
          //$Party=$found['Party'];
		}
?>
	<body>
		<script type="text/javascript">	
 		
 	window.print();
 </script>
 
      <div id="bg">
            <div id="id">
            	 <table>
        <tr> <td>
        	<?php if($numb!=0 ){
                                    
                                    
if($profile!=""){echo"<img src='media/$profile'  width='70px' height='70px' alt=''>";}
									else{
										 echo"<img src='images/love.png' alt='Avatar'  width='70px' height='70px'>";
									    }	   
                               }else{
			?>
        	<img src="images/love.png" alt="Avatar"  width="70px" height="70px"> <?php }?>
        	</td>
        <td><h3><b>የብልጽግና ፓርቲ አባላት ዲጅታል መታወቂያ </b></h3></td>
       </tr>        
    </table><center>
        <?php  
                $id = $_POST['ID'];
                $sqlmember ="SELECT * FROM leader WHERE ID='$id' ";
			       $retrieve = mysqli_query($conn,$sqlmember);
				    $count=0;
                     while($found = mysqli_fetch_array($retrieve))
	                 {
                       $id=$found['ID'];
                       $Membership_Year=$found['Membership_Year'];
                       $First_Name=$found['First_Name'];
                       $Middle_Name=$found['Middle_Name'];
                       $Last_Name=$found['Last_Name'];
                       $gender=$found['Sex'];
                       $status=$found['status'];
                        $Party=$found['Party'];
                       $Resp_In_Gov=$found['Resp_In_Gov'];
                      $R_Region=$found['R_Region'];
                      $R_Zone=$found['R_Zone'];
                      $R_Woreda=$found['R_Woreda'];
                      $names=$First_Name. " ".$Middle_Name." ".$Last_Name;
						  $profile= $found['Photo'];
					 }  	 

             	 	
             	 	if($profile!=""){  
                echo '<img src=".images/$profile" class="img-circle" height="100" width="100" class="img-thumnail" /> '; 
    //echo"<img src='data:picture/jpeg,./images/$profile' height='175px' width='200px' alt='' style='border: 2px solid black;'>";	   
									    }
								else{
									echo"<img src='admin/images/profile.jpg' height='175px' width='200px' alt='' style='border: 2px solid black;'>";	   
														     	
									} 
             	 	 ?>   </center>             
           <div class="container" style="margin-left:5px; " >
      <p style="font-weight: bold;margin-top:1%">መ/ቁ:
        <u><?php if(isset($id))echo $Membership_Year;echo "/";{ echo$id;}  ?></u></p>
      <p style="font-weight: bold; margin-top:-4%">ስም:
      	<u><?php if(isset($names)){ $namez=$First_Name.' '.$names;echo$names;} ?></u></p>
      	<p style="font-weight: bold;margin-top:-4%">ዖታ:
        
      	<u><?php if(isset($gender)){ echo$gender;} ?></u></p>
       
      	<p style="font-weight: bold;margin-top:-4%">የክልል/የከተማ ጽ/ቤት :
      	<u><?php if(isset($Party)){ echo$Party;} ?></u></p> 
        <p style="font-weight: bold;margin-top:-4%">ኃላፊነት:
       <u> <?php if(isset($Resp_In_Gov)){ echo$Resp_In_Gov;} ?></u></p>
        <p style="font-weight: bold;margin-top:-4%">ክልል/ከተማ:
        <u><?php if(isset($R_Region)){ echo$R_Region;} ?></u></p>
        <p style="font-weight: bold;margin-top:-4%">ዞን/ክ/ከተማ:
        <u><?php if(isset($R_Zone)){ echo$R_Zone;} ?></u></p> 
        <p style="font-weight: bold;margin-top:-4%">ወረዳ/ቀበሌ:
        <u><?php if(isset($R_Woreda)){ echo$R_Woreda;} ?></u></p>    	
      	<p style="margin-top:-4%">የባልመታወቂያው ፊርማ ---------</p>
              
      </div>
            </div>
            <div class="id-1">
    	 
                     	 <center><img src="images/PPLogo.png" alt="Avatar" width="180px" height="135px" >        
       <div class="container" align="center">
      
      	<h4 style="color:#000;margin-left:2%">ፎቶ ግራፋቸውና ስማቸው በመታወቂያው ላይ የተገለጸው 
          <h3 style="color:#00BFFF;margin-left:2%">የ<u><?php if(isset($Party)){ echo $Party;}?></u> ክልል ብልጽግና ፓርቲ ጽ/ቤት </h3><u><b>አባል</b></u> መሆናቸውን እናረጋግጣለን፡፡ </h4>
       <p style="margin: auto;">የተሰጠበት ቀን ---------የሚያገለግልበት ቀን -------</p>
      <p style="margin:auto">If lost and found please return to the nearest police station</p>
        <hr align="center" style="border: 1px solid black;width:80%;margin-top:13%"></hr> 

      	<p align="center" style="margin-top:-2%">Authorised Signature</p>
      		<p> <?php if(isset($code)){ echo$code;}?>
      			</p>
      		 <h3><b>ብልጽግና ፓርቲ ጽ/ቤት</b></h3></center>
     </div>
</div>

        </div>
	</body>
</html>
