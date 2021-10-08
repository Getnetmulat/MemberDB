<!DOCTYPE html>
<html>
<?PHP 
    include "includes/header.php";
    include_once 'includes/db_connect.php';
    include_once 'includes/functions.php';
    //sec_session_start();
  ?>

<?php
  if (login_check($mysqli) == true) : 
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <!-- /.navbar -->

  <?php
  include 'sidebar.php';
?>
 
  <div align='right'>
<div style="background-color:#D6DBDF; border-radius:5px;font-family:times;"> 
<p><span id ="header_logo">Welcome:[ <b><?php echo $_SESSION['username']; ?> ]&nbsp;&nbsp;&nbsp;            You are currently logged <?php echo $logged ?>.<a href="includes/logout.php">[Log Out!]</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("l").", ". date("M d") .", ". date("Y");?> </b> </p>
</span></p></div>
</div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Left navbar links -->
       
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>

                  <?php
                     $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
 
                    $sql = "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM `leader` WHERE 
                   Party in('Oromia','ኦሮሚያ','Oromiyaa','oromiya','oromia prosperity party') ||
                   party in('Amhara','አማራ') || 
                   party in('SNNPR','SNNPRS','SNNP','ደቡብ','South','የደቡብ ብሄር ብሄራሳቦችና ህዝቦች ክልላዊ መንግስት ብልፅግና ፓርቲ ጽ/ቤት','ብልፅግና','ደ/ብ/ብ/ህብልፅግና ፓርቲ','ደ/ብ/ብ/ህ/ክ/መ')|| R_Zone ='ካፋ' || 
                   Party in('Federal','ፌዴራል') ||
                   party in('ሶማሌ','ሱማሌ','Somali','kebridahar woreda') || 
                   party in('ቤንሻንጉል/ጉሙዝ','BG','Benshangul') || 
                   party in('Afar','አፋር')||
                   party in('ጋምቤላ','Gambela','Gambella') || 
                   party in('Sidama','Sidaama','ሲዳማ') || 
                   party in('Harari','Hareri','ሐረሪ') ||
                   party in('Addis Ababa','AA','አዲስ አበባ','አአ')|| 
                   party in('ድሬዳዋ','ድሬደዋ','ድ/ድ','DD')";
                      
                      $connStatus = $conn->query($sql);
                       
                      $PPLeaderTotalRegisterd = mysqli_num_rows($connStatus);
                       
                      echo $PPLeaderTotalRegisterd; 
                     $conn->close();
                      ?>
                                       

                </h3>

                <p>የአመራሮች ስታትስቲካል መረጃ</p>
              </div>
              <div class="icon">
                
              </div>
              <a href="display_leader.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php
                     $con = mysqli_connect("localhost", "Getnet", "Getnet23", "eprdf_mdb");
 
                     $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM league WHERE  Party in('Oromia','ኦሮሚያ','Oromiyaa','oromiya') ||
                         party in('Amhara','አማራ') || 
                         party in ('SNNPR','SNNPRS','SNNP','ደቡብ','South') || 
                         Party in('Federal','ፌዴራል') ||
                         party in ('ሶማሌ','ሱማሌ','Somali') || 
                         party in ('ቤንሻንጉል/ጉሙዝ','BG','Benshangul') || 
                         party in('Afar','አፋር')||
                         party in('ጋምቤላ','Gambela','Gambella') || 
                         party in ('Sidama','Sidaama','ሲዳማ') || 
                         party in('Harari','ሐረሪ') ||
                         party in('Addis Ababa','AA','አዲስ አበባ','አአ')|| 
                         party in('ድሬዳዋ','ድሬደዋ','ድ/ድ','DD')"));
       
                           echo $count;

                       ?>
                         
                       </h3>

                <p>የሊጎች ስታትስቲካል መረጃ</p>
              </div>
              <div class="icon">
                
              </div>
              <a href="leagueDashboard.php" class="small-box-footer">የሊጎች ዳሽቦርድ<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php
                     $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
 
                   $sql = "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM `member` WHERE
                   Party in('Oromia','ኦሮሚያ','Oromiyya','Bul.mag.sabbata','Oromiya') ||
                   party in('Amhara','አማራ') || 
                   party in ('SNNPR','SNNPRS','SNNP','ደቡብ','South') || 
                   Party in('Federal','ፌዴራል') ||
                   party in ('ሶማሌ','ሱማሌ','Somali')|| P_Region='ERER' || 
                   party in ('ቤንሻንጉል/ጉሙዝ','BG','Benshangul') || 
                   party in('Afar','አፋር')||
                   party in('ጋምቤላ','Gambela','Gambella') || 
                   party in ('Sidama','Sidaama','ሲዳማ') || 
                   party in('Harari','Hareri','ሐረሪ') ||
                   party in('Addis Ababa','AA','አዲስ አበባ','አአ')|| 
                   party in('ድሬዳዋ','ድሬደዋ','ድ/ድ','DD')";
 
                         $connStatus = $conn->query($sql);
 
                           $PPMemberTotalRegisterd = mysqli_num_rows($connStatus);
 
                            echo $PPMemberTotalRegisterd; 
                               //this echo out the total number of rows returned from the query
 
                            $conn->close();
                           ?>
                          
                        </h3>

                <p>የአባላት ስታትስቲካል መረጃ</p>
              </div>
              <div class="icon">
                
              </div>
              <a href="display_member.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php
                     $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                      $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM  eprdf_supporter WHERE 
                   Support_Party in('Oromia','ኦሮሚያ','Oromiyaa','oromiya') ||
                   Support_Party in('Amhara','አማራ','አማራ ብልፅግና ፓርቲ') || 
                   Support_Party in ('SNNPR','SNNPRS','SNNP','ደቡብ','South') || 
                   Support_Party in('Federal','ፌዴራል') ||
                   Support_Party in ('ሶማሌ','ሱማሌ','Somali') || 
                   Support_Party in ('ቤንሻንጉል/ጉሙዝ','BG','Benshangul') || 
                   Support_Party in('Afar','አፋር')||
                   Support_Party in('ጋምቤላ','Gambela','Gambella') || 
                   Support_Party in ('Sidama','Sidaama','ሲዳማ') || 
                   Support_Party in('Harari','ሐረሪ') ||
                   Support_Party in('Addis Ababa','AA','አዲስ አበባ','አአ')|| 
                   Support_Party in('ድሬዳዋ','ድሬደዋ','ድ/ድ','DD')"));
                           echo $count;
                     ?>
                     </h3>

                <p>የደጋፊዎች ስታትስቲካል መረጃ</p>
              </div>
              <div class="icon">
                
              </div>
              <a href="display_supporter.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

          <div class="col-lg-14 col-28">
            <!-- small box -->
            <div class="small-box bg-info" align="center">
              <div class="inner">
                <h3 style="background-color:lime;">
                    <h4 align="center"> የብልፅግና ፓርቲ አባላት ወደ ዋናው መረጃ ቋት  የተመዘገቡ  ከዕቅዱ አንፃር ሲታይ </h4>
                

        <?php
                     $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                     echo "<hr>";
//this echo out the total number of rows returned from the query
                            

                      $PP_plan=10133311;
                      $PPMemberRegisterd = $PPLeaderTotalRegisterd+$PPMemberTotalRegisterd; 
                      $PP_performance =(($PPMemberRegisterd)*100/$PP_plan);
                      echo "<h4 align='center'> ጠቅላላ ድምር:  "; echo $PPLeaderTotalRegisterd+$PPMemberTotalRegisterd;
                      echo "<br>";echo "<br>";
                        
                        echo "አፈፃፀም:    "; echo round($PP_performance,2); echo "% </h4>";
                           echo "</div";
                         
                        

                            $conn->close();
                           ?>

                        </h3>

                
              </div>
            </div>
          <!-- ./col -->
 </div>

<hr>

          <!-- Small boxes (Stat box) -->
        <div class="row">
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 align="center">
                        <h5 align="center">የፌዴራል ተቋማት ብልፅግና ፓርቲ
                       <hr>
                  <?php 
                  if (login_check($mysqli) == true)
       {  
      
      if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='FO' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                     $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                    
                        $countf = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM leader where Party in('Federal','ፌዴራል')"));
 
                           echo $countf;  echo "<p>አመራሮች፡<a href='filter_foleader.php' class='small-box-footer' style='color:#070707;'>View Leaders </a> 
                            </p>"; 
                      
                           $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM league where party='Federal' or party='ፌዴራል '"));
 
                           echo $count;  echo "<p>ሊጎች:<a href='filter_foleague.php' class='small-box-footer' style='color:#070707;'>View Leagues </a>  
                            </p>"; 
                           $countf1 = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM member where Party in('Federal','ፌዴራል')"));
 
                           echo $countf1;  echo "<p>አባላት:<a href='filter_fomember.php' class='small-box-footer' style='color:#070707;'>View Members </a>  
                           </p>"; 
                            $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM eprdf_supporter where Support_Party='Federal' or Support_Party ='ፌዴራል '"));
 
                           echo $count;  echo "<p>ደጋፊዎች:<a href='filter_fosupporter.php' class='small-box-footer' style='color:#070707;'>View Supporters </a> 
                           
                            </p>"; 
                           
                            echo "<hr>";
                            echo "<p> ጠቅላላ ድምር:   "; echo $countf+$countf1; echo "&nbsp;"; echo "&nbsp;</p>"; 
                             $Federal_plan=4144;
                           $Federal_performance =(($countf+$countf1)*100/$Federal_plan);
                           echo "አፈፃፀም:  "; echo round($Federal_performance,2); echo '%';
                         }   
                       ?>
                      </h5>
                </h3>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                 <h3 align="center">
                        <h5 align="center">የኦሮሚያ ክልል ብልፅግና ፓርቲ
                       <hr>
                  <?php 
                  if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='OROMIA' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                     $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                    
                        $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Last_Name,Sex FROM leader where Party in('Oromia','ኦሮሚያ','Oromiyaa','oromiya')"));
 
                           echo $count;  echo "<p> አመራሮች:<a href='filter_oromialeader.php' class='small-box-footer' style='color:#070707;'>View Leaders </a> </p>"; 
                          
                           $count2 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM league where  party in('Oromia','oromiya','ኦሮሚያ','Oromiyaa')"));
                           echo $count2;  echo "<p> ሊጎች:<a href='filter_oromialeague.php' class='small-box-footer' style='color:#070707;'>View Leagues </a> </p>"; 
                           $count1 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM member where Party in('Oromia','ኦሮሚያ','Oromiyaa','oromiya')"));
 
                           echo $count1;  echo "<p> አባላት:<a href='filter_oromiamember.php' class='small-box-footer' style='color:#070707;'>View Members </a></p>"; 
                            $count3 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM eprdf_supporter where Support_Party='Oromia' or Support_Party='ኦሮሚያ'"));
 
                           echo $count3;  echo "<p>ደጋፊዎች:<a href='filter_oromiasupporter.php' class='small-box-footer' style='color:#070707;'>View Supporters </a> </p>"; 
                           echo "<hr>";
                            echo "ጠቅላላ ድምር:  "; echo $count+$count1; echo "&nbsp;"; echo "&nbsp;</br>"; 
                             $oromialeader_plan=3098850;
                           $performance =(($count+$count1)*100/$oromialeader_plan);
                           echo "አፈፃፀም:  "; echo round($performance,2); echo '%';
                         }
                       ?>
                      </h5>
                </h3>

              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 align="center">
                        <h5 align="center">የአማራ ክልል ብልፅግና ፓርቲ
                       <hr>
                  <?php 
                  if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='AMHARA' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                     $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                    
                        $counta = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Last_Name,Sex FROM leader where party in('Amhara','አማራ')"));
 
                           echo $counta;  echo "<p>አመራሮች:<a href='filter_amharaleader.php' class='small-box-footer' style='color:#070707;'>View Leaders </a>
                            </p>"; 
                      
                           $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Last_Name,Sex FROM league where party='Amhara' or party='አማራ'"));
 
                           echo $count;  echo "<p>ሊጎች:<a href='filter_amharaleague.php' class='small-box-footer' style='color:#070707;'>View Leagues </a>
                            </p>"; 
                           $counta1 = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Last_Name,Sex FROM member where party in('Amhara','አማራ')"));
 
                           echo $counta1;  echo "<p>አባላት:<a href='filter_amharamember.php' class='small-box-footer' style='color:#070707;'>View Members </a>
                           </p>"; 
                            $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM eprdf_supporter where Support_Party in('Amhara','አማራ','አማራ ብልፅግና ፓርቲ')"));
 
                           echo $count;  echo "<p>ደጋፊዎች:<a href='filter_amsupporter.php' class='small-box-footer' style='color:#070707;'>View Supporter </a>
                           
                            </p>"; 
                           
                            echo "<hr>";
                            echo "<p> ጠቅላላ ድምር:   "; echo $counta+$counta1; echo "&nbsp;"; echo "&nbsp;</p>"; 
                             $Amhara_plan=1910746;
                           $Amhara_performance =(($counta+$counta1)*100/$Amhara_plan);
                           echo "አፈፃፀም:  "; echo round($Amhara_performance,2); echo '%';
                          } 
                          
                       ?>
                      </h5>
                </h3>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  <h3 align="center">
                        <h6 align="center">የደቡብ ብሄሮች፣ ብሄረሰቦችና ህዝቦች ክልል ብልፅግና ፓርቲ 
              
                       <hr>
                  <?php 
                  if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='SNNPRS' AND `id`=".$_SESSION['user_id']."" ))!=0 )
                       {
                     $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                    
                        $counts = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM leader where party in ('SNNPR','SNNPRS','SNNP','ደቡብ','South')"));
 
                           echo $counts;  echo "<p>አመራሮች: <a href='filter_southleader.php' class='small-box-footer' style='color:#070707;'>View Leaders </a>

                            </p>"; 
                             
                           $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM league where party in ('SNNPR','SNNPRS','SNNP','ደቡብ','South')"));
 
                           echo $count;  echo "<p>ሊጎች: <a href='filter_southleague.php' class='small-box-footer' style='color:#070707;'>View Leagues </a>

                            </p>"; 
                           $counts1 = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM member where party in ('SNNPR','SNNPRS','SNNP','ደቡብ','South')"));
 
                           echo $counts1;  echo "<p>አባላት: <a href='filter_southmember.php' class='small-box-footer' style='color:#070707;'>View Members </a>
                           </p>"; 
                            $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM eprdf_supporter where Support_Party in ('SNNPR','SNNPRS','SNNP','ደቡብ','South')"));
 
                           echo $count;  echo "<p>ድጋፊዎች: <a href='filter_southsupporter.php' class='small-box-footer' style='color:#070707;'>View Supporter </a>
                            </p>"; 
                           
                              echo "<hr>";
                            echo "ጠቅላላ ድምር:  "; echo $counts+$counts1; echo "&nbsp;"; echo "&nbsp;</br>"; 
                             $South_plan=2553537;
                           $South_performance =(($counts+$counts1)*100/$South_plan);
                           echo "አፈፃፀም:  "; echo round($South_performance,2); echo '%';
                          }  
                       ?>
                       </h6>
                      
                </h3>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h5 align="center">የሶማሌ ክልል ብልፅግና ፓርቲ
                <hr>
                  <?php 
                  if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='Somali' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                     $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                    
                        $countso = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM leader where party in ('ሶማሌ','ሱማሌ','Somali','kebridahar woreda')"));
 
                           echo $countso;  echo "<p>አመራሮች: <a href='filter_somalileader.php' class='small-box-footer' style='color:#070707;'>View Leaders </a>

                            </p>"; 
                      
                           $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM league where party in ('ሶማሌ','ሱማሌ','Somali')"));
 
                           echo $count;  echo "<p>ሊጎች: <a href='filter_somalileague.php' class='small-box-footer' style='color:#070707;'>View League </a>

                            </p>"; 
                           $countso1 = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM member where party in ('ሶማሌ','ሱማሌ','Somali') || P_Region='ERER'"));
                          
                           echo $countso1;  echo "<p>አባላት:  <a href='filter_somalimember.php' class='small-box-footer' style='color:#070707;'>View Members </a></p>"; 
                           
                           
                            $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM eprdf_supporter where Support_Party in ('ሶማሌ','ሱማሌ','Somali')"));
 
                           echo $count;  echo "<p>ደጋፊዎች:  <a href='filter_somalisupporter.php' class='small-box-footer' style='color:#070707;'>View Supporter </a>
                            </p>"; 
                           
                            echo "<hr>";
                            echo "<p> ጠቅላላ ድምር:  "; echo $countso+$countso1; echo "&nbsp;"; echo "&nbsp;</p>"; 
                             $Somali_plan=1229938;
                           $Somali_performance =(($countso+$countso1)*100/$Somali_plan);
                           echo "አፈፃፀም:  "; echo round($Somali_performance,2); echo '%';
                             
                           } 
                       ?>
                   </h5>

                </h3>
              </div>
             
            </div>
          </div>
          
         
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <h5 align="center">የአፋር ክልል ብልፅግና ፓርቲ
                     <hr> 
                     <?php 
                     if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='Afar' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                        $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                       
                           $countaf = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM leader where party='Afar' or party='አፋር'"));
    
                              echo $countaf;  echo "<p>አመራሮች:<a href='filter_afarleader.php' style='color:#070707;'>View Leaders </a> </p>"; 
                         
                              $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM league where party='Afar' or party='አፋር'"));
    
                              echo $count;  echo "<p>ሊጎች:<a href='filter_afarleague.php' style='color:#070707;'>View Leagues </a>
                               </p>"; 
                              $countaf1 = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM member where party='Afar' or party='አፋር'"));
    
                              echo $countaf1;  echo "<p>አባላት:<a href='filter_afarmember.php' style='color:#070707;'>View Members </a>
                              </p>"; 
                               $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM eprdf_supporter where Support_Party='Afar' or Support_Party='አፋር'"));
    
                              echo $count;  echo "<p>ደጋፊዎች:<a href='filter_afarsupporter.php' style='color:#070707;'>View Supporters </a>
                               </p>"; 
                              echo "<hr>";
                            echo "<p> ጠቅላላ ድምር:  "; echo $countaf+$countaf1; echo "&nbsp;"; echo "&nbsp;</p>"; 
                             $Afar_plan=348880;
                           $Afar_performance =(($countaf+$countaf1)*100/$Afar_plan);
                           echo "አፈፃፀም:  "; echo round($Afar_performance,2); echo '%';
                             }  
                               
                          ?></h3>

              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                      <h5 align="center">የቤንሻንጉል/ጉሙዝ ክልል ብልፅግና ፓርቲ
                  <hr>
                <?php 
                if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='Benshangul' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                   $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                  
                      $countBG = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM leader where party in ('ቤንሻንጉል/ጉሙዝ','BG','Benshangul')"));

                         echo $countBG;  echo "<p>አመራሮች:<a href='filter_BGleader.php' style='color:#070707;'>View Leaders </a>
                          </p>"; 
                    
                         $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM league where party in ('ቤንሻንጉል/ጉሙዝ','BG','Benshangul')"));

                         echo $count;  echo "<p>ሊጎች:<a href='filter_BGleague.php' style='color:#070707;'>View Leagues </a>
                          </p>"; 
                         $countBG1 = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM member where party in ('ቤንሻንጉል/ጉሙዝ','BG','Benshangul')"));

                         echo $countBG1;  echo "<p>አባላት:<a href='filter_BGmember.php' style='color:#070707;'>View Members </a>
                         </p>"; 
                          $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM eprdf_supporter where Support_Party in ('ቤንሻንጉል/ጉሙዝ','BG','Benshangul')"));

                         echo $count;  echo "<p>ደጋፊዎች:<a href='filter_BGsupporter.php' style='color:#070707;'>View Supporters </a>
                          </p>"; 
                         
                          echo "<hr>";
                            echo "<p> ጠቅላላ ድምር:  "; echo $countBG+$countBG1; echo "&nbsp;"; echo "&nbsp;</p>"; 
                             $BG_plan=86744;
                           $BG_performance =(($countBG+$countBG1)*100/$BG_plan);
                           echo "አፈፃፀም:  "; echo round($BG_performance,2); echo '%';
                          }
                     ?>
                     </h5>
                     </h3>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                    
                <h3>
                   <h5 align="center">የጋምቤላ ክልል ብልፅግና ፓርቲ
                <hr>
                <?php 
                if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='Gambela' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                   $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                  
                      $countGa = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM leader where party in('Gambela','Gambella','ጋምቤላ')"));

                         echo $countGa;  echo "<p>አመራሮች:<a href='filter_gambelaleader.php' style='color:#070707;'>View Leaders </a>
                          </p>"; 
                    
                         $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM league where party in('Gambela','Gambella','ጋምቤላ')"));

                         echo $count;  echo "<p>ሊጎች:<a href='filter_gambelaleague.php' style='color:#070707;'>View Leagues </a>
                          </p>"; 
                         $countGa1 = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM member where party in('Gambela','Gambella','ጋምቤላ')"));

                         echo $countGa1;  echo "<p>አባላት:<a href='filter_gambelamember.php' style='color:#070707;'>View Members </a>
                         </p>"; 
                          $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM eprdf_supporter where Support_Party='Gambela' or Support_Party='ጋምቤላ'"));

                         echo $count;  echo "<p>ደጋፊዎች:<a href='filter_gambelasupporter.php' style='color:#070707;'>View Supporters </a>
                          </p>"; 
                         echo "<hr>";
                            echo "<p> ጠቅላላ ድምር:  "; echo $countGa+$countGa1; echo "&nbsp;"; echo "&nbsp;</p>"; 
                             $Ga_plan=53920;
                           $Ga_performance =(($countGa+$countGa1)*100/$Ga_plan);
                           echo "አፈፃፀም:  "; echo round($Ga_performance,2); echo '%';
                          
                          }
                     ?>
                   </h5>
                </h3>

              </div>
              
            </div>
          </div>
          
        <!-- /.row -->

          <!-- Small boxes (Stat box) -->
        <div class="col-lg-3 col-6">
            
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                     <h5 align="center">የሐረሪ ክልል ብልፅግና ፓርቲ
                  <hr>
                <?php 
                if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='Hareri' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                   $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                  
                      $countHa = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM leader where party in('Hareri','Harari','ሐረሪ')"));

                         echo $countHa;  echo "<p>አመራሮች:<a href='filter_harerileader.php' style='color:#070707;'>View Leaders </a>
                          </p>"; 
                    
                         $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM league where party in('Hareri','Harari','ሐረሪ')"));

                         echo $count;  echo "<p>ሊጎች:<a href='filter_harerileague.php' style='color:#070707;'>View Leagues </a>
                          </p>"; 
                         $countHa1 = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM member where party in('Hareri','Harari','ሐረሪ')"));

                         echo $countHa1;  echo "<p>አባላት:<a href='filter_harerimember.php' style='color:#070707;'>View Members </a>
                         </p>"; 
                          $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM eprdf_supporter where Support_Party='Hareri' or Support_Party='ሐረሪ'"));

                         echo $count;  echo "<p>ደጋፊዎች:<a href='filter_harerisupporter.php' style='color:#070707;'>View Supporters </a>
                          </p>"; 
                         
                          echo "<hr>";
                            echo "<p> ጠቅላላ ድምር:  "; echo $countHa+$countHa1; echo "&nbsp;"; echo "&nbsp;</p>"; 
                             $Harari_plan=30296;
                           $Harari_performance =(($countHa+$countHa1)*100/$Harari_plan);
                           echo "አፈፃፀም:  "; echo round($Harari_performance,2); echo '%';
                         } 
                     ?>
                     </h5>
                     </h3>

              </div>
              
            </div>
          </div>

              <!-- Small boxes (Stat box) -->
        <div class="col-lg-3 col-6">
            
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                     <h5 align="center">የሲዳማ  ክልል ብልፅግና ፓርቲ
                  <hr>
                <?php 
                if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='Sidama' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                   $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                  
                      $countSi = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Last_Name,Sex FROM leader where party in ('Sidama','Sidaama','ሲዳማ')"));

                         echo $countSi;  echo "<p>አመራሮች: <a href='filter_sidamaleader.php' style='color:#070707;'>View Leaders </a>

                          </p>"; 
                    
                         $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM league where party in ('Sidama','Sidaama','ሲዳማ')"));

                         echo $count;  echo "<p>ሊጎች:<a href='filter_sidamaleague.php' style='color:#070707;'>View Leagues </a>
                          </p>"; 
                         $countSi1 = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM member where party in ('Sidama','Sidaama','ሲዳማ')"));

                         echo $countSi1;  echo "<p>አባላት:<a href='filter_sidamamember.php' style='color:#070707;'>View Members </a>
                         </p>"; 
                          $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM eprdf_supporter where Support_Party='Sidama' or Support_Party='ሲዳማ '"));

                         echo $count;  echo "<p>ደጋፊዎች:<a href='filter_sidamasupporter.php' style='color:#070707;'>View Supporters </a>
                          </p>"; 
                         
                          echo "<hr>";
                            echo "<p> ጠቅላላ ድምር:  "; echo $countSi+$countSi1; echo "&nbsp;"; echo "&nbsp;</p>"; 
                             $Sidama_plan=556013;
                           $Sidama_performance =(($countSi+$countSi1)*100/$Sidama_plan);
                           echo "አፈፃፀም:  "; echo round($Sidama_performance,2); echo '%';
                         } 
                     ?>
                     </h5>
                     </h3>

              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                       <h5 align="center">የአዲስ አበባ ብልፅግና ፓርቲ
                  <hr>
                <?php 
                if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='AA' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                   $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                  
                      $countAA = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM leader where party in('Addis Ababa','AA','አአ','addis ababa')"));

                         echo $countAA;  echo "<p>አመራሮች:<a href='filter_aaleader.php' style='color:#070707;'>View Leaders </a>
                          </p>"; 
                    
                         $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM league where party in('Addis Ababa','AA','አዲስ አበባ','አአ')"));

                         echo $count;  echo "<p>ሊጎች:<a href='filter_aaleague.php' style='color:#070707;'>View Leagues </a>

                          </p>"; 
                         $countAA1 = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM member where party in('Addis Ababa','AA','አአ')"));

                         echo $countAA1;  echo "<p>አባላት:<a href='filter_aamember.php' style='color:#070707;'>View Members </a>
                         </p>"; 
                          $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM eprdf_supporter where Support_Party in('Addis Ababa','AA','አዲስ አበባ','አአ')"));

                         echo $count;  echo "<p>ደጋፊዎች:<a href='filter_aasupporter.php' style='color:#070707;'>View Supporters </a>
                          </p>"; 
                         echo "<hr>";
                            echo "<p> ጠቅላላ ድምር:  "; echo $countAA+$countAA1; echo "&nbsp;"; echo "&nbsp;</p>"; 
                             $AA_plan=363297;
                           $AA_performance =(($countAA+$countAA1)*100/$AA_plan);
                           echo "አፈፃፀም:  "; echo round($AA_performance,2); echo '%';
                          }
                          
                     ?>
                     </h5>
                     </h3>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <h5 align="center">የድሬደዋ ብልፅግና ፓርቲ
                  <hr>
                <?php 
                if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='DD' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                   $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                  
                   $countDD = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM leader where party in('ድሬዳዋ','ድሬደዋ','ድ/ድ','DD')"));
                         echo $countDD;  echo "<p>አመራሮች:<a href='filter_ddleader.php' style='color:#070707;'>View Leaders </a>

                          </p>"; 
                    
                         $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM league where party in('ድሬዳዋ','ድሬደዋ','ድ/ድ','DD')"));

                         echo $count;  echo "<p>ሊጎች:<a href='filter_ddleague.php' style='color:#070707;'>View Leagues </a>

                          </p>"; 
                $countDD1 = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM member where party in ('ድሬዳዋ','ድሬደዋ','ድ/ድ','DD')"));

                         echo $countDD1;  echo "<p>አባላት:<a href='filter_ddmember.php' style='color:#070707;'>View Members </a>

                         </p>"; 
                          $count = mysqli_num_rows(mysqli_query($con, "SELECT First_Name,Middle_Name,Last_Name,Sex,Age FROM eprdf_supporter where Support_Party in('ድሬዳዋ','ድሬደዋ','ድ/ድ','DD')"));
                         echo $count;  echo "<p>ደጋፊዎች:<a href='filter_ddsupporter.php' style='color:#070707;'>View Supporters </a>

                          </p>"; 
                         
                          echo "<hr>";
                            echo "<p> ጠቅላላ ድምር:  "; echo $countDD+$countDD1; echo "&nbsp;"; echo "&nbsp;</p>"; 
                             $DD_plan=51107;
                           $DD_performance =(($countDD+$countDD1)*100/$DD_plan);
                           echo "አፈፃፀም:  "; echo round($DD_performance,2); echo '%';
                          
                        }  
                     ?>
                     </h5>

                     </h3>

              </div>
              
            </div>
          </div>


          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                 <h3 align="center">
                        <h5 align="center">የትግራይ ክልል ብልፅግና ፓርቲ
                       <hr>
                  <?php 
                  if(mysqli_num_rows($mysqli->query("SELECT `role` FROM `members`  WHERE `role`='Tigiray' AND `id`=".$_SESSION['user_id']."" ))!=0 )
           {
                     $conn = new mysqli("localhost", "Getnet", "Getnet23", "eprdf_mdb");
                    
                        $countt = mysqli_num_rows(mysqli_query($con, "SELECT * FROM leader where party='Tigiray' or party='ትግራይ'"));
 
                           echo $countt;  echo "<p>አመራሮች:<a href='filter_tgleader.php' style='color:#070707;'>View Leaders </a>

                            </p>"; 
                      
                           $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM league where party='Tigiray' or party='ትግራይ'"));
 
                           echo $count;  echo "<p>ሊጎች:<a href='filter_tgleague.php' style='color:#070707;'>View Leagues </a>

                            </p>"; 
                           $countt1 = mysqli_num_rows(mysqli_query($con, "SELECT * FROM member where party='Tigiray' or party='ትግራይ'"));
 
                           echo $countt1;  echo "<p>አባላት:<a href='filter_tgmember.php' style='color:#070707;'>View Members </a>
                           </p>"; 
                            $count = mysqli_num_rows(mysqli_query($con, "SELECT * FROM eprdf_supporter where Support_Party='Tigiray' or Support_Party='ትግራይ'"));
 
                           echo $count;  echo "<p>ደጋፊዎች:<a href='filter_tgsupporter.php' style='color:#070707;'>View Supporters </a>
                            </p>"; 
                           echo "<hr>";
                            echo "<p> ጠቅላላ ድምር:  "; echo $countt+$countt1; echo "&nbsp;"; echo "&nbsp;</p>"; 
                             $Tig_plan=30000;
                           $Tig_performance =(($countt+$countt1)*100/$Tig_plan);
                           echo "አፈፃፀም:  "; echo round($Tig_performance,2); echo '%';
                            
                          }
                          }  
                       ?>
                      </h5>
                </h3>
              </div>
              
            </div>
          </div>
          <!-- ./col -->

        </div>
        <!-- /.row -->
        </div>
          <!-- ./col -->
          
      
</div>
<!-- ./wrapper -->

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