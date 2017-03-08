<noscript>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><center><p style="font-size:50px;color:#FFFFFF;">PLEASE ENABLE JAVASCRIPT TO CONTINUE</p></center><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<meta http-equiv="Refresh" content="5;URL=index.php" />
</noscript>
<?php
session_start();
$redirect6 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'authentication.php';
if(isset($_SESSION['id']))
{
	header ('Refresh:0; URL=' . $redirect6);
}
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
     <meta charset="UTF-8" />
    <title>Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <link rel="stylesheet" href="assets/plugins/magic/magic.css" />
</head>

<body style="background-color:#36648b;">

   <!-- PAGE CONTENT --> 
    <div class="container">
    <div class="text-center">
        <img src="assets/img/logo.png" alt=" Logo" />
    </div>
    <div class="tab-content">
        <div id="login" class="tab-pane active">
            <form action="authentication.php" class="form-signin" method="post">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">
                    Enter your E-mail Id and password
                </p>
                <input type="text" name="username" placeholder="E-mail Id" class="form-control" required/>
                <input type="password" name="password" placeholder="Password" class="form-control" required/>
                <button class="btn text-muted text-center btn-danger" name="submit" type="submit">Sign in</button>
            </form>
        </div>
        <div id="forgot" class="tab-pane">
            <form action="forgot.php" class="form-signin">
                <p class="text-muted text-center btn-block btn btn-primary btn-rect">Enter your valid e-mail</p>
                <input type="email" name="username" required="required" placeholder="Your E-mail"  class="form-control" />
                <br />
                <button class="btn text-muted text-center btn-success" type="submit">Recover Password</button>
            </form>
        </div>
    </div>
    <div class="text-center">
        <ul class="list-inline">
            <li><a class="text-muted" href="#login" data-toggle="tab"><button class="text-muted text-center btn-block btn btn-primary btn-rect">Login</button></li>
            <li><a class="text-muted" href="#forgot" data-toggle="tab"><button class="text-muted text-center btn-block btn btn-primary btn-rect">Forgot Password</button></a></li>
            </ul>
    </div>


</div>

	  <!--END PAGE CONTENT -->     
	      
      <!-- PAGE LEVEL SCRIPTS -->
      <script src="assets/plugins/jquery-2.0.3.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
   <script src="assets/js/login.js"></script>
      <!--END PAGE LEVEL SCRIPTS -->

</body>
    <!-- END BODY -->
</html>
