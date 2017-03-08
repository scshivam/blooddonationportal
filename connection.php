<?php
session_start();
$redirect6 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'notfound.html';
$redirect1 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'authentication.php';
if(!isset($_SESSION['id']))
{
  header("Refresh:0;URL=".$redirect6);
	die();
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
     <meta charset="UTF-8" />
    <title>Donors</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
	<link href="assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <link href="assets/css/jquery-ui.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/plugins/uniform/themes/default/css/uniform.default.css" />
	<link rel="stylesheet" href="assets/plugins/inputlimiter/jquery.inputlimiter.1.0.css" />
	<link rel="stylesheet" href="assets/plugins/chosen/chosen.min.css" />
	<link rel="stylesheet" href="assets/plugins/colorpicker/css/colorpicker.css" />
	<link rel="stylesheet" href="assets/plugins/tagsinput/jquery.tagsinput.css" />
	<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css" />
	<link rel="stylesheet" href="assets/plugins/datepicker/css/datepicker.css" />
	<link rel="stylesheet" href="assets/plugins/timepicker/css/bootstrap-timepicker.min.css" />
	<link rel="stylesheet" href="assets/plugins/switch/static/stylesheets/bootstrap-switch.css" />
   </head>
<body class="padTop53 " >  
    <div id="wrap">    
       <?php include 'dynamictop.php';
				include 'dynamicleft.php';	   
				include 'dbconnection.php';
				?>

        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">


                        <h2>Select Donors</h2>
						


                    </div>
                </div>
<hr />
<?php
if(isset($_POST['received']))
{
	
	?>
					<div class="panel panel-primary">
                        <div class="panel-heading">
                            <center>Select Donors Who Donated</center>
                        </div>
                        
								<form action='#' method='Post'>
								<br><br><br>
								<div class="col-lg-1"></div>
								<div class="col-lg-1"><b><center>Select Donors:</center></b></div>
								<div class="col-lg-4">
								<select data-placeholder="Choose Donors.."  class="form-control chzn-select" multiple="multiple" name='donor[]'>
								<?php
								$query1="Select Id,Name,phone,City From donor where Type='D'";
								$result1=mysql_query($query1) or die(mysql_error());
								while($row=mysql_fetch_assoc($result1))
								echo '<option value="'.$row['Id'].'">'.$row['Name'].'('.$row['City'].')('.$row['phone'].')'.'</option>';
								?></select></div>
								<div class="col-lg-1"></div>
								<div class="col-lg-1"><b>Donated On:</b></div>
								<div class="col-lg-3"><input type="date" class="form-control" name="donated"></div><br><br><br>
								<center><button class="btn btn-primary" name='submit' value="<?php echo $_POST['received']; ?>">Submit</button></center><br><br></form>
								
								</div>
								
							<?php
							}
							if(isset($_POST['submit']))
							{
								$x=$_POST['donor'];
								$m=implode('_',$x);
								$d=date('d-m-Y',strtotime($_POST['donated']));
								$id=$_POST['submit'];
								$qry="Update donor set Last_Donated='Y',Did='$m' where Id='$id'";
								$res=mysql_query($qry)or die(mysql_error());
								for($i=0;$i<count($x);$i++)
								{
								$did=$x[$i];
								$qry="Update donor set Last_Donated='$d',Did='$id' where Id='$did'";
								$res=mysql_query($qry)or die(mysql_error());
								}
								header("Refresh:0;URL=".$redirect1);
							}
							?>
						</div>




        </div>
       <!--END PAGE CONTENT -->


    </div>

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  Uddeshhya &nbsp;<?php echo date('Y'); ?> &nbsp;</p>
    </div>
    <!--END FOOTER -->
     <!-- GLOBAL SCRIPTS -->
    <script src="assets/plugins/jquery-2.0.3.min.js"></script>
     <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <!-- END GLOBAL SCRIPTS -->
	<script src="assets/js/jquery-ui.min.js"></script>
 <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="assets/plugins/inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
<script src="assets/plugins/chosen/chosen.jquery.min.js"></script>
<script src="assets/plugins/colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="assets/plugins/tagsinput/jquery.tagsinput.min.js"></script>
<script src="assets/plugins/validVal/js/jquery.validVal.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/daterangepicker/moment.min.js"></script>
<script src="assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
<script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/plugins/switch/static/js/bootstrap-switch.min.js"></script>
<script src="assets/plugins/jquery.dualListbox-1.3/jquery.dualListBox-1.3.min.js"></script>
<script src="assets/plugins/autosize/jquery.autosize.min.js"></script>
<script src="assets/plugins/jasny/js/bootstrap-inputmask.js"></script>
       <script src="assets/js/formsInit.js"></script>
        <script>
            $(function () { formInit(); });
        </script>
</body>
    <!-- END BODY-->
    
</html>
<?php } ?>
