<noscript>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><center><p style="font-size:50px">PLEASE ENABLE JAVASCRIPT TO CONTINUE</p></center><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<meta http-equiv="Refresh" content="5;URL=index.php" />
</noscript>
   <script type="text/javascript">
  function seen()
  {
	try{
   
   ajaxRequest = new XMLHttpRequest();
  
 }catch (e){
  
   try{
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      
   }catch (e) {
      try{
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         
      }catch (e){
        
         alert("Your browser broke!");
         return false;
      }
   }
 }

 ajaxRequest.onreadystatechange = function(){
   if(ajaxRequest.readyState == 4){
	   
      var ajaxDisplay = document.getElementById('upd');
      
      ajaxDisplay.innerHTML = ajaxRequest.responseText;
      
    
   }
 }
 ajaxRequest.open("GET", "ajax.php", true);
 ajaxRequest.send(); 
 
  }
</script>
 <div id="top">
<?php 
include 'dbconnection.php'; ?>
            <nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <header class="navbar-header">

                    <a href="dash.php" class="navbar-brand">
                    <img src="assets/img/logo1.png" width="20%" alt="" /><b>&nbsp;&nbsp;UDDESHHYA</b></a>
                </header>
                <ul class="nav navbar-top-links navbar-right">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php $id=$_SESSION['id'];
$qry="Select Msg from notification where Notify_to='$id' and Seen='0'";
$res=mysql_query($qry)or die(mysql_error());
$n=mysql_num_rows($res);
?>
                    <!-- MESSAGES SECTION -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" onclick="seen();">
                            <span id="upd" class="label label-success"><?php echo $n; ?></span>    <i class="icon-envelope-alt"></i>&nbsp; <i class="icon-chevron-down"></i>
                        </a>
						
                        <ul class="dropdown-menu dropdown-messages col-xs-3">
                            <?php while($row=mysql_fetch_assoc($res))
							{ 
						extract($row);?>
							<li>
                                <a href="state_acceptors.php">
                                    <div>
                                    </div>
                                    <div><?php echo $Msg; ?>
                                        <br />
                                        <span class="label label-primary">Important</span> 

                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <?php }
									if($n==0) echo '<center>No Notifications..</center>'?>
                        </ul>

                    </li>
                    <!--END MESSAGES SECTION -->

                    
                    <!--ADMIN SETTINGS SECTIONS -->

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user "></i>&nbsp; <i class="icon-chevron-down "></i>
                        </a>

                        <ul class="dropdown-menu dropdown-user col-md-11">
                            <li><a href="#"><i class="icon-user"></i> User Profile </a>
                            </li>
                            <li><a href="#"><i class="icon-gear"></i> Change Password </a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="icon-signout"></i> Logout </a>
                            </li>
                        </ul>

                    </li>
                    <!--END ADMIN SETTINGS -->
                </ul>

            </nav>

        </div>
        