<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once('Include/_init.php'); 
if (isset($_SESSION['id'])){
	$suid = trim($_SESSION['id']);
	$suid = strip_tags($suid);
	$suid = htmlspecialchars($suid);
	$suid = mssql_escape_string($suid);	
	

?>
<?php include('Include/head.php'); ?>
<?php include('Include/navbar.php'); ?>

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title"><i class="icon-display4"></i> <?php echo getlang('Dashboard'); ?></div>	
					<ul class="breadcrumb">
					<?php
					if(isset($_GET["id"])){
						echo '<li><a href="'.$_SITEURL.'">'.getlang('home').'</a></li>';
						echo '<li class="active">'.getlang('projects').'</li>';
					}else{
						echo '<li class="active">'.getlang('home').'</li>';
					}
					?>					
					</ul>	
				</div>
			</div>			
			<!--/Page Header-->
			
			<div class="container-fluid page-content">
				<div class="row">
				<?php
				$sql = "SELECT * FROM types WHERE enabled = 1 ORDER BY names DESC";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// output data of each row
					$rowcount = mysqli_num_rows($result);
					$count = 100/$rowcount;
					while($row = $result->fetch_assoc()) {
						$typeid = $row["id"];
						$sql1 = "SELECT * FROM project WHERE type='$typeid'";
						$result1 = $conn->query($sql1);
						$rowcount1 = mysqli_num_rows($result1);
				
						echo '<div class="col-md-3" style="width:'.$count.'%;">
							<div class="panel panel-flat">
								<div class="panel-body p-b-10">
									<div class="row">
										<div class="col-md-12 col-xs-8">
											<div class="text-size-huge text-regular text-blue-dark text-semibold no-padding no-margin m-t-5 m-b-10">'.$rowcount1.'</div>
											<span class="text-muted">'.$row["names"].'</span>
										</div>
									</div>
								</div>
								<div class="panel-footer bg-blue">							
									<div class="elements">
										<a href="?id='.$typeid.'" class="pull-right no-padding-right text-white">'.getlang('VIALL').' <i class="icon-arrow-right6 position-right"></i></a>
									</div>
								</div>
							</div>
						</div>';
					}
				}
				?>
				</div>		
			
			
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
					<?php 
						if(isset($_GET["id"])){
							$getid = trim($_GET["id"]);
							$getid = strip_tags($getid);
							$getid = htmlspecialchars($getid);
							$getid = mssql_escape_string($getid);
							
							$sql0 = "SELECT * FROM types WHERE id='$getid'";
							$result0 = $conn->query($sql0);

							if ($result0->num_rows == 1) {
								$row0 = $result0->fetch_assoc();
								$typename = $row0["names"];
					?>		
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo $typename; ?></h5>						
							</div>
								<div class="m-t-20">
								<?php
								$sql = "SELECT * FROM project WHERE status='0' AND type ='$getid' ORDER BY deadline DESC";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									echo '<table class="table table-hover invoice-list" id="datatable">
										<thead>
											<tr>
												<th>#</th>
												<th>'.getlang('project').'</th>										
												<th>'.getlang('started_on').'</th>																		
												<th>'.getlang('deadline').'</th>
												<th>'.getlang('days_to_deadline').'</th>
												<th class="text-center">'.getlang('actions').'</th>
											</tr>
										</thead>
										<tbody>';
									$i=0;
									while($row = $result->fetch_assoc()) {
										$i++;
										$projid = $row["id"];
										$projname = $row["name"];
										$projcomp = $row["company"];
										$projstatus = $row["status"];
										$projrespo = $row["priority"];
										
										$projstart = $row["start"];
										$projend = $row["deadline"];
										
										$mainstart = $row["start"];
										$mainend = $row["deadline"];
										
										$projstart1 = new DateTime($projstart);
										$projstart = $projstart1->format('d-m-Y');
										
										$projend1 = new DateTime($projend);
										$projend = $projend1->format('d-m-Y');
										
										$diff=date_diff($projstart1,$projend1);
										$proddaytodead = $diff->format("%a");
										
										$mainend1 = new DateTime($mainend);
										$mainend = $mainend1->format('d-m-Y');
										
										$maindnow = date('Y-m-d h:i:s');
										$maindnow1 = new DateTime($maindnow);
										$maindnow = $maindnow1->format('d-m-Y');
										
										$dmainiff=date_diff($maindnow1,$mainend1);
										$mainproddaytodead = $dmainiff->format("%r%a days");
										
										
										echo '<tr>
											<td>'.$i.'</td>
											<td><a href="'.$_SITEURL.'projects_details?id='.$projid.'">'.$projcomp.' - '.$projname.'</a></td>
											<td>
												'.$projstart.'
											</td>													
											<td>
												'.$projend.'
											</td>
											<td>'.$mainproddaytodead.'</td>
											<td class="text-center">
												<ul class="icons-list">
													<li><a href="'.$_SITEURL.'projects_details?id='.$projid.'" ><i class="icon-eye2"></i></a></li>
												</ul>
											</td>
											</tr>';
									}
									echo '</tbody></table>';
								} else {
									echo '<div class="panel-heading">
										<h5 class="panel-title">'.getlang('no_projects').'</h5>						
									</div>';
								}
								?>
								</div>
						</div>
					<?php
						}else{
							echo '<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">'.getlang('wrong_t_number').'</h5>						
							</div></div>';
						}
						}else{
							
					?>
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo getlang('open_problems'); ?></h5>						
							</div>
							<div class="m-t-20">
							<table class="table table-hover invoice-list" id="datatable">
								<thead>
									<tr>
										<th>#</th>
										<th><?php echo getlang('project'); ?></th>	
										<th><?php echo getlang('type'); ?></th>		
										<th><?php echo getlang('prob_type'); ?></th>	
										<th><?php echo getlang('description'); ?></th>																		
										<th><?php echo getlang('opened_on'); ?></th>
										<th><?php echo getlang('status'); ?></th>
										<th><?php echo getlang('last_answered'); ?></th>
										<th><?php echo getlang('responsible'); ?></th>
										<th><?php echo getlang('department'); ?></th>
										<th class="text-center"><?php echo getlang('status'); ?></th>
									</tr>
								</thead>
								<tbody>
								<?php
								$sql = "SELECT * FROM project_entry WHERE status='2' OR status='1' OR status='3' ORDER BY status DESC";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									$i=0;
									while($row = $result->fetch_assoc()) {
										$i++;
										$entryid = $row["id"];
										$projid = $row["project"];
										$projdes = $row["info"];
										$projstatus = $row["status"];
										$projdate = $row["date"];
										$projrespo = $row["owner"];
										$projprobtype = $row["type"];
										
										$projdate = new DateTime($projdate);
										$projdate = $projdate->format('d-m-Y H:i');
										
										$projlast = $row["lastanswer"];
										$projlast = new DateTime($projlast);
										$projlast = $projlast->format('d-m-Y H:i');
										
										$sql1 = "SELECT * FROM project WHERE id='$projid'";
										$result1 = $conn->query($sql1);

										if ($result1->num_rows == 1) {
											$row1 = $result1->fetch_assoc();
											$projname = $row1["name"];
											$projcomp = $row1["company"];
											$projtype = $row1["type"];
											
											$typesql = "SELECT * FROM types WHERE id='$projtype'";
											$typeresult = $conn->query($typesql);

											if ($typeresult->num_rows == 1) {
												$typerow = $typeresult->fetch_assoc();
												$typename = $typerow["names"];
												
											}else{
												$typename = getlang('unknown');
											}
										}
										
										$prob_type_sql = "SELECT name FROM problem_type WHERE id='$projprobtype'";
										$prob_type_result = $conn->query($prob_type_sql);

										if ($prob_type_result->num_rows == 1) {
											$prob_type_row = $prob_type_result->fetch_assoc();
											$real_problem_type = $prob_type_row["name"];
										}else{
											$real_problem_type = getlang('unknown');
										}
										
										
										
										echo '<tr>
											<td>'.$i.'</td>
											<td><a href="'.$_SITEURL.'projects_details?id='.$projid.'">'.$projcomp.' - '.$projname.'</a></td>
											<td>
												'.$typename.'
											</td>
											<td>
												'.$real_problem_type.'
											</td>
											<td>
												<h5 class="no-margin">
													'.$projdes.'												
												</h5>
											</td>	
											<td>
												'.$projdate.'
											</td>
											<td>';
											if ($projstatus == '2'){
												echo '<span class="label label-warning">'.getlang('new').'</span>';
											}elseif ($projstatus == '1'){
												echo '<span class="label label-info">'.getlang('pending').'</span>';
											}elseif ($projstatus == '0'){
												echo '<span class="label label-success">'.getlang('closed').'</span>';
											}elseif ($projstatus == '3'){
												echo '<span class="label label-danger">'.getlang('escalated').'</span>';
											}
												
											echo '</td>
											<td>
												'.$projlast.'
											</td>
											<td>';
												$sql2 = "SELECT Department, FName, LName FROM user WHERE id='$projrespo'";
												$result2 = $conn->query($sql2);

												if ($result2->num_rows == 1) {
													$row2 = $result2->fetch_assoc();
													$seldep = $row2["Department"];
													
													$sql3 = "SELECT name FROM department WHERE id='$seldep'";
													$result3 = $conn->query($sql3);

													if ($result3->num_rows == 1) {
														$row3 = $result3->fetch_assoc();
														$depa = $row3["name"];
													}else{
														$depa = 'Unknown';
													}
													
													echo $row2["FName"].' '.$row2["LName"];
													
												}
											echo '</td>
											<td>'.$depa.'</td>
											<td class="text-center">
												<ul class="icons-list">
													<li><a href="'.$_SITEURL.'projects_item?id='.$entryid.'" ><i class="icon-eye2"></i></a></li>
												</ul>
											</td>
										</tr>';
									}
								} else {
									echo "<tr> No open Projects found!</tr>";
								}
								?>
							
								</tbody>
							</table>
							</div>
						</div>
				<?php } ?>	
					</div>																						
				</div>


<?php include('Include/footer.php'); ?>

<!-- Page scripts -->	

<!-- /page scripts -->
<?php include('Include/foot.php'); ?>
<?php 
}else{
	header("Location: ".$_SITEURL."Login");
}
?>