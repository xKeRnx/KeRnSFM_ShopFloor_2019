<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once('Include/_init.php');

if (isset($_SESSION['id'])){
	$suid = trim($_SESSION['id']);
	$suid = strip_tags($suid);
	$suid = htmlspecialchars($suid);
	$suid = mssql_escape_string($suid);	
	
	if(isset($_GET["id"])){
		$getid = trim($_GET["id"]);
		$getid = strip_tags($getid);
		$getid = htmlspecialchars($getid);
		$getid = mssql_escape_string($getid);
		
		$sql0 = "SELECT * FROM project WHERE id='$getid'";
		$result0 = $conn->query($sql0);

		if ($result0->num_rows > 0) {
			$row0 = $result0->fetch_assoc();
			$mainid = $row0["id"];
			$mainname = $row0["name"];
			$maincomp = $row0["company"];
			$mainstatus = $row0["status"];
			$mainrespo = $row0["priority"];
										
			$mainstart = $row0["start"];
			$mainend = $row0["deadline"];
										
			$mainstart1 = new DateTime($mainstart);
			$mainstart = $mainstart1->format('d-m-Y');
										
			$mainend1 = new DateTime($mainend);
			$mainend = $mainend1->format('d-m-Y');
			
			$maindnow = date('Y-m-d h:i:s');
			$maindnow1 = new DateTime($maindnow);
			$maindnow = $maindnow1->format('d-m-Y');
					
			$stoediff=date_diff($mainstart1,$mainend1);
			$stoediff = $stoediff->format("%a");
					
			$dmainiff=date_diff($maindnow1,$mainend1);
			$mainproddaytodead = $dmainiff->format("%a");
			
			$pjit_diff=date_diff($maindnow1,$mainend1);
			$mainproddaytodead1 = $pjit_diff->format("%r%a days");
			
			$calprogrb = $mainproddaytodead * 100 / $stoediff;
			$calprogrb = 100 - $calprogrb;
			
?>
<?php include('Include/head.php'); ?>
<?php include('Include/navbar.php'); ?>

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title">
						<i class="icon-briefcase position-left"></i> <?php echo getlang('project_details'); ?>
					</div>
					<ul class="breadcrumb">
						<li><a href="<?php echo $_SITEURL; ?>"><?php echo getlang('home'); ?></a></li>						
						<li class="active"><?php echo getlang('project_details'); ?></li>
					</ul>					
				</div>
			</div>		
			<!--/Page Header-->
			
			<div class="container-fluid page-content">
			
				<div id="modal_default" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><?php echo getlang('new_problem'); ?></h4>
							</div>
							<div class="modal-body">	
								<div id="LogUnamMsage" class="form-group"></div>
								<div class="form-group">
									<label class="control-label col-lg-4"><?php echo getlang('problem_title'); ?></label>
									<div class="col-lg-8" style="padding-bottom: 10px;">
										<input type="text" id="Probtitl" class="form-control" placeholder="<?php echo getlang('problem_title'); ?>" autocomplete="off">
									</div>
								</div>	
								
								<div class="form-group pb-10">
									<label class="control-label col-lg-4"><?php echo getlang('problem_description'); ?></label>
									<div class="col-lg-8" style="padding-bottom: 10px;">
										<textarea rows="3" id="probdesc" cols="5" style="overflow:auto;resize:none" class="form-control" placeholder="<?php echo getlang('problem_description'); ?>"></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-lg-4"><?php echo getlang('prob_type'); ?></label>
									<div class="col-lg-8" style="padding-bottom: 10px;">
										<select name="select" id="probtype" class="form-control">
											<option value="0"><?php echo getlang('prob_type'); ?></option>
											<?php
												$aselsql001 = "SELECT * FROM problem_type Where enabled = 1";
												$aselres001 = $conn->query($aselsql001);

												if ($aselres001->num_rows > 0) {
													while($aselrow001 = $aselres001->fetch_assoc()) {
														$probtypeid = $aselrow001["id"];
														$probtypename = $aselrow001["name"];
														
														echo '<option value="'.$probtypeid.'">'.$probtypename.'</option>';
													}
												}
											?>
										</select>
									</div>
								</div>		
								
								<div class="form-group">
									<label class="control-label col-lg-4"><?php echo getlang('responsible'); ?></label>
									<div class="col-lg-8" style="padding-bottom: 10px;">
										<select name="select" id="assigne" class="form-control">
											<option value="0"><?php echo getlang('responsible'); ?></option>
											<?php
												$aselsql0 = "SELECT id, Department, FName, LName FROM user";
												$aselres0 = $conn->query($aselsql0);

												if ($aselres0->num_rows > 0) {
													while($aselrow0 = $aselres0->fetch_assoc()) {
														$aseldep = $aselrow0["Department"];
														$aselid = $aselrow0["id"];
														
														$aselsql1 = "SELECT name FROM department WHERE id='$aseldep'";
														$aselres1 = $conn->query($aselsql1);

														if ($aselres1->num_rows == 1) {
															$aselrow1 = $aselres1->fetch_assoc();
															$aseldepa = $aselrow1["name"];
														}else{
															$aseldepa = 'Unknown';
														}
														
														echo '<option value="'.$aselid.'">'.$aselrow0["FName"].' '.$aselrow0["LName"].' ('.$aseldepa.')</option>';
													}
												}
											?>
										</select>
									</div>
								</div>		
								<br>
								<script>
									function ajaxSave() {
										var text = document.getElementById('probdesc').value;
										var title = document.getElementById('Probtitl').value;
										var asign = document.getElementById('assigne').value;
										var probtyp = document.getElementById('probtype').value;
										var project = <?php echo $getid; ?>;
										var LogUnamMsage = document.getElementById("LogUnamMsage");
										if (text == ""){
											LogUnamMsage.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span>  <?php echo getlang('enter_description'); ?></div>	';
										}else if (title == ""){
											LogUnamMsage.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span> <?php echo getlang('enter_title'); ?></div>	';
										}else if (asign == "0"){
											LogUnamMsage.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span> <?php echo getlang('enter_assigned_to'); ?></div>	';
										}else if (probtyp == "0"){
											LogUnamMsage.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span> <?php echo getlang('sel_prob_type'); ?></div>	';
										}else{
											var data = new FormData();
											data.append('project', project);
											data.append('text', text);
											data.append('title', title);
											data.append('asign', asign);
											data.append('probtyp', probtyp);
										
											var xhr1 = new XMLHttpRequest();
											xhr1.open('POST', '../ins/newprob.php', true);
											xhr1.onload = function () {
												var chunammasg = trim(this.responseText);
												if (chunammasg == "error"){
													LogUnamMsage.innerHTML = '<div class="alert alert-danger no-border"><span class="text-semibold">Unknown ERROR!</span> <?php echo getlang('contact_admin'); ?></div>';
												}else{
													window.location = window.location.href ;
												}	
											};
											xhr1.send(data);
										}
									}

									// function to trim strings
									function trim(sVal)
									{
										var sTrimmed = "";

										for (i = 0; i < sVal.length; i++)
										{
											if (sVal.charAt(i) != " " && sVal.charAt(i) != "\f" && sVal.charAt(i) != "\n" && sVal.charAt(i) != "\r" && sVal.charAt(i) != "\t")
											{
												sTrimmed = sTrimmed + sVal.charAt(i);
											}
										}

										return sTrimmed;
									}
								</script>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo getlang('close'); ?></button>
								<button type="button" onclick="ajaxSave();" class="btn btn-primary"><?php echo getlang('submit'); ?></button>
							</div>
						</div>
					</div>
				</div>
				
				
			
				<div class="row">
					<div class="col-md-8">
						<div class="panel panel-default no-margin-bottom no-border-bottom">
							<div class="panel-heading">
								<h3 class="panel-title"><?php echo $maincomp.' - '.$mainname; ?></h3>						
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-12 text-right">
										<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_default"><?php echo getlang('new_problem'); ?></button>								
									</div>
								</div>	
							
							<div class="row m-t-20">
							<table class="table table-hover invoice-list" id="datatable">
								<thead>
									<tr>
										<th>#</th>		
										<th><?php echo getlang('prob_type'); ?></th>		
										<th><?php echo getlang('description'); ?></th>																		
										<th><?php echo getlang('opened_on'); ?></th>
										<th><?php echo getlang('status'); ?></th>
										<th><?php echo getlang('last_answered'); ?></th>
										<th><?php echo getlang('responsible'); ?></th>
										<th><?php echo getlang('department'); ?></th>
										<th class="text-center"><?php echo getlang('actions'); ?></th>
									</tr>
								</thead>
								<tbody>
								<?php
									$sql = "SELECT * FROM project_entry WHERE project='$mainid' ORDER BY status DESC";
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
													<li><a href="'.$_SITEURL.'projects_item?id='.$entryid.'"><i class="icon-eye2"></i></a></li>
												</ul>
											</td>
										</tr>';
									}
									} else {
										echo '<div class="panel-heading">
											<h5 class="panel-title">'.getlang('no_projects').'</h5>						
										</div>';
									}
								?>
							
								</tbody>
							</table>						
							</div>
							</div>
						</div>

						<div class="panel panel-default no-margin-bottom no-border-bottom" style="margin-top: 20px;">
							<div class="panel-heading">
								<h3 class="panel-title"><?php echo getlang('missingparts'); ?></h3>						
							</div>
							<div class="panel-body">
							<div class="text-right">
								<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_csv"><?php echo getlang('update_missing_parts'); ?></button>
							</div>
							
						<div id="modal_csv" class="modal fade">
							<div class="modal-dialog modal-sm">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title"><?php echo getlang('missingparts'); ?></h4>
									</div>

									<div class="modal-body">
									<p><?php echo getlang('update_missing_parts')?></p>
									<div id="csvresponse"></div>
									<div class="uploader bg-primary focus">
										<input type="file" id="uploadCSV" onchange="csvinpchange()" accept=".csv" class="file-styled-primary-icon" placeholder="">
											<span id="csvspan" class="filename" style="user-select: none;"><?php echo getlang('select_new_csv'); ?></span>
											<span class="action" style="user-select: none;"><i class="icon-plus3"></i></span>
									</div>
									</div>

									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<button onclick="updatecsv();" type="button" class="btn btn-primary"><?php echo getlang('upload'); ?></button>
									</div>
								</div>
							</div>
						</div>
						
						<script>
						function csvinpchange() {
							var projectname = <?php echo $mainname; ?>;
							var csvspan = document.getElementById("csvspan");
							csvspan.innerHTML = projectname+'.csv';
						}
						
						function updatecsv() {
							var project = <?php echo $getid; ?>;
							var projectname = <?php echo $mainname; ?>;
							var csvresponsetext = document.getElementById("csvresponse");
							
							if( document.getElementById("uploadCSV").files.length == 0 ){
								csvresponsetext.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span>  <?php echo getlang('no_file_selected'); ?></div>';
							}else{
								const name = document.getElementById('uploadCSV').value;
								const lastDot = name.lastIndexOf('.');

								const fileName = name.substring(0, lastDot);
								const ext = name.substring(lastDot + 1);
								
								if(ext == 'csv'){
									csvresponsetext.innerHTML = '';
									var data = new FormData();
								    data.append('file', document.getElementById('uploadCSV').files[0]);
									data.append('project', project);
								    $.ajax({
									   url: 'ins/uploadcsv.php',
									   data: data,
									   type: 'POST',
									   processData: false,
									   contentType: false,
									   success: function() { 
									   window.location = window.location.href;
									   }
								    });
								}else{
									csvresponsetext.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span>  <?php echo getlang('noly_csv_file'); ?></div>';
								}
							}
						}
						</script>
							
							<div id="responses"></div>
								<div class="row m-t-20">
								<?php
								$row = 1;
								if (@($handle = fopen("csv/".$getid.".csv", "r")) !== FALSE) {
								   
									echo '<table class="table table-hover invoice-list" id="datatable">';
								   
									while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
										$num = count($data);
										if ($row == 1) {
											echo '<thead><tr>';
										}else{
											echo '<tr>';
										}
									   
										for ($c=0; $c < $num; $c++) {
											//echo $data[$c] . "<br />\n";
											if(empty($data[$c])) {
											   $value = "&nbsp;";
											}else{
											   $value = $data[$c];
											}
											if ($row == 1) {
												echo '<th>'.$value.'</th>';
											}else{
												echo '<td>'.$value.'</td>';
											}
										}
									   
										if ($row == 1) {
											echo '</tr></thead><tbody>';
										}else{
											echo '</tr>';
										}
										$row++;
									}
								   
									echo '</tbody></table>';
									fclose($handle);
								}else{
									echo '<div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered"> '.getlang('no_missing_parts').'</div>';
								}
								?>
								</div>
							</div>
						</div>

					</div>
					

					
					<div class="col-md-4">
						<div class="panel panel-flat">							
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<h5 class="no-margin"><?php echo getlang('started_on'); ?></h5>
									</div>
									
									<div class="col-md-6 text-right">
										<h5 class="no-margin"><?php echo $mainstart; ?></h5>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h5 class="no-margin m-t-5"><?php echo getlang('deadline_on'); ?></h5>
									</div>
									
									<div class="col-md-6 text-right">
										<h5 class="no-margin m-t-5"><?php echo $mainend; ?></h5>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h5 class="no-margin m-t-5"><?php echo getlang('days_to_deadline'); ?></h5>
									</div>
									
									<div class="col-md-6 text-right">
										<h5 class="no-margin m-t-5"><?php echo $mainproddaytodead1; ?></h5>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12 m-t-5">
										<h6 class="no-margin m-b-10"><?php echo getlang('status'); ?></h6>
										<div class="progress m-t-5 m-b-10">
											<div class="progress-bar progress-bar-success progress-bar-striped active" style="width: <?php echo $calprogrb; ?>%">
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										<h6 class="no-margin m-b-10"><?php echo getlang('responsible'); ?></h6>
										<?php
										$project_rspo_sql = "SELECT userid FROM project_responsible WHERE projectid='$getid'";
										$project_rspo_res = $conn->query($project_rspo_sql);

										if ($project_rspo_res->num_rows > 0) {
											while($project_rspo_row = $project_rspo_res->fetch_assoc()) {
												$project_rspo_userid = $project_rspo_row['userid'];
												$respo_user_sql = "SELECT id, FName, LName FROM user where id='$project_rspo_userid'";
												$respo_user_res = $conn->query($respo_user_sql);

												if ($respo_user_res->num_rows == '1') {
													$respo_user_row = $respo_user_res->fetch_assoc();
													$respo_user_userid = $respo_user_row["id"];
													
													$depar_user_sql = "SELECT name FROM department WHERE id='$respo_user_userid'";
													$depar_user_res = $conn->query($depar_user_sql);

													if ($depar_user_res->num_rows == 1) {
														$depar_user_row = $depar_user_res->fetch_assoc();
														$depar_user_name = $depar_user_row["name"];
													}else{
														$depar_user_name = 'Unknown';
													}
													echo '<button type="button" class="btn btn-default btn-sm" data-popup="tooltip-custom" title="" data-original-title="'.$depar_user_name.'">'.$respo_user_row["FName"].' '.$respo_user_row["LName"].'</button> ';
												}
											}
										}else{
											echo getlang('none');
										}
										?>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										<h6 class="no-margin"><?php echo getlang('project_details'); ?></h6>
										<div class="row">
											<div class="col-md-6 col-xs-6">
												<h5><?php echo getlang('company'); ?></h5>
												<h5><?php echo getlang('comm_nr'); ?></h5>
											</div>
											
											<div class="col-md-6 col-xs-6 text-right">
												<h5><?php echo $maincomp; ?></h5>
												<h5><?php echo $mainname; ?></h5>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

<?php include('Include/footer.php'); ?>

<!-- Page scripts -->	
<script src="/../assets/js/forms/fileinput.js"></script>
<script src="/../assets/js/pages/projects_details.js"></script>
<!-- /page scripts -->
<?php include('Include/foot.php'); ?>
<?php 
}else{
	header("Location: ".$_SITEURL."");
}
}else{
	header("Location: ".$_SITEURL."");
}
}else{
	header("Location: ".$_SITEURL."Login");
}
?>