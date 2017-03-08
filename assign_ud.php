<?php
session_start();
$redirect6 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'notfound.html';

if(!isset($_SESSION['id'])||$_SESSION['type']!='A')
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
    <title>Uddeshhya Admin</title>
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
    
   </head>
<body class="padTop53 " >  
    <div id="wrap">    
       <?php include 'dynamictop.php';
				include 'dynamicleft.php'	   ?>

        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">


                        <h2>Assign State</h2>



                    </div>
                </div>
<hr />
							<form method="post" action="add.php">
                              <table class="table table-striped table-hover" id="dataTables-example">
                                <thead>
                                  <tr>
                                    <th><div class="col-lg-1"><center>#</center></div>
									<div class="col-lg-3"><center>Name</center></div>
									<div class="col-lg-1"><center>Contact</center></div>
									<div class="col-lg-1"><center>Alternate<br>Contact</center></div>
									<div class="col-lg-2"><center>Email Id</center></div>
									<div class="col-lg-2"><center>Assigned State</center></div>
									<div class="col-lg-2"><center>Assign More State</center></div></th>
                                  </tr>
                                </thead>
                                <tbody>
                     <?php $i=1;
							$query="Select Email,Id from login where Type='UA'";
							$res=mysql_query($query)or die(mysql_error());
							while($row=mysql_fetch_assoc($res))
							{
								$email=$row['Email'];
								$id=$row['Id'];
								$qry="Select * from members where User_Id='$id'";
								$res1=mysql_query($qry)or die(mysql_error());
								$row1=mysql_fetch_assoc($res1);
								$name=$row1['Name'];
								$phone=$row1['phone'];
								$ap=$row1['Alternate_Phone'];
								$sta=$row1['Assign_State'];
								$check=0;
								if($sta=='')
									$check=1;
								$st1=explode('_',$sta);
								$st=array();
								for($k=0;$k<count($st1);$k++)
								{
								$qry1="Select State_Name from state where id='$st1[$k]'";
								$res1=mysql_query($qry1) or die(mysql_error());
								$row1=mysql_fetch_assoc($res1);
								$st[$k]=$row1['State_Name'];
								}
								?>
							<tr>
                                    <td><div class="col-lg-1"><center><?php echo $i++; ?></center></div>
									<div class="col-lg-3"><center><?php echo $name; ?></center></div>
									<div class="col-lg-1"><center><?php echo $phone; ?></center></div>
									<div class="col-lg-1"><center><?php echo $ap; ?></center></div>
									<div class="col-lg-2"><center><?php echo $email; ?></center></div>
									<div class="col-lg-2"><center><?php if($check==1){ echo '----'; }
									else
									{
									for($k=0;$k<count($st);$k++)
									{
										echo ($k+1).'. '.$st[$k].'<br>';
									}
									}
									?></center></div>
                                  <div class="col-lg-2"><center><button name="add" value="<?php echo $id; ?>" class="btn btn-success btn-rounded" >Assign State</button></center></div>
								  </td></tr>
								  <?php
								  }
									?>
								  </tbody>
                                 </table>
								 </form>
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
	<script src="assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="assets/plugins/dataTables/dataTables.bootstrap.js"></script>
     <script>
         $(document).ready(function () {
             $('#dataTables-example').dataTable();
         });
    </script>
</body>
    <!-- END BODY-->
    
</html>
<?php } ?>
