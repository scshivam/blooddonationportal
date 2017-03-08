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
	
	<script type="text/javascript">
  function xyz(state)
  {
	  document.getElementById('state').setAttribute("readonly","readonly");
	  document.getElementById('po').setAttribute("readonly","readonly");
      pin=document.getElementById('code').value;
	  if(pin.length!=6)
	  {
		  alert("Enter valid pincode");
		  document.getElementById('po').removeAttribute("readonly");
		  document.getElementById('state').removeAttribute("readonly");
		  return false;
	  }
	try{
   
   ajaxRequest = new XMLHttpRequest();
  
 }catch (e){
  
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         
      }catch (e){
        
         alert("Your browser broke!");
         return false;
      }
   }
 }

 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){
	   document.getElementById('po').removeAttribute("readonly");
	   document.getElementById('state').removeAttribute("readonly");
      var ajaxDisplay = document.getElementById('po');
      
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
      
    
   }
 }
 ajaxRequest.open("GET", "city_ajax2.php?state="+state+"&pin="+pin, true);
 ajaxRequest.send(); 
 return true;
  }
</script>
<script>	
function opencity(po)
  {
	  document.getElementById('state').setAttribute("readonly","readonly");
	  document.getElementById('po').setAttribute("readonly","readonly");
      state=document.getElementById('state').value;
	try{
   
   ajaxRequest = new XMLHttpRequest();
  
 }catch (e){
  
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         
      }catch (e){
        
         alert("Your browser broke!");
         return false;
      }
   }
 }

 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){
	   document.getElementById('po').removeAttribute("readonly");
	   document.getElementById('state').removeAttribute("readonly");
	   document.getElementById('city').removeAttribute("readonly");
      var ajaxDisplay = document.getElementById('city');
	  document.getElementById('city').setAttribute("value",ajaxRequest.responseText);
      document.getElementById('city').setAttribute("readonly","readonly");
    
   }
 }
 ajaxRequest.open("GET", "city_ajax3.php?state="+state+"&po="+po, true);
 ajaxRequest.send(); 
 
  }
