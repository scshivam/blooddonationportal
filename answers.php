<?php
session_start();
$redirect6 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'notfound.html';

if(!isset($_SESSION['id'])||($_SESSION['type']!='A'&&$_SESSION['type']!='UA'))
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
    <script>
	function check()
	{
		return confirm("Are You Sure.. ??");
	}
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


                        <h2>Add Member</h2>



                    </div>
                </div>
<hr />
<?php $id=$_GET['id'];
$q="Select Name from members where User_Id='$id'";
$r=mysql_query($q)or die(mysql_error());
$ro=mysql_fetch_assoc($r);
$name=$ro['Name'];?>
						<div class="panel panel-primary">
                        <div class="panel-heading">
                            <center>Answers Given By <?php echo $name; ?></center>
                        </div>
						<br>
                        <div class="col-lg-12">
							<?php
							$n=0;
							$qry="Select Answers From answer where User_Id='$id'";
							$qry1="Select Question From question";
							$res=mysql_query($qry)or die(mysql_error());
							$res1=mysql_query($qry1)or die(mysql_error());
							$rowa=mysql_fetch_assoc($res);
							$ans=explode('*',$rowa['Answers']);
							while($rowq=mysql_fetch_assoc($res1))
							{
								$n++;
								$qu=$rowq['Question'];
								echo '<b>Q'.$n.'. '.$qu.'</b><br>';
								echo '<b>Ans.</b> '.$ans[$n-1].'<br><br>';
							}
							?>
							<form action="add_ud.php" method="post">
							<center><button class="btn btn-rounded btn-success" value="<?php echo $id; ?>" onclick="return check();" name="add">Add As Member</button> &nbsp;&nbsp;<button class="btn btn-rounded btn-danger" onclick="return check();" value="<?php echo $id; ?>" name="delete">Delete Applicant</button><br></center><br></form>
						</div>

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
