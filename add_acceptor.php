<?php
include 'mail.php';
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$age=$_POST['age'];
$co=$_POST['contact'];
$alt=$_POST['alt_contact'];
$s=$_POST['gender'];
$bg=$_POST['bg'];
$pin=$_POST['pin'];
$state=$_POST['state'];
$add=$_POST['address'];
$c=$_POST['city'];
$ci=explode('-',$c);
$city=$ci[0];
$detail=$_POST['detail'];
$email=$_POST['email'];
require_once 'purify/library/HTMLPurifier.auto.php';

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
$cname = $purifier->purify($name);
$cadd = $purifier->purify($add);
$cemail = $purifier->purify($email);
$detail=$purifier->purify($detail);
require_once 'dbconnect.php';
			$link=connection();
			
$qry="Insert Into donor (Name,Age,Sex,Bgroup,Address,City,State,pincode,phone,Alternate,Detail,email,Type) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,'AC')";
if ($stmt1=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt1, "ssssssssssss",$cname,$age,$s,$bg,$cadd,$city,$state,$pin,$co,$alt,$detail,$cemail);
			mysqli_stmt_execute($stmt1);
			mysqli_stmt_store_result($stmt1);
			}
			sendmail($cemail,$name,'Uddeshhya Blood Portal','Thank You For Your Request.<br>We will Contact You Shortly<br><br>With Regards,<br>Team Uddeshhya');
			mysqli_stmt_close($stmt1);
			mysqli_close($link);
			require_once 'dbconnect.php';
			$link=connection();
			$qry="Select User_Id,Name,Assign_State from members where Assign_State!=''"; 
			if ($stmt1=mysqli_prepare($link, $qry))
			{
				$msg=$cname." needs Blood in Your Region.";
				$sub="Urgent Uddeshhya Blood Portal";
			mysqli_stmt_execute($stmt1);
			mysqli_stmt_bind_result($stmt1,$id,$na,$st);	
			while(mysqli_stmt_fetch($stmt1))
			{
			$sa=explode('_',$st);
			for($i=0;$i<count($sa);$i++)
			{
				if($state==$sa[$i])
				{
					require_once 'dbconnection.php';
					$query="Insert Into notification (Notify_to,Msg)VALUES('$id','$msg')";
					$result=mysql_query($query)or die(mysql_error());
					$query="Select Email from login where Id='$id'";
					$result=mysql_query($query)or die(mysql_error());
					$row=mysql_fetch_assoc($result);
					$email=$row['Email'];
					sendmail1($email,$name,$sub,$msg);
					break;
				}
			}
			}
			mysqli_stmt_close($stmt1);
			}
			
}
header("Refresh:0;URL=success.php");
			?>