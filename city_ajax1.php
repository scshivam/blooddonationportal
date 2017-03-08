<?php
$did=$_GET['district'];
$state=$_GET['state'];
require 'dbconnection.php';
$qry="SELECT State_Name from state where id='$state'";
$res=mysql_query($qry) or die(mysql_error());
$s=mysql_fetch_assoc($res);
$state1=$s['State_Name'];
$st=preg_replace('/[^A-Za-z0-9\-]/', '', $state1);
	$st=str_replace(' ','_',$st);
	$st=strtolower($st);
$qry="SELECT Districtname from ".$st." where id='$did'";
$res=mysql_query($qry) or die(mysql_error());
$s=mysql_fetch_assoc($res);
$dis=$s['Districtname'];
$qry="Select Distinct Taluk from ".$st." where statename='$state1' AND Districtname='$dis' order by Taluk";
$res=mysql_query($qry)or die(mysql_error());
while($row=mysql_fetch_assoc($res))
{
$city=$row['Taluk'];
$qry1="Select id from ".$st." where Taluk='$city'";
$res1=mysql_query($qry1)or die(mysql_error());
$s=mysql_fetch_assoc($res1);
$p=$s['id'];
echo '<option value='.$p.'>'.$city.'</option>';	
}
?>
