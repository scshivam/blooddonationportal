<?php
session_start();
require "dbconnection.php" ;


$hash1 = (isset($_POST['username'])) ? trim($_POST['username'])  : '';
$hash2 = (isset($_POST['password'])) ? $_POST['password'] : '';
$redirect1 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'dash.php';
$redirect6 = (isset($_REQUEST['redirect'])) ? $_REQUEST['redirect'] :
'login.php';
if(isset($_SESSION['type']))
{
	header ('Refresh:0; URL=' . $redirect1);
}
else
if(isset($_POST['submit']))
    {
        $query = 'select a.Id,a.Type,b.Name,b.Assign_State,b.Pincode from login a,members b where ' . 
        'a.Email = "' . mysql_real_escape_string($hash1, $connection) . '"AND ' .
        'a.Pass = "' . mysql_real_escape_string($hash2, $connection) . '"AND a.Id=b.User_Id';
         





			if(preg_match('/\s/', $hash1)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				
			if(preg_match('/[\'"]/', $hash1)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				

			if(preg_match('/[\/\\\\]/', $hash1)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				

			if(preg_match('/(AND|null|where|limit)/i', $hash1)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				

			if(preg_match('/(union|select|from|where)/i', $hash1)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				
			if(preg_match('/(order|having|limit)/i', $hash1)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				

			if(preg_match('/(into|file|case)/i', $hash1)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				

			if(preg_match('/(--|#|\/\*\!\$\%\^\&\(\))/', $hash1)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				
				
				if(preg_match('/\s/', $hash2)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				
			if(preg_match('/[\'"]/', $hash2)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				
			if(preg_match('/[\/\\\\]/', $hash2)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				
			if(preg_match('/(and|null|where|limit)/i', $hash2)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				

			if(preg_match('/(union|select|from|where)/i', $hash2)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				

			if(preg_match('/(order|having|limit)/i', $hash2)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				
			if(preg_match('/(into|file|case)/i', $hash2)) 
				exit(header('Refresh: 0; URL=' . $redirect6));
				

			if(preg_match('/(--|#|\/\*\!\$\%\^\&\(\))/', $hash2)) 
				exit(header ('Refresh: 0; URL=' . $redirect6));

        $result=mysql_query($query,$connection)or die(mysql_error($connection));
        if (mysql_num_rows($result) > 0)
        {
             
            while($row=mysql_fetch_assoc($result))
            {
             $_SESSION['type'] = $row['Type'];
			 $_SESSION['state']=$row['Assign_State'];
			 $_SESSION['pincode']=$row['Pincode'];
             $_SESSION['name'] = $row['Name'];
             $_SESSION['id']= $row['Id'];
			 $type=$row['Type'];
			 if($type!='NA'&&$type!='DE')
			 {
			 header ('Refresh:0; URL=' . $redirect1);
			 }
			 else
				 if($type=='NA')
			 {
				?><script>alert('Please wait Till Someone Authourises You');</script>
				<?php 
				header ('Refresh: 0; URL=logout.php');
			 }
			 else
				 if($type=='DE')
			 {
				?><script>alert('You Have Been Removed From Members List. Please Contact Your Senior.');</script>
				<?php 
				header ('Refresh: 0; URL=logout.php');
			 }
die();
         }
    }
	else
	{ ?>
		<script> alert("Wrong Entries Please Re-enter"); </script>
	<?php header ('Refresh: 0; URL=' . $redirect6);
	}
	}
	else
		header ('Refresh: 0; URL=' . $redirect6);
?>