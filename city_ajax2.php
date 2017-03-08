<?php
$pin=$_GET['pin'];
$st=$_GET['state'];
require 'dbconnect.php';
$link=connection();
$qry="SELECT State_Name from state where id=?";
if ($stmt=mysqli_prepare($link, $qry))
{
mysqli_stmt_bind_param($stmt, "s", $st);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt,$state);
mysqli_stmt_fetch($stmt);
$st=preg_replace('/[^A-Za-z0-9\-]/', '', $state);
$st=str_replace(' ','_',$st);
$st=strtolower($st);
mysqli_stmt_close($stmt);
}
$query = "SELECT officename,id FROM ".$st." where pincode=?";
echo '<option value="">Choose One</option>';
if ($stmt1=mysqli_prepare($link, $query)) {
	mysqli_stmt_bind_param($stmt1, "s", $pin);
    mysqli_stmt_execute($stmt1);
mysqli_stmt_bind_result($stmt1,$officename,$id);
	while (mysqli_stmt_fetch($stmt1)) {
        printf ("<option value='%s'>%s</option>\n", $id, $officename);
    }
	mysqli_stmt_close($stmt1);
}
mysqli_close($link);
?>