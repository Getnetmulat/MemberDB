<!DOCTYPE html>
<head><style>
  
  .tb {
    margin:10px 0;
    text-align: left;
    margin-left: 10px;
    font-size: 22px;
    font-family:Abyssinica_SIL;

}
.tb span+span, .collapsible {
    display:none;

}
.tb input[type="checkbox"]:checked ~ span {
    display:none;
}
.tb input[type="checkbox"]:checked ~ span+span{
    display:inline;
}
.tb input[type="checkbox"]:checked ~ .collapsible {
    display:table;
}

</style>>
</head>
<?php
include 'includes/header.php';
?>
 
<?php if (login_check($mysqli) == true) : ?>
    
<?php
include 'sidebar.php'; ?>
 
        <!-- End of Topbar -->

        <!-- Begin Page Content -->


          <!-- Content Row -->
        
 <div class="content-wrapper">

<div align='right'>
<form action="City_Organ_Sucess.php" method="POST" name="utf8" enctype="multipart/form-data" >
<th height="29" colspan="5" align="center"> 
 <div style="background-color:#d6dbdf  ;border-radius:5px;font-family:times;"> 
<p><span id ="header_logo">Welcome: <b><?php echo $_SESSION['username']; ?> &nbsp;&nbsp;&nbsp;            You are currently logged <?php echo $logged ?>.<a href="includes/logout.php">Log Out!</a>. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date("l").", ". date("M d") .", ". date("Y");?> </b> </p>

</div> 
      <div class="card-body">
              <div class="table-responsive">
                <table width="100%" height="0" bgcolor ="#77bdc0">  
 <tr>
     <td height="" colspan="5" align="center" bgcolor ="#77bdc0"> 
        <h4 align="center">የብልፅግና ፓርቲ አደረጃጀት መረጃ ቋት</h4> </td></tr>
       <tr><td colspan="3"><hr/></td></tr>
    <tr>
      <td>
        
   <a href="region_data.php">የክልል አደረጃጀት መረጃ</a>
   <div> <a href="View_region_data.php"> View Recoreds</a></div>
   </td>
   <td> 
   <a href="City_organ.php">የከተማ አደረጃጀት መረጃ</a>
   <div> <a href="View_City_Organ.php"> View Recoreds</a></div>
</td>
<td>
   <a href="Zone_organ.php">የፌደራል ተቋማት አደረጃጀት መረጃ</a>
   <div> <a href="View_Zone_Organ.php"> View Recoreds</a></div>

</td>
</tr>
</table>       
<table width="100%" height="0" bgcolor ="#77bdc0">      
<tr><td>&nbsp;&nbsp;</td></tr>
<h5 style="text-align: center;">የከተማ አደረጃጀት መረጃ  </h5>
      <tr>                               
       <td>
<div align="right">የከተማ ብልፅግና ጽ/ቤት</div></td>
   <td>     
    <select type ="text" required name="City">
        <option value="">የከተማ ብልፅግና ጽ/ቤት ይምረጡ</option>
            <option value="AA">የአዲስ አበባ ብልፅግና ፓርቲ</option>
            <option value="DD">ድሬዳዋ ብልፅግና ፓርቲ</option>
    </select>
<span class="required_star"> * </span>  
 </td>
<td>
<div align="right">ክ/ከተማ/ክላስተር</div></td>                     
<td>      
<input required name="Sub_City" type="text" id="pCode" value="" size="20" ><span class="Optional"> Optional </span> </td>
<td>
<div align="right">ወረዳ/ቀበሌ</div></td>                     
<td>      
<input required name="Woreda" type="text" id="pCode" value="" size="20" ><span class="required_star"> * </span> </td>


<tr> <td>&nbsp;</td>
  </tr>

</tr>
</table>
<div class="tb">
    <input type="checkbox"/>
    <span>አርሶ አደር</span><span>አርሶ አደር [Hide]</span>
    <table class="collapsible" id="collapsible1">
        <tr>
            <th><label>መሰረታዊ ድርጅት</label>
<input  name="Farmer_Party" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ህዋስ</label>
<input  name="Farmer_Cell" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

<label>ወንድ</label>
<input  name="Farmer_Male" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ሴት</label>
<input  name="Farmer_Female" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

</th></tr>

    </table>    
</div>
<div class="tb">
    <input type="checkbox"/>
    <span>ምሁራን</span><span>ምሁራን [Hide]</span>
    <table class="collapsible" id="collapsible1">
        <tr>
            <th><label>መሰረታዊ ድርጅት</label>
<input  name="Elit_Party" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ህዋስ</label>
<input  name="Elit_Cell" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

