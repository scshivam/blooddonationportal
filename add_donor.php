<?php
error_reporting(E_ALL);
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
$last=$_POST['last'];
$email=$_POST['email'];
require_once 'purify/library/HTMLPurifier.auto.php';

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
$cname = $purifier->purify($name);
$cadd = $purifier->purify($add);
$cemail = $purifier->purify($email);
if($_POST['submit']=="")
{
			require_once 'dbconnect.php';
			$link=connection();
			$qry="Select *  from donor where email=? AND Type='D'";
			if ($stmt2=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt2, "s", $cemail);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$n=mysqli_stmt_num_rows($stmt2);
			if($n!=0)
			{
				?><script>alert('You Are Already in our donors list...');</script><?php
			header("Refresh:0;URL=index.php");
			die();
			}
			}
			mysqli_stmt_close($stmt2);
			$qry="Select * from donor where Type='D' And phone=?";
			if ($stmt2=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt2, "s", $co);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$n=mysqli_stmt_num_rows($stmt2);
			if($n!=0)
			{
				?><script>alert('You Are Already in our donors list...');</script><?php
			header("Refresh:0;URL=index.php");
			die();
			}
			}
			mysqli_stmt_close($stmt2);
			$qry="Select * from donor where Type='D' and Alternate=?";
			if ($stmt2=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt2, "s",$co);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$n=mysqli_stmt_num_rows($stmt2);
			if($n!=0)
			{
				?><script>alert('You Are Already in our donors list...');</script><?php
			header("Refresh:0;URL=index.php");
			die();
			}
			}
			mysqli_stmt_close($stmt2);
			if($alt!='')
			{
			$qry="Select * from donor where Type='D' And Alternate=?";
			if ($stmt2=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt2, "s", $alt);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$n=mysqli_stmt_num_rows($stmt2);
			if($n!=0)
			{
				?><script>alert('You Are Already in our donors list...');</script><?php
			header("Refresh:0;URL=index.php");
			die();
			}
			}
			mysqli_stmt_close($stmt2);
			$qry="Select * from donor where Type='D' And phone=?";
			if ($stmt2=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt2, "s", $alt);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$n=mysqli_stmt_num_rows($stmt2);
			if($n!=0)
			{
				?><script>alert('You Are Already in our donors list...');</script><?php
			header("Refresh:0;URL=index.php");
			die();
			}
			}
			mysqli_stmt_close($stmt2);
			}
echo $qry="Insert Into donor (Name,Age,Sex,Bgroup,Address,City,State,pincode,phone,Alternate,Last_Donated,email,Type) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,'D')";
echo "$cname,$age,$s,$bg,$cadd,$city,$state,$pin,$co,$alt,$last,$cemail";
if ($stmt1=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt1, "ssssssssssss",$cname,$age,$s,$bg,$cadd,$city,$state,$pin,$co,$alt,$last,$cemail);
			mysqli_stmt_execute($stmt1);
			mysqli_stmt_store_result($stmt1);
			}
			mysqli_stmt_close($stmt1);
			mysqli_close($link);
}
else
{
	$id=$_POST['submit'];
	require_once 'dbconnect.php';
			$link=connection();
$qry="Update donor set Name=?,Age=?,Sex=?,Bgroup=?,Address=?,City=?,State=?,pincode=?,phone=?,Alternate=?,Last_Donated=?,email=?,Type='D' where Id='$id'";
if ($stmt1=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt1, "ssssssssssss",$cname,$age,$s,$bg,$cadd,$city,$state,$pin,$co,$alt,$last,$cemail);
			mysqli_stmt_execute($stmt1);
			mysqli_stmt_store_result($stmt1);
			}
			mysqli_stmt_close($stmt1);
			mysqli_close($link);	
}
}
//header("Refresh:0;URL=success.php");
?>