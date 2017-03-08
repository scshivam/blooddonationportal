<?php
session_start();
$redirect6 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'notfound.html';
if($_SESSION['type']!='A')
{
  header("Refresh:0;URL=".$redirect6);
}
include 'dbconnection.php';
if(isset($_POST['submit']))
{
	$q=$_POST['question'];
	$qry="insert into question (Question) VALUES ('$q')";
	$res=mysql_query($qry)or die(mysql_error());
	header("Refresh:0;URL=add_ques.php?msg=successful");
}
?>