</script>
<script>
function validate()
{
	var email=document.getElementById('email').value;
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

  if(!(reValidEmail.test(email)))
  {
	  alert("Invalid E-mail Id..");
	  return false;
  }
  var y = document.getElementById("phone");
			var v=y.value;
			if (v.charAt(0)!='7'&&v.charAt(0)!='8'&&v.charAt(0)!='9') {
			  alert("Enter a valid phone number.");
			  y.value = "";
			  y.focus();
			  return false;
			 }
			else if (isNaN(y.value)) {
			  alert("The phone number contains illegal characters.");
			  y.value = "";
			  y.focus();
			  return false;
			 }
			 else if (!(y.value.length == 10)) {
			  alert("The phone number is the wrong length. \nPlease enter 10 digit mobile no.");
			  y.value = "";
			  y.focus();
			  return false;
			 }
			 var y = document.getElementById("altphone");
			var v=y.value;
			if(v!="")
			{
			if (v.charAt(0)!='7'&&v.charAt(0)!='8'&&v.charAt(0)!='9') {
			  alert("Enter a valid phone number.");
			  y.value = "";
			  y.focus();
			  return false;
			 }
			else if (isNaN(y.value)) {
			  alert("The phone number contains illegal characters.");
			  y.value = "";
			  y.focus();
			  return false;
			 }
			 else if (!(y.value.length == 10)) {
			  alert("The phone number is the wrong length. \nPlease enter 10 digit mobile no.");
			  y.value = "";
			  y.focus();
			  return false;
			 }
			}
	return true;
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
			<center><div class="logo"><img src="images/logo.png" height="70%" width="70%"></div></center>
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
		</div><br>
		<?php if(isset($_POST['sub']))
		{
		$otp=$_POST['otp'];
		$id=$_POST['sub'];
			require 'dbconnect.php';
			$link=connection();		
		$qry="Select Name,Age,Sex from donor where id=? and otp=?";
		if ($stmt2=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt2, "ss", $id,$otp);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$n=mysqli_stmt_num_rows($stmt2);
			if($n==0)
			{
				echo '<br><center><h3>Invalid OTP, Please Try Again</h3></center><br>';
			}
			else
			{
			mysqli_stmt_bind_result($stmt2,$name,$age,$g);	
			mysqli_stmt_fetch($stmt2);
			}
			}
			mysqli_stmt_close($stmt2);
			mysqli_close($link);
			?>
			<form action="add_donor.php" method="post">
		<h3><center>Enter Your Details Below:</center></h3>
		<div id="main-content">
			<div class="wrap-content">
			<form action="sub_donor.php" method="post">
			<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>Name:</b>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="wrap-col">
					<input type="text" value="<?php echo $name; ?>" class="form-control" name="name" required readonly></input>
				</div>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>Age:</b>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="wrap-col">
					<Select class="form-control" name="age" required>
					<option value="">Choose One</option>
					<?php for($i=18;$i<=60;$i++)
					{ ?>
				<option value="<?php echo $i; ?>" <?php if($age==$i) echo 'selected'; ?>><?php echo $i;?></option>
				<?php
					}
					?></Select>
				</div>
			</div>
			</div>
			<br>
			<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>Contact:</b>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="wrap-col">
					<input type="number" placeholder="Enter Contact.." class="form-control" id="phone" name="contact" required></input>
				</div>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>Alternate Contact:</b>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="wrap-col">
					<input type="number" placeholder="Enter Contact.." class="form-control" id="altphone" name="alt_contact">
					</input>
				</div>
			</div>
			</div>
			<br>
			<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>Gender:</b>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="wrap-col">
					<select name="gender" class="form-control" required readonly>
					<option value="">Choose One</option>
					<option value="M" <?php if($g=='M') echo 'selected'; ?>>Male</option>
					<option value="F" <?php if($g=='F') echo 'selected'; ?>>Female</option>
					<option value="O" <?php if($g=='O') echo 'selected'; ?>>Other</option>
					</select>
				</div>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>Blood Group:</b>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="wrap-col">
					<Select class="form-control" name="bg" required>
					<option value="">Choose One</option>
					<?php require_once 'dbconnect.php';
					$link=connection();
					$qry="Select grp from blood_groups";
					if ($stmt=mysqli_prepare($link, $qry))
					{
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$g);
					while(mysqli_stmt_fetch($stmt))
					{ 
					
					printf('<option value="%s">%s</option>',$g,$g);
					}
					}
					mysqli_stmt_close($stmt1);
					mysqli_close($link);
					?></Select>
				</div>
			</div>
			</div>
			<br>
			<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>Pincode:</b>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="wrap-col">
					<input type="number" placeholder="Enter Pincode.." class="form-control" id="code" name="pin" required></input>
				</div>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>State:</b>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="wrap-col">
					<Select class="form-control"  onchange="return xyz(this.value);" id="state" name="state" required>
					<option value="">Choose One</option>
					<?php require_once 'dbconnect.php';
					$qry="Select id,State_Name from state";
					$link=connection();
					if ($stmt=mysqli_prepare($link, $qry))
					{
					mysqli_stmt_execute($stmt);
					mysqli_stmt_bind_result($stmt,$id,$state);
					while(mysqli_stmt_fetch($stmt))
					{ 
					printf('<option value="%s">%s</option>',$id,$state);
					}
					}
					mysqli_stmt_close($stmt1);
					mysqli_close($link);
					?></Select>
				</div>
			</div>
			</div>
			<br>
			<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>Address:</b>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="wrap-col">
					<input type="text" placeholder="Enter Address.." class="form-control" name="address" required></input>
				</div>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>Post Office</b>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="wrap-col">
					<Select class="form-control" name="po" id="po" onchange="return opencity(this.value);" required>
					<option value="">Choose One</option>
					</Select>
				</div>
			</div>
			</div>
			<br>
			<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>City:</b>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="wrap-col">
					<input type="text" placeholder="Enter City" class="form-control" id="city" name="city" required readonly></input>
				</div>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>Last Donated:</b>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="wrap-col">
					<input type="date" class="form-control" name="last"></input>
				</div>
			</div>
			</div>
			<br>
			<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-1">
				<div class="wrap-col">
					<b>E-mail:</b>
				</div>
			</div>
			
			<div class="col-lg-3">
				<div class="wrap-col">
					<input type="text" placeholder="Enter Email" class="form-control" id="email" name="email" required></input>
				</div>
			</div>
			</div>
			<br><center><button class="btn btn-success" name="submit" value="<?php $id=$_POST['sub']; echo $id; ?>" onclick="return validate();">Submit</button></center><br>
				</div>
		</div> 
		</form>
		<?php
		}
		?>
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