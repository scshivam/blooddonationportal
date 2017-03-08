<?php
session_start();
$id=$_SESSION['id'];
include 'dbconnection.php';
$query="Select Id from Notification where Notify_to='$id' and Seen='0'";
$result=mysql_query($query)or die(mysql_error());
while($row=mysql_fetch_assoc($result))
{
	$i=$row['Id'];
$qry="Update Notification Set Seen='1' where Id='$i'";
$res=mysql_query($qry)or die(mysql_error());
}
echo '0';?>