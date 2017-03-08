<?php
$redirect6 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'unassign_state.php';
session_start();
require 'dbconnection.php';
if(isset($_POST['delete']))
{
	$y=array();
	$d=$_POST['delete'];
	$de=explode('@',$d);
	$id=$de[0];
	$del=$de[1];
	$query="Select Assign_State from members where User_Id='$id'";
	$result=mysql_query($query)or die(mysql_error());
	$row=mysql_fetch_assoc($result);
	$x=$row['Assign_State'];
	$y=explode('_',$x);
	$k=array_search($del,$y);
	unset($y[$k]);
	$ne=implode('_',$y);
	$query="UPDATE members set Assign_State='$ne' where User_Id='$id'";
	$result=mysql_query($query)or die(mysql_error());
	$query="Update state set Status='N' where id='$del'";
	$result=mysql_query($query)or die(mysql_error());
	header("Refresh:0;URL=".$redirect6);
}
?>