<label>ወንድ</label>
<input  name="Elit_Male" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ሴት</label>
<input  name="Elit_Female" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

</th>
    </tr>   
    </table>    
</div>

<div class="tb">
    <input type="checkbox"/>
    <span>ላብ አደር</span><span>ላብ አደር [Hide]</span>
    <table class="collapsible" id="collapsible1">
        <tr>
            <th><label>መሰረታዊ ድርጅት</label>
<input  name="Labader_Party" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ህዋስ</label>
<input  name="Labader_Cell" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

<label>ወንድ</label>
<input  name="Labader_Male" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ሴት</label>
<input  name="Labader_Female" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
   
    </table>    
</div>


<div class="tb">
    <input type="checkbox"/>
    <span>መምህራን</span><span>መምህራን [Hide]</span>
    <table class="collapsible" id="collapsible1">
        <tr>
            <th><label>መሰረታዊ ድርጅት</label>
<input  name="Teacher_Party" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ህዋስ</label>
<input  name="Teacher_Cell" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

<label>ወንድ</label>
<input  name="Teacher_Male" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ሴት</label>
<input  name="Teacher_Female" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
</th>
    </tr>   
    </table>    
</div>

<div class="tb">
    <input type="checkbox"/>
    <span>ተማሪ</span><span>ተማሪ [Hide]</span>
    <table class="collapsible" id="collapsible1">
        <tr>
            <th><label>መሰረታዊ ድርጅት</label>
<input  name="Student_Party" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ህዋስ</label>
<input  name="Student_Cell" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

<label>ወንድ</label>
<input  name="Student_Male" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ሴት</label>
<input  name="Student_Female" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
</th>
    </tr>   
    </table>    
</div>

<div class="tb">
    <input type="checkbox"/>
    <span>ከተማ ነዋሪ</span><span>ከተማ ነዋሪ [Hide]</span>
    <table class="collapsible" id="collapsible1">
        <tr>
            <th><label>መሰረታዊ ድርጅት</label>
<input  name="City_Party" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ህዋስ</label>
<input  name="City_Cell" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

<label>ወንድ</label>
<input  name="City_Male" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ሴት</label>
<input  name="City_Female" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

</th>
    </tr>   
    </table>    
</div>

<div class="tb">
    <input type="checkbox"/>
    <span>ጥቃቅንና አነስተኛ</span><span>ጥቃቅንና አነስተኛ [Hide]</span>
    <table class="collapsible" id="collapsible1">
        <tr>
            <th><label>መሰረታዊ ድርጅት</label>
<input  name="Small_Enterprise_Party" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ህዋስ</label>
<input  name="Small_Enterprise_Cell" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

<label>ወንድ</label>
<input  name="Small_Enterprise_Male" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ሴት</label>
<input  name="Small_Enterprise_Female" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

</th>
    </tr>   
    </table>    
</div>


<div class="tb">
    <input type="checkbox"/>
    <span>ፐብሊክ ሰርቫንት</span><span>ፐብሊክ ሰርቫንት [Hide]</span>
    <table class="collapsible" id="collapsible1">
        <tr>
            <th><label>መሰረታዊ ድርጅት</label>
<input  name="PublicServant_Party" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ህዋስ</label>
<input  name="PublicServant_Cell" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

<label>ወንድ</label>
<input  name="PublicServant_Male" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ሴት</label>
<input  name="PublicServant_Female" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

</th>
    </tr>   
    </table>    
</div>


<div class="tb">
    <input type="checkbox"/>
    <span>ባለሀብት/ነጋዴ</span><span>ባለሀብት/ነጋዴ [Hide]</span>
    <table class="collapsible" id="collapsible1">
        <tr>
            <th><label>መሰረታዊ ድርጅት</label>
<input  name="Balehabit_Party" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ህዋስ</label>
<input  name="Balehabit_Cell" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

<label>ወንድ</label>
<input  name="Balehabit_Male" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;
<label>ሴት</label>
<input  name="Balehabit_Female" type="number" id="pCode" value="" size="10" >&nbsp;&nbsp;&nbsp;&nbsp;

</th>
    </tr>   
    </table>    
</div>


<tr> <td>&nbsp;</td>
  </tr>
<tr>
 <tr>
<td colspan="5">
  <h5 style="text-align: center;">
<input name="cmdSubmit" type="submit" id="cmdSubmit" value="ላክ/Send"/>
 &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
 <input name="cmdReset" type="reset" id="cmdReset" value="አጽዳ/Clear" />

</h5></td></tr>
</select>
</td>
</tr>
</table>
</div>
</div>






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
