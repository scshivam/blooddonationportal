<?php
session_start();
$redirect1 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'delete_ud.php';
$redirect2 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'remove_volunteer.php';
if(isset($_POST['delete']))
{
	include 'dbconnection.php';
	$id=$_POST['delete'];
	$qry="Update login set Type='DE' where Id='$id'";
	$res=mysql_query($qry)or die(mysql_error());
	if($_SESSION['type']=='A')
	header("Refresh:0;URL=".$redirect1);
	else
	if($_SESSION['type']=='UA')
	header("Refresh:0;URL=".$redirect2);
}
?>