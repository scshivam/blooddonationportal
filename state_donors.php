<?php
session_start();
$redirect6 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'notfound.html';
$redirect1 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'dash.php';
if($_SESSION['type']!='A'&&$_SESSION['type']!='UA'&&$_SESSION['type']!='V')
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
    <title>Donors in State</title>
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
   <script type="text/javascript">

</script>

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
<?php if(!isset($_POST['submit']))
	{
	?>
								
								<div class="panel panel-primary">
                        <div class="panel-heading">
                            <center>Select State To View Volunteers</center>
                        </div>
                        
								<form action='#' method='Post'>
								<br><br><br>
								<div class="col-lg-4"></div>
								<div class="col-lg-1"><b><center>SELECT STATE:</center></b></div>
								<div class="col-lg-3">
								<select class="form-control" name='state'>
								<option value=''>Choose One</option>
								<?php if($_SESSION['type']=='UA') { ?>
								<option value='ALL'>ALL</option>
								<?php }
								if($_SESSION['state']!='')
								{
									$st1=explode('_',$_SESSION['state']);
								}
								else
								{
									$k=0;
								$query1="Select id from state";
								$result1=mysql_query($query1) or die(mysql_error());
								while($row=mysql_fetch_assoc($result1))
									$st1[$k++]=$row['id'];
								}
								$st=array();
								for($k=0;$k<count($st1);$k++)
								{
									echo $id=$st1[$k];
								$qry1="Select State_Name from state where id='$id'";
								$res1=mysql_query($qry1) or die(mysql_error());
								$row1=mysql_fetch_assoc($res1);
								$st[$k]=$row1['State_Name'];
								echo '<option value="'.$st1[$k].'">'.$st[$k].'</option>';
								}
								?></select></div><br><br><br>
								<center><button class="btn btn-primary" name='submit'>Submit</button></center><br><br></form>
								
								</div>
								<?php
								}
								if(isset($_POST['submit']))
								{ 
							$st=$_POST['state'];?>
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
									if($st=='ALL')
									{
								$st1=explode('_',$_SESSION['state']);
								for($k=0;$k<count($st1);$k++)
								{
								$id=$st1[$k];
								$qry1="Select State_Name from state where id='$id'";
								$res1=mysql_query($qry1) or die(mysql_error());
								$row1=mysql_fetch_assoc($res1);
								$st=$row1['State_Name'];
								$query="Select Name,Age,Sex,BGroup,Address,City,State,pincode,phone,Alternate,email,Last_Donated from donor where Type='D' AND State='$id' ";
							$res=mysql_query($query)or die(mysql_error());
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
								if($s=='O')
									$sex='Other';
								$bg=$row['BGroup'];
								$a=$row['Address'];
								$b=$row['City'];
								$c=$st;
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
								}
									
									?>
								  </tbody>
                                 </table>
								<?php }
									else
									{	
								$id=$st;
								$qry1="Select State_Name from state where id='$id'";
								$res1=mysql_query($qry1) or die(mysql_error());
								$row1=mysql_fetch_assoc($res1);
								$st=$row1['State_Name'];
								$query="Select Name,Age,Sex,BGroup,Address,City,State,pincode,phone,Alternate,email,Last_Donated from donor where Type='D' AND State='$id' ";
							$res=mysql_query($query)or die(mysql_error());
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
								if($s=='O')
									$sex='Other';
								$bg=$row['BGroup'];
								$a=$row['Address'];
								$b=$row['City'];
								$c=$st;
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
								  ?></tbody>
								</table><?php
									}
									}?>




        </div>
       <!--END PAGE CONTENT -->


    

     <!--END MAIN WRAPPER -->

   <!-- FOOTER -->
    <div id="footer">
        <p>&copy;  Uddeshhya &nbsp;<?php echo date('Y'); ?> &nbsp;</p>
    </div>
	</div>
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
						
<?php }  ?>
