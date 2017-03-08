<?php
function connection()
{
	$link = mysqli_connect("localhost", "root", "", "blood");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
	header("Refresh:0;URL=index.php");
    die();
}
return $link;
}