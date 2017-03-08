<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="utf-8">
	<title>Uddeshhya Blood Portal</title>
	<meta name="author" content="www.zerotheme.com">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  	<link rel="stylesheet" href="css/zerogrid.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/slide.css">
	<link rel="stylesheet" href="css/menu.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/theme.css" />
    <link rel="stylesheet" href="assets/css/MoneAdmin.css" />
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/plugins/Font-Awesome/css/font-awesome.css" />
	<script>
	function validate(emailAddress) {
  var sQtext = '[^\\x0d\\x22\\x5c\\x80-\\xff]';
  var sDtext = '[^\\x0d\\x5b-\\x5d\\x80-\\xff]';
  var sAtom = '[^\\x00-\\x20\\x22\\x28\\x29\\x2c\\x2e\\x3a-\\x3c\\x3e\\x40\\x5b-\\x5d\\x7f-\\xff]+';
  var sQuotedPair = '\\x5c[\\x00-\\x7f]';
  var sDomainLiteral = '\\x5b(' + sDtext + '|' + sQuotedPair + ')*\\x5d';
  var sQuotedString = '\\x22(' + sQtext + '|' + sQuotedPair + ')*\\x22';
  var sDomain_ref = sAtom;
  var sSubDomain = '(' + sDomain_ref + '|' + sDomainLiteral + ')';
  var sWord = '(' + sAtom + '|' + sQuotedString + ')';
  var sDomain = sSubDomain + '(\\x2e' + sSubDomain + ')*';
  var sLocalPart = sWord + '(\\x2e' + sWord + ')*';
  var sAddrSpec = sLocalPart + '\\x40' + sDomain; // complete RFC822 email address spec
  var sValidEmail = '^' + sAddrSpec + '$'; // as whole string

  var reValidEmail = new RegExp(sValidEmail);

  if(!(reValidEmail.test(emailAddress)))
  {
	  alert("Invalid E-mail Id..");
	  return false;
  }
  else
  {
	return true;  
  }
}
</script>
</head>
<body>
<div class="wrap-body">
	<div class="top">
		<div class="zerogrid">
			<ul class="number f-left">
				<li class="mail"><p>weareuddeshhya@gmail.com</p></li>
				<li class="phone"><p></p></li>
			</ul>
			<ul class="top-social f-right">
				<li><a target="_blank" href="https://www.facebook.com/Uddeshhya/"><i class="fa fa-facebook"></i></a></li>
				</ul>
		</div>
	</div>
	<header>
		<div class="zerogrid">
			<center><img src="images/new.png" width="70%"></center>
		</div>
	</header>
	<div class="site-title">
		<div class="zerogrid">
			<div class="row">
				<h2 class="t-center">Life is not just about Living, Its about bringing a Change !</h2>
			</div>
		</div>
	</div>
    <a href="#" class="nav-toggle">Menu</a>
    <nav class="cmn-tile-nav">
		<ul class="clearfix">
			<li class="colour-1"><a href="index.php"><br>Home</a></li>
			<li class="colour-2"><a href="work.php"><br>How It Works</a></li>
			<li class="colour-3"><a href="update_donor.php">Update Donor Detail</a></li>
			<li class="colour-4"><a target="_blank" href="andi.php">Download Android App</a></li>
			<li class="colour-5"><a target="_blank" href="http://www.uddeshhya.com"><br>Uddeshhya</a></li>
			<li class="colour-6"><a href="team.php"><br>Our Team</a></li>
			<li class="colour-7"><a href="login.php"><br>Members.Area</a></li>
			<li class="colour-8"><a href="faq.php"><br>FAQ's</a></li>
		</ul>
    </nav>
<section id="container" class="sub-page">
	<div class="wrap-container zerogrid">
		<div class="crumbs">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="update_donor.php">Update Donor Detail</a></li>
			</ul>
		</div>
		<div id="main-content">
			<div class="wrap-content">
			<?php
			if(isset($_POST['submit']))
			{ 
			$email=$_POST['email'];
			require 'dbconnect.php';
			$link=connection();
			$qry="SELECT Name,Id from donor where email=?";
			if ($stmt=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$n=mysqli_stmt_num_rows($stmt);
			if($n==0)
			{
				echo '<br><center><h3>Invalid E-mail Id, Please Retry with a valid E-mail Id</h3></center><br>';
			}
			else
			{
			mysqli_stmt_bind_result($stmt,$name,$id);	
			mysqli_stmt_fetch($stmt);
			mysqli_stmt_close($stmt);
			require 'mail.php';
			$ra=rand(100000,999999);
			$query="Update donor set otp=? where id=?";
			if ($stmt1=mysqli_prepare($link, $query))
			{
			mysqli_stmt_bind_param($stmt1, "ss", $ra,$id);
			mysqli_stmt_execute($stmt1);
			mysqli_stmt_store_result($stmt1);
			}
			mysqli_stmt_close($stmt1);
			mysqli_close($link);
			$sub="OTP For Your Blood Portal Data Updation.";
			$body="Hello ".$name.",<br>Your OTP is :".$ra.".<br><br>With Regards,<br><b>Team Uddeshhya</b>";
			sendmail($email,$name,$sub,$body);
			?><br><center><h3>Enter One Time Password.</h3></center><br>
			<form action="check.php" method="post">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
			<input type="number" placeholder="Enter OTP" min="100000" max="999999" class="form-control" name="otp"></input></div><br><br>
				<br><center><button class="btn btn-success" value="<?php echo $id; ?>" name="sub">Submit</button></center><br><br>
			</form>
			<?php
			}
			}
			?>
				
			<?php }
			else
			{
				?>
				<br><center><h3>Enter Your Registered E-mail Id</h3></center><br>
				<div class="col-lg-4"></div>
				<div class="col-lg-4">
				<form action="#" method="post">
				<input type="text" placeholder="Enter E-mail Id" class="form-control" name="email"></input></div><br><br>
				<br><center><button class="btn btn-success" name="submit" onclick="return validate(email.value);">Submit</button></center><br><br></form>
			<?php }
			?>
				</div>
		</div> 
	</div>
</section>

<footer class="zerogrid">
	<div class="wrap-footer">
		<div class="row">
			<div class="col-1-3">
				<div class="wrap-col">
					<h4>About Us</h4>
					<div class="row">
						<img width="15%" src="images/logo.png">
						<h5>Uddeshhya</h5>
						<p></p>
					</div>
				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col">
					<h4>Location</h4>
					<div class="wrap-map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3497.885311451629!2d77.4980146!3d28.752841!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cf471e7603951%3A0x2ac477ef3e62e67c!2sKIET+Cricket+Ground!5e0!3m2!1sen!2sin!4v1455056827905" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
				</div>
			</div>
			<div class="col-1-3">
				<div class="wrap-col">
					<h4>Contact Us:</h4>
					<p><span>Sumit Kumar: </span>+91-9412395300</p>
					<p><span>Anshul Tripathi: </span>+91-7409497466</p>
					<p><span>Vanshika Bhati:</span>+91-8979492562</p>
					<p><span>Ayush Srivastav:</span>+91-8765925362</p>
					<p><span>Shivam Chaurasia(Technical):</span>+91-8266063906</p>
					<p><span>Feedback/Comments At:</span></br>
					weareuddeshhya@gmail.com</p>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="wrapper">
			<center>Copyright <?php echo date('Y'); ?> - <a href="http://www.uddeshhya.com">Uddeshhya</a></center>
			
		</div>
	</div>
</footer>

	<!-- js -->
	<script src="js/classie.js"></script>
	<script src="js/demo.js"></script>
	
</div>
</body></html>