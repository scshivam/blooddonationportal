<div id="left">
<div class="media user-media well-small">
                
                <div class="media-body">
                    <h5 class="media-heading"><?php echo $_SESSION['name']; ?></h5>
                    <small><?php require 'dbconnection.php';
					if($_SESSION['type']=='SA')
						echo '<br>Super Admin<br>';
						else
							if($_SESSION['type']=='A') 
								echo '<br>Admin<br>';
							else
								if($_SESSION['state']!='')
							{
								echo '<br>';
								$j=0;
								$a=explode('_',$_SESSION['state']);
								while($j<count($a))
								{
								$id=$a[$j++]; 
								$qry1="Select State_Name from state where id='$id'";
								$res1=mysql_query($qry1) or die(mysql_error());
								$row1=mysql_fetch_assoc($res1);
							echo $row1['State_Name'].'<br>'; } 
							}
							else
							{
								if($_SESSION['type']=='UA')
								echo 'Uddeshhya Admin';
								else
								echo "Volunteer";
							}								?>
						</small>
                </div>
            </div>
				<h4><center>Navigation</center></h4>
                    <ul id="menu" class="collapse">
					<?php include 'dbconnection.php';
					$type=$_SESSION['type'];
					$query="Select * from left_panel where Main='Dashboard' And Type='$type'";
					$result=mysql_query($query)or die();
					$row=mysql_fetch_assoc($result);
					echo '<li class="pannel"><a href="'.$row['LinkS1'].'"><i class="'.$row['Icon'].'"></i> '.$row['Main'].'</a></li>';
					$query="Select * from left_panel where Main!='Dashboard' And Type='$type'";
					$result=mysql_query($query)or die();
					$i=1;
					while($row=mysql_fetch_assoc($result))
					{
					echo '<li class="pannel"><a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle left" data-target="#component-nav'.$i.'"><span class="pull-right">
                          <i class="icon-angle-left"></i>
                        </span><i class="'.$row['Icon'].'"></i> '.$row['Main'].'</a>';
					echo '<ul class="collapse" id="component-nav'.$i++.'">';
					$j=1;
					while($j<=5)
					{
					if($row['S'.$j]!=NULL)
					echo '<li><a href="'.$row['LinkS'.$j].'"><i class="'.$row['IconS'.$j].'"></i> '.$row['S'.$j].'</a></li>';
					$j++;					
					}
					echo '</ul></li>';
					}
					
					?></ul></li>
                        
                </div><!-- leftpanel -->

				