<?php
session_start();
$redirect6 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'notfound.html';
if($_SESSION['type']!='V')
{
  header("Refresh:0;URL=".$redirect6);

}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
     <meta charset="UTF-8" />
    <title>Update Last Donated</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
   </head>
<body class="padTop53 " >

    
    <div id="wrap">


         
       <?php include 'dynamictop.php';
				include 'dynamicleft.php'	   ?><!-- END HEADER SECTION -->

        <div id="content">

            <div class="inner" style="min-height:1200px;">
                <div class="row">
                    <div class="col-lg-12">


                        <h2>Update Last Donated</h2>



                    </div>
                </div>

                <hr />
					<div class="panel panel-primary">
                        <div class="panel-heading">
                            <center>Update Last Donated</center>
                        </div>
						<div class="panel-body">
						<form action="sub_ques.php" method="post">
						<div class="col-lg-1"></div>
						<div class="col-lg-1">Select Donor:</div>
						<div class="col-lg-2"><select name="donor" class="form-control" required></div>
						<div class="col-lg-1"></div>
						<div class="col-lg-1"><b>Enter Question:</b></div>
						<div class="col-lg-2"><input type="text" name="question" class="form-control" required></div>
						<br><br><br><center><button class="btn btn-success btn-rounded" name="submit">Submit</button></center></form>
						</div>
						</div>

                            
                            
                        </div>

                    </div>

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
</body>
    <!-- END BODY-->
    
</html>

<?php } ?>
