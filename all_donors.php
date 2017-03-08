<?php
session_start();
$redirect6 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'notfound.html';
$redirect1 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'authentication.php';
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
    <title>All Acceptors</title>
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


                        <h2>All Donors</h2>

					</div>
                </div>
<hr />
					
                              <table class="table-striped table-hover col-lg-12" id="dataTables-example">
                                <thead>
                                  <tr>
                                    <th><div class="col-lg-1"><center>#</center></div>
									<div class="col-lg-2"><center>Name</center></div>
									<div class="col-lg-1"><center>Blood Group</center></div>
									<div class="col-lg-1"><center>Contact</center></div>
									<div class="col-lg-3"><center>City<br>State</div>
									<div class="col-lg-2"><center>E-mail Id</center></div>
									<div class="col-lg-2"><center>View Details</center></div></th>
                                  </tr>
                                </thead>
                                <tbody>
                     <?php $i=1;
							$query="Select Name,Age,Sex,BGroup,Address,City,State,pincode,phone,Alternate,email,Last_Donated from donor where Type='D' Order By State ASC";
							$res=mysql_query($query)or die(mysql_error());
							$num=mysql_num_rows($res);
							while($row=mysql_fetch_assoc($res))
							{
								$email=$row['email'];
								$name=$row['Name'];
								$Age=$row['Age'];
								$s=$row['Sex'];
								if($s=='M')
									$sex='Male';
								if($s=='F')
									$sex='Female';
								$bg=$row['BGroup'];
								$a=$row['Address'];
								$b=$row['City'];
								$x=$row['State'];
								$qy="Select State_Name from state where id='$x'";
								$re=mysql_query($qy)or die(mysql_error());
								$ro=mysql_fetch_assoc($re);
								$c=$ro['State_Name'];
								$pin=$row['pincode'];
								$phone=$row['phone'];
								$ap=$row['Alternate'];
								$ld=$row['Last_Donated'];
								if($ld=="")
									$ld='----';
								?>
							<tr>
                                    <td><div class="col-lg-1"><center><?php echo $i++; ?></center></div>
									<div class="col-lg-2"><center><?php echo $name; ?></center></div>
									<div class="col-lg-1"><center><?php echo $bg; ?></center></div>
									<div class="col-lg-1"><center><?php echo $phone; ?></center></div>
									<div class="col-lg-3"><center><?php echo $b.'<br>'.$c; ?></center></div>
									<div class="col-lg-2"><center><?php echo $email; ?></center></div>
                                  <div class="col-lg-2"><center><button class="btn btn-success btn-rounded" data-toggle="modal" data-target=".bs-example-modal-sm<?php echo $i; ?>">View Detail</button></center></div>
								  </td></tr>
								  <div class="modal fade bs-example-modal-sm<?php echo $i; ?>" tabindex="-1" role="dialog">
									<div class="modal-dialog modal-sm">
									  <div class="modal-content">
										  <div class="modal-header">
											  <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
											  <h4 class="modal-title"><?php echo $name; ?></h4>
										  </div>
										  <div class="modal-body"><?php echo '<center><b>Age </b> : '.$Age.' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<b>Gender: </b> '.$sex.'</center><br>';
										  echo '<center><b>Address: </b> '.$a.'<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$b.'-'.$pin.'</center><br>';
										  echo '<center><b>State: </b> '.$c.'</center><br><br>';
										  echo '<center><b>Phone: </b> '.$phone.'</center> <br><b><center>Alternate phone: </b>'.$ap.'</center><br>';
										  echo '<center><b>Blood Group: </b> '.$bg.'</center><br>';
										  echo '<center><b>Email-Id: </b> '.$email.'</center><br>';
										  echo '<center><b>Last Donated: </b> '.$ld.'</center><br>';?></div>
									  </div>
									</div>
								</div>
								  <?php
								  }
									?>
								  </tbody>
                                 </table>
								 




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
