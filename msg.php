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
					<div class="page-title">
						<i class="icon-display4"></i> <?php echo getlang('msg'); ?>
					</div>		
					<ul class="breadcrumb">
						<li><a href="<?php echo $_SITEURL; ?>"><?php echo getlang('home'); ?></a></li>						
						<li class="active"><?php echo getlang('msg'); ?></li>
					</ul>
				</div>
			</div>			
			<!--/Page Header-->
			
			<div class="container-fluid page-content">
				<div class="row">
				<?php
				$sql = "SELECT * FROM types ORDER BY names DESC";
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
										<a href="'.$_SITEURL.'?id='.$typeid.'" class="pull-right no-padding-right text-white">'.getlang('VIALL').' <i class="icon-arrow-right6 position-right"></i></a>
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
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo getlang('msg'); ?></h5>						
							</div>

							<table class="table table-hover invoice-list" id="datatable">
								<thead>
									<tr>
										<th>#</th>
										<th><?php echo getlang('project'); ?></th>	
										<th><?php echo getlang('message'); ?></th>		
										<th><?php echo getlang('description'); ?></th>	
										<th><?php echo getlang('date'); ?></th>	
										<th><?php echo getlang('status'); ?></th>										
										
									</tr>
								</thead>
								<tbody>
								<?php
										$sql0 = "SELECT * FROM entry_history WHERE entry IN (SELECT id FROM project_entry WHERE creator='$suid') ORDER BY date DESC";
										$result0 = $conn->query($sql0);

										if ($result0->num_rows > 0) {
											$i=0;
											while($row0 = $result0->fetch_assoc()) {
												$i++;
												$entryhisid = $row0["entry"];
												$entryhiscreator = $row0["creator"];
												$entryhismsg = base64_decode($row0["message"]);
												$entryhisdate = $row0["date"];
												$entryhisdate = new DateTime($entryhisdate);
												$entryhisdate = $entryhisdate->format('d-m-Y H:i');
												
												$sql = "SELECT * FROM project_entry WHERE id='$entryhisid' ORDER BY date DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
													
													$row = $result->fetch_assoc();
														$navnaventryid = $row["id"];
														$navnavprojid = $row["project"];
														$navnavprojdes = $row["info"];
														$navprojdescript = $row["descri"];
														$navnavprojstatus1 = $row["status"];
														$navnavprojdate = $row["date"];
														$navnavprojrespo = $row["owner"];
														$navnavprojcreator = $row["creator"];
																					
														$navprojdate1 = new DateTime($navnavprojdate);
														$navprojdate = $navprojdate1->format('d-m-Y');
																					
														$navnavprojlast = $row["lastanswer"];
														$navprojlast = new DateTime($navnavprojlast);
														$navprojlast = $navprojlast->format('d-m-Y H:i');
														
														$navnavnavsolunti1 = $row["solveuntil"];
														$navnavsolunti1 = new DateTime($navnavnavsolunti1);
														$navnavsolunti = $navnavsolunti1->format('d-m-Y');
														
														$navdiff=date_diff($navnavsolunti1,$navprojdate1);
														$navnavdaysleft = $navdiff->format("%a days");
																					
														$sql1 = "SELECT * FROM project WHERE id='$navnavprojid'";
														$result1 = $conn->query($sql1);

														if ($result1->num_rows == 1) {
															$row1 = $result1->fetch_assoc();
															$navnavprojname = $row1["name"];
															$navnavprojcomp = $row1["company"];
														}
														
														if ($navnavprojstatus1 == '0'){
															$projstatus1 = '<span class="label label-warning">'.getlang('new').'</span>';
														}elseif ($navnavprojstatus1 == '1'){
															$projstatus1 = '<span class="label label-info">'.getlang('pending').'</span>';
														}elseif ($navnavprojstatus1 == '2'){
															$projstatus1 = '<span class="label label-success">'.getlang('closed').'</span>';
														}elseif ($navnavprojstatus1 == '3'){
															$projstatus1 = '<span class="label label-danger">'.getlang('escalated').'</span>';
														}
														
												}
												
												$sql2 = "SELECT department, FName, LName, isAdm FROM user WHERE id='$entryhiscreator'";
												$result2 = $conn->query($sql2);

												if ($result2->num_rows == 1) {
													$row2 = $result2->fetch_assoc();
													$seldep = $row2["department"];
													$navselcomuser = $row2["FName"].' '.$row2["LName"];											
													$sql3 = "SELECT name FROM department WHERE id='$seldep'";
													$result3 = $conn->query($sql3);

													if ($result3->num_rows == 1) {
														$row3 = $result3->fetch_assoc();
														$navdepa = $row3["name"];
													}else{
														$navnavdepa = 'Unknown';
													}									
												}elseif($entryhiscreator == 0){
													$navselcomuser = 'SERVER';
												}
												echo '<tr>
														<td>'.$i.'</td>
														<td><a href="'.$_SITEURL.'projects_details?id='.$navnavprojid.'">'.$navnavprojcomp.' '.$navnavprojname.'</a></td>
														<td>'.$navselcomuser.' '.$entryhismsg.'</td>
														<td><a href="'.$_SITEURL.'projects_item?id='.$navnaventryid.'">'.$navnavprojdes.'</a></td>
														<td>'.$entryhisdate.'</td>
														<td>'.$projstatus1.'</td>
													</tr>';
												
											}
										}
								?>
							
								</tbody>
							</table>
						</div>	
					</div>																						
				</div>


<?php include('Include/footer.php'); ?>

<!-- Page scripts -->	
<script src="/../assets/js/pages/projects_list.js"></script>
<!-- /page scripts -->
<?php include('Include/foot.php'); ?>
<?php 
}else{
	header("Location: ".$_SITEURL."Login");
}
?>