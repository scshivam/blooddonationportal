<option value="">Choose One</option>
<?php
$state=$_GET['state'];
require 'dbconnection.php';
$qry="SELECT State_Name from state where id='$state'";
$res=mysql_query($qry) or die(mysql_error());
$s=mysql_fetch_assoc($res);
$state1=$s['State_Name'];
$st=preg_replace('/[^A-Za-z0-9\-]/', '', $state1);
	$st=str_replace(' ','_',$st);
	$st=strtolower($st);
$qry="Select Distinct Districtname from ".$st." where statename='$state1' order by Districtname";
$res=mysql_query($qry)or die(mysql_error());
while($row=mysql_fetch_assoc($res))
{
$city=$row['Districtname'];
$qry1="Select id from ".$st." where Districtname='$city'";
$res1=mysql_query($qry1)or die(mysql_error());
$s=mysql_fetch_assoc($res1);
$p=$s['id'];
echo '<option value='.$p.'>'.$city.'</option>';	
}
?>
