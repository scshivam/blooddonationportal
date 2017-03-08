<?php
session_start();
include 'dbconnection.php';
include 'mail.php';
if(isset($_POST['add']))
{
	$id=$_POST['add'];
	if($_SESSION['type']=='A')
	{
	$query="Update login set Type='UA' where Id='$id'";
	$res=mysql_query($query)or die(mysql_error());
	}
	else
		if($_SESSION['type']=='UA')
			{
	$query="Update login set Type='V' where Id='$id'";
	$res=mysql_query($query)or die(mysql_error());
	$query="Select State From members where User_Id='$id'";
	$res=mysql_query($query)or die(mysql_error());
	$row=mysql_fetch_assoc($res);
	$state=$row['State'];
	$query="Update members set Assign_State='$state' where User_Id='$id'";
	$res=mysql_query($query)or die(mysql_error());
	}
	$query="SELECT Email,Pass from login where Id='$id'";
	$res=mysql_query($query)or die(mysql_error());
	$row=mysql_fetch_assoc($res);
	$qry1="Select Name from members where User_Id='$id'";
	$res1=mysql_query($qry1)or die(mysql_error());
	$row1=mysql_fetch_assoc($res1);
	$name=$row1['Name'];
	$email=$row['Email'];
	$pass=$row['Pass'];
	$sub="Welcome To Blood Donation Portal.";
	$b="Hello ".$name.",<br>Congratulations, You Are A member Now.<br>Your Password is : ".$pass."<br><br><br>Thanking You,<br>Uddeshhya Team";
	sendmail($email,$name,$sub,$b);
	header("Refresh:0;URL=authentication.php");
}
else
	if(isset($_POST['delete']))
	{
		$id=$_POST['delete'];
		$qry="Delete from login where Id='$id'";
		$qry1="Delete from members where User_Id='$id'";
		$res=mysql_query($qry)or die(mysql_error());
		$res=mysql_query($qry1)or die(mysql_error());
		$qry="Delete from answer where User_Id='$id'";
		$res=mysql_query($qry)or die(mysql_error());
		header("Refresh:0;URL=authentication.php");
	}
	?>