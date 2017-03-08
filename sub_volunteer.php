<?php
$name=$_POST['name'];
$age=$_POST['age'];
$co=$_POST['contact'];
$alt=$_POST['alt_contact'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$pin=$_POST['pin'];
$state=$_POST['state'];
$add=$_POST['address'];
$c=$_POST['city'];
$ci=explode('-',$c);
$city=$ci[0];
$pass=$_POST['pass'];
require_once 'purify/library/HTMLPurifier.auto.php';

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);
$cname = $purifier->purify($name);
$cadd = $purifier->purify($add);
$cemail = $purifier->purify($email);
$cpass = $purifier->purify($pass);
require_once 'dbconnect.php';
			$link=connection();
			$qry="Select *  from login where Email=?";
			if ($stmt2=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt2, "s", $cemail);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$n=mysqli_stmt_num_rows($stmt2);
			if($n!=0)
			{
				?><script>alert('You Are Already in our list...If You Are Not Authorised Please Wait Till Someone Authorises You');</script><?php
			header("Refresh:0;URL=index.php");
			die();
			}
			}
			mysqli_stmt_close($stmt2);
			$qry="Select * from members where phone=?";
			if ($stmt2=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt2, "s", $co);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$n=mysqli_stmt_num_rows($stmt2);
			if($n!=0)
			{
				?><script>alert('You Are Already in our list...If You Are Not Authorised Please Wait Till Someone Authorises You');</script><?php
			header("Refresh:0;URL=index.php");
			die();
			}
			}
			mysqli_stmt_close($stmt2);
			$qry="Select * from members where Alternate_Phone=?";
			if ($stmt2=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt2, "s",$co);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$n=mysqli_stmt_num_rows($stmt2);
			if($n!=0)
			{
				?><script>alert('You Are Already in our list...If You Are Not Authorised Please Wait Till Someone Authorises You');</script><?php
			header("Refresh:0;URL=index.php");
			die();
			}
			}
			mysqli_stmt_close($stmt2);
			if($alt!='')
			{
			$qry="Select * from members whereAlternate_Phone=?";
			if ($stmt2=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt2, "s", $alt);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$n=mysqli_stmt_num_rows($stmt2);
			if($n!=0)
			{
				?><script>alert('You Are Already in our list...If You Are Not Authorised Please Wait Till Someone Authorises You');</script><?php
			header("Refresh:0;URL=index.php");
			die();
			}
			}
			$qry="Select * from members where phone=?";
			if ($stmt2=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt2, "s", $alt);
			mysqli_stmt_execute($stmt2);
			mysqli_stmt_store_result($stmt2);
			$n=mysqli_stmt_num_rows($stmt2);
			if($n!=0)
			{
				?><script>alert('You Are Already in our list...If You Are Not Authorised Please Wait Till Someone Authorises You');</script><?php
			header("Refresh:0;URL=index.php");
			die();
			}
			}
			mysqli_stmt_close($stmt2);
			}
			if($cemail!=""&&$cpass!="")
			{
			$qry="Insert into login (Email,Pass,Type) VALUES (?,?,'NA')";
			if ($stmt1=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt1, "ss",$cemail,$cpass);
			mysqli_stmt_execute($stmt1);
			mysqli_stmt_store_result($stmt1);
			}
			mysqli_stmt_close($stmt1);
			
			$qry="Select Id from login where Email=?";
			if ($stmt1=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt1, "s",$cemail);
			mysqli_stmt_execute($stmt1);
			mysqli_stmt_bind_result($stmt1,$id);
			mysqli_stmt_fetch($stmt1);
			}
			mysqli_stmt_close($stmt1);
			require_once 'img_upload.php';
			$x=upload($id);
			if($x==1)
			{
			$scan=$id.'.jpg';
			$qry="Insert Into members (User_Id,Name,Age,Sex,scan,Address,City,State,Pincode,phone,Alternate_Phone) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
			if ($stmt1=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt1, "sssssssssss",$id,$cname,$age,$gender,$scan,$cadd,$city,$state,$pin,$co,$alt);
			mysqli_stmt_execute($stmt1);
			mysqli_stmt_store_result($stmt1);
			}
			mysqli_stmt_close($stmt1);
			$ans=array();
			$size=$_POST['submit'];
			for($i=1;$i<=$size;$i++)
			{
				$loc='answer'.$i;
			$ans[$i]=$_POST[$loc];
			}
			$answ=implode('*',$ans);
			$qry="Insert into answer (User_Id,Answers) VALUES (?,?)";
			if ($stmt1=mysqli_prepare($link, $qry))
			{
			mysqli_stmt_bind_param($stmt1, "ss",$id,$answ);
			mysqli_stmt_execute($stmt1);
			mysqli_stmt_store_result($stmt1);
			}
			mysqli_stmt_close($stmt1);
			}
			else
			{
				require_once 'dbconnection.php';
				$query="Delete from login where Id='$id'";
				$res=mysql_query($query)or die(mysql_error());
				?><script>alert("File was not correct Please Retry with Proper file");</script>
				<?php
			}
			}
			mysqli_close($link);
			header("Refresh:0;URL=success.php");
?>