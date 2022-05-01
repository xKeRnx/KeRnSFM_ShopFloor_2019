<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once('Include/_init.php');
	require_once 'assets/vendor/autoload.php';
	use YoHang88\LetterAvatar\LetterAvatar;

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

		$sqlxq = "SELECT * FROM project_entry WHERE id='$getid' ORDER BY status DESC";
		$result = $conn->query($sqlxq);

		if ($result->num_rows == 1) {	
			$row = $result->fetch_assoc();
			$entryid = $row["id"];
			$projid = $row["project"];
			$projdes = $row["info"];
			$projdescript = $row["descri"];
			$projstatus1 = $row["status"];
			$projdate = $row["date"];
			$projrespo = $row["owner"];
			$projcreator = $row["creator"];
			$projsolution = $row["solution"];
			$Projissolv = $row["solvedat"];
			$projprobtype = $row["type"];
									
			$maindnow = date('d-m-Y');
			$maindnow1 = new DateTime($maindnow);
			$maindnow = $maindnow1->format('d-m-Y H:i:s');
			$maindnow2 = $maindnow1->format('Y-m-d');
					
			if($Projissolv != NULL){
				$Projissolv = new DateTime($Projissolv);
				$Projissolv = $Projissolv->format('d-m-Y');
			}
			
			$projdate1 = new DateTime($projdate);
			$projdate = $projdate1->format('d-m-Y');
										
			$projlast = $row["lastanswer"];
			$projlast = new DateTime($projlast);
			$projlast = $projlast->format('d-m-Y H:i');
			
			$solunti1 = $row["solveuntil"];
			$solunti1 = new DateTime($solunti1);
			$solunti = $solunti1->format('d-m-Y');
			
			$pjit_diff=date_diff($maindnow1,$solunti1);
			$daysleftPI = $pjit_diff->format("%r%a days");
										
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
			
			
			if ($projstatus1 == '2'){
				$projstatus = '<span class="label label-warning">'.getlang('new').'</span>';
			}elseif ($projstatus1 == '1'){
				$projstatus = '<span class="label label-info">'.getlang('pending').'</span>';
			}elseif ($projstatus1 == '0'){
				$projstatus = '<span class="label label-success">'.getlang('closed').'</span>';
			}elseif ($projstatus1 == '3'){
				$projstatus = '<span class="label label-danger">'.getlang('escalated').'</span>';
			}
			
			
			$pjit_sql2 = "SELECT Department, FName, LName, isAdm FROM user WHERE id='$projrespo'";
			$pjit_result2 = $conn->query($pjit_sql2);

			if ($pjit_result2->num_rows == 1) {
				$pjit_row2 = $pjit_result2->fetch_assoc();
				$pjit_seldep = $pjit_row2["Department"];
													
				$pjit_sql3 = "SELECT name FROM department WHERE id='$pjit_seldep'";
				$pjit_result3 = $conn->query($pjit_sql3);

				if ($pjit_result3->num_rows == 1) {
					$pjit_row3 = $pjit_result3->fetch_assoc();
					$pjit_depa = $pjit_row3["name"];
				}else{
					$pjit_depa = 'Unknown';
				}									
			}
			
			$pjit_sql4 = "SELECT Department, FName, LName, isAdm FROM user WHERE id='$projcreator'";
			$pjit_result4 = $conn->query($pjit_sql4);

			if ($pjit_result4->num_rows == 1) {
				$pjit_row4 = $pjit_result4->fetch_assoc();
				$pjit_seldep1 = $pjit_row4["Department"];
													
				$pjit_sql5 = "SELECT name FROM department WHERE id='$pjit_seldep1'";
				$pjit_result5 = $conn->query($pjit_sql5);

				if ($pjit_result5->num_rows == 1) {
					$pjit_row5 = $pjit_result5->fetch_assoc();
					$pjit_depa1 = $pjit_row5["name"];
				}else{
					$pjit_depa1 = 'Unknown';
				}									
			}


?>
<?php include('Include/head.php');  ?>
<?php include('Include/navbar.php'); ?>

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title">
						<i class="icon-briefcase position-left"></i> <?php echo getlang('project_item'); ?>
					</div>
					<ul class="breadcrumb">
						<li><a href="<?php echo $_SITEURL; ?>"><?php echo getlang('home'); ?></a></li>						
						<li><a href="<?php echo $_SITEURL; ?>projects_details?id=<?php echo $projid; ?>"><?php echo getlang('project_details'); ?></a></li>	
						<li class="active"><?php echo getlang('project_item'); ?></li>
					</ul>					
				</div>
			</div>		
			<!--/Page Header-->
			
			<div class="container-fluid page-content">
			
				<div class="row">
					<div class="col-md-8">
						<div class="panel panel-default no-margin-bottom no-border-bottom">
							<div class="panel-heading">
								<h3 class="panel-title"><?php echo $projcomp.':'.$projname.' - '.$projdes;?></h3>						
							</div>
							<div class="panel-body">
								<?php
									$isAdmsql = "SELECT Department, FName, LName, isAdm FROM user WHERE id='$suid'";
									$isAdmresult = $conn->query($isAdmsql);

									$isAdm = 0;
									if ($isAdmresult->num_rows == 1) {
										$isAdmrow = $isAdmresult->fetch_assoc();
										if($isAdmrow["isAdm"] == 1){
											$isAdm = 1;
										}
									}
									
				
									if($projrespo == $suid AND $projstatus1 != 0 OR $projcreator == $suid AND $projstatus1 != 0 OR $isAdm == 1 AND $projstatus1 != 0){
										echo '<div class="row">';
											echo '<div class="col-md-12 text-right">';
												if($projcreator == $suid AND $projstatus1 != 0 AND $projsolution == "" OR $projrespo == $suid AND $projstatus1 != 0 AND $projsolution == "" OR $isAdm == 1 AND $projstatus1 != 0 AND $projsolution == ""){
												echo '<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_solut">'.getlang('solut').'</button>';
												echo '<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_solutime">'.getlang('edit_solution_time').'</button>';
												echo '<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_assign">'.getlang('assign').'</button>';	
												}
												if($projcreator == $suid AND $projstatus1 != 0 AND $projsolution != "" OR $isAdm == 1 AND $projstatus1 != 0 AND $projsolution != ""){
													echo '<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_fixed">'.getlang('problem_fixed').' </button>';
												}
											echo '</div>';
										echo '</div>';
										
										if($projcreator == $suid AND $projstatus1 != 0 AND $projsolution == "" OR $projrespo == $suid AND $projstatus1 != 0 AND $projsolution == "" OR $isAdm == 1 AND $projstatus1 != 0 AND $projsolution == ""){
											echo '<div id="modal_solut" class="modal fade">
												<div class="modal-dialog modal-xs">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">'.getlang('solut_title').'</h4>
														</div>

														<div class="modal-body">
															<p>'.getlang('solut_description').' </p>
														</div>
														<div class="modal-body">
															<div id="solumsg" class="form-group"></div>
															<textarea rows="3" id="soldesc" cols="5" style="overflow:auto;resize:none" class="form-control" placeholder="'.getlang('solut_msg').'"></textarea>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">'.getlang('close').'</button>
															<button onclick="addsolu();" type="button" class="btn btn-primary">'.getlang('save').'</button>
														</div>
													</div>
												</div>
											</div>';
											
											echo '<div id="modal_solutime" class="modal fade">
												<div class="modal-dialog modal-xs">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">'.getlang('edit_solution_time').'</h4>
														</div>

														<div class="modal-body">
															<p>'.getlang('solution_time_desc').' </p>
															<div id="solutimemsg" class="form-group"></div>
															<input id="solvetime" class="form-control" type="date" value="'.$maindnow2.'" style="line-height: 20px;">
														</div>
														
														<div class="modal-body">
															<textarea rows="3" id="solvedes" cols="5" style="overflow:auto;resize:none" class="form-control" placeholder="'.getlang('description').'"></textarea>
														</div>

														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">'.getlang('close').'</button>
															<button onclick="editsolutime();" type="button" class="btn btn-primary">'.getlang('save').'</button>
														</div>
													</div>
												</div>
											</div>';	
											
											echo '<div id="modal_assign" class="modal fade">
												<div class="modal-dialog modal-xs">
													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															<h4 class="modal-title">'.getlang('assign_title').'</h4>
														</div>

														<div class="modal-body">
															<p>'.getlang('assign_description').' </p>
														</div>
														
														<div class="modal-body">
															<div id="assignmsg" class="form-group"></div>
															<select name="select" id="assigne" class="form-control">
																<option value="0">'.getlang('responsible').'</option>';
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
															echo '</select>
														</div>

														<div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">'.getlang('close').'</button>
															<button onclick="newassign();" type="button" class="btn btn-primary">'.getlang('save').'</button>
														</div>
													</div>
												</div>
											</div>';
										}					
									
										echo '<div id="modal_fixed" class="modal fade">
											<div class="modal-dialog">
												<div class="modal-content bg-success">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">'.getlang('fixed_title').'</h4>
													</div>

													<div class="modal-body">
														<p>'.getlang('fixed_description').'</p>
														<div id="solve_msg" class="form-group"></div>
													</div>

													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">'.getlang('close').'</button>
														<button onclick="probsolved();" type="button" class="btn btn-primary">'.getlang('save').'</button>
													</div>
												</div>
											</div>
										</div>';
										?>
										<script>
											function newassign(){
												var assign_id = document.getElementById('assigne').value;
												var solu_project = <?php echo $getid; ?>;
												var solu_procid = <?php echo $projid; ?>;
												var assignmsg = document.getElementById("assignmsg");
												if (assign_id == "0"){
													assignmsg.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span>  <?php echo getlang('enter_description'); ?></div>	';
												}else{
													assignmsg.innerHTML = '';
													var assign_data = new FormData();
													assign_data.append('project', solu_project);
													assign_data.append('procid', solu_procid);
													assign_data.append('assignid', assign_id);
												
													var assign_xhr1 = new XMLHttpRequest();
													assign_xhr1.open('POST', '../ins/newassign.php', true);
													assign_xhr1.onload = function () {
														var assignresmsg = trim(this.responseText);
														if (assignresmsg == "error"){
															assignmsg.innerHTML = '<div class="alert alert-danger no-border"><span class="text-semibold">Unknown ERROR!</span>  <?php echo getlang('contact_admin'); ?></div>';
														}else{
															window.location = window.location.href ;
														}	
													};
													assign_xhr1.send(assign_data);
												}
												
											}
										
											function probsolved(){
												var solve_msg = document.getElementById("solve_msg");
												var solve_project = <?php echo $getid; ?>;
												var solve_procid = <?php echo $projid; ?>;
												
												var solve_data = new FormData();
												solve_data.append('project', solve_project);
												solve_data.append('procid', solve_procid);
												
												var solve_xhr1 = new XMLHttpRequest();
												solve_xhr1.open('POST', '../ins/probsolved.php', true);
												solve_xhr1.onload = function () {
													var solvemsg = trim(this.responseText);
													if (solvemsg == "error"){
														solve_msg.innerHTML = '<div class="alert alert-danger no-border"><span class="text-semibold">Unknown ERROR!</span>  <?php echo getlang('contact_admin'); ?></div>';
													}else if (solvemsg == "nosolu"){
														solve_msg.innerHTML = '<div class="alert alert-danger no-border"><span class="text-semibold">ERROR:</span>  <?php echo getlang('no_solu'); ?></div>';
													}else{
														window.location = window.location.href ;
													}	
												};
												solve_xhr1.send(solve_data);
											}
										
											function editsolutime(){
												var solu_time = document.getElementById('solvetime').value;
												var solu_time_desc = document.getElementById('solvedes').value;
												var solu_time_project = <?php echo $getid; ?>;
												var solu_time_procid = <?php echo $projid; ?>;
												var solu_time_msg = document.getElementById("solutimemsg");

												date = new Date();
												var d = date.getDate();
												var m = date.getMonth()+1;
												var Y = date.getFullYear();
												var datenow = Y+"-"+m+"-"+d;
												
												if (solu_time_desc == ""){
													solu_time_msg.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span>  <?php echo getlang('enter_description'); ?></div>	';
												}else if (solu_time == datenow){
													solu_time_msg.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span>  <?php echo getlang('time_now'); ?></div>	';
												}else{
													solu_time_msg.innerHTML = '';
													solu_time_desc = btoa(solu_time_desc);
													var solu_data = new FormData();
													solu_data.append('project', solu_time_project);
													solu_data.append('procid', solu_time_procid);
													solu_data.append('text', solu_time_desc);
													solu_data.append('time', solu_time);
												
													var solu_xhr1 = new XMLHttpRequest();
													solu_xhr1.open('POST', '../ins/editsolutime.php', true);
													solu_xhr1.onload = function () {
														var soluretimesmsg = trim(this.responseText);
														if (soluretimesmsg == "error"){
															solu_time_msg.innerHTML = '<div class="alert alert-danger no-border"><span class="text-semibold">Unknown ERROR!</span>  <?php echo getlang('contact_admin'); ?></div>';
														}else{
															window.location = window.location.href ;
														}	
													};
													solu_xhr1.send(solu_data);
												}
												
											}
										
											function addsolu(){
												var soludesc = document.getElementById('soldesc').value;
												var solu_project = <?php echo $getid; ?>;
												var solu_procid = <?php echo $projid; ?>;
												var solumsg = document.getElementById("solumsg");
												if (soludesc == ""){
													solumsg.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span>  <?php echo getlang('enter_description'); ?></div>	';
												}else{
													solumsg.innerHTML = '';
													var solu_data = new FormData();
													solu_data.append('project', solu_project);
													solu_data.append('procid', solu_procid);
													solu_data.append('text', soludesc);
												
													var solu_xhr1 = new XMLHttpRequest();
													solu_xhr1.open('POST', '../ins/addsolu.php', true);
													solu_xhr1.onload = function () {
														var soluresmsg = trim(this.responseText);
														if (soluresmsg == "error"){
															solumsg.innerHTML = '<div class="alert alert-danger no-border"><span class="text-semibold">Unknown ERROR!</span>  <?php echo getlang('contact_admin'); ?></div>';
														}else{
															window.location = window.location.href ;
														}	
													};
													solu_xhr1.send(solu_data);
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
										
										<?php	
									}
								?>							
								
								<div class="row m-t-20">
									<div class="col-md-12">
										<div class="alert alert-warning no-border">
											<h4><?php echo getlang('problem_description'); ?></h4>
											<p class="text-size-large"><?php echo $projdescript; ?></p>
										</div>
									</div>
								</div>
								
								<?php
								if ($projsolution != NULL){
									echo '<div class="row m-t-20">';
										echo '<div class="col-md-12">';
											echo '<div class="alert alert-success no-border">';
												echo '<h4>'.getlang('solut').'</h4>';
												echo '<p class="text-size-large">'.nl2br($projsolution).'</p>';
											echo '</div>';
										echo '</div>';
									echo '</div>';
								}
								?>
								
							</div>
						</div>
						<div class="panel panel-flat" style="margin-top: 20px;">
							<div class="panel-heading">
								<h4 class="panel-title"><?php echo getlang('comments'); ?></h4>						
							</div>
							<div class="panel-body">
							<?php
									$commsql = "SELECT * FROM project_comment WHERE project='$getid' ORDER BY date DESC";
									$commresult = $conn->query($commsql);

									if ($commresult->num_rows > 0) {
										$comi = 0;
										while($commrow = $commresult->fetch_assoc()) {
											$msg = base64_decode($commrow['msg']);
											$msg = trim($msg);
											
											$prodate = $commrow['date'];
											
											$currdat = date("Y-m-d H:i:s");
											$first_date = new DateTime($currdat);
											$second_date = new DateTime($prodate);

											$difference = $first_date->diff($second_date);
											$difference = format_interval($difference);
											
											$selcomuser = $commrow['user'];
											
											$selusesql = "SELECT Department, FName, LName, isAdm FROM user WHERE id='$selcomuser'";
											$seluseresult = $conn->query($selusesql);

											if ($seluseresult->num_rows == 1) {
												$seluserow = $seluseresult->fetch_assoc();
												$selusedep = $seluserow["Department"];
												
												$pjit_seldepsql = "SELECT name FROM department WHERE id='$selusedep'";
												$pjit_seldepresult = $conn->query($pjit_seldepsql);
												if ($pjit_seldepresult->num_rows == 1) {
													$pjit_seldeprow = $pjit_seldepresult->fetch_assoc();
													$pjit_seldepdepa = $pjit_seldeprow["name"];
												}else{
													$pjit_seldepdepa = 'Unknown';
												}
												$selcomuser = $seluserow["FName"].' '.$seluserow["LName"];
											}
											
											echo '<div class="media">';
												if($comi == 0){
													$comi++;
													echo '<div class="alert alert-info no-border">';
												}else{
													$comi = 0;
													echo '<div class="alert text-indigo-800 alpha-indigo no-border">';
												}
												
													echo '<div class="media-left">';
															$avatarImage = new LetterAvatar($selcomuser, 'circle', 64);
															echo '<img src="'.$avatarImage.'" class="img-circle" alt="">';
													echo '</div>';

													echo '<div class="media-body">';
															echo '<h6 class="media-heading">'.$selcomuser.' ('.$pjit_seldepdepa.')<span class="media-annotation pull-right">'.$difference.'</span></h6>';
															echo $msg;

													echo '</div>';
												echo '</div>';	
											echo '</div>';
											echo '<hr>';
										}
									}
							?>
							</div>
						</div>
						<?php
						if($projstatus1 != 0){
						?>
						<div class="panel panel-flat no-margin-top">
							<div class="panel-heading">
								<h4 class="panel-title"><?php echo getlang('new_comment'); ?></h4>						
							</div>
							<div class="panel-body">
									<div id="LogUnamMsage" class="form-group"></div>
									<div class="row">
										<div class="col-md-12 text-right">
											<button onclick="ajaxSave();" name="savecomm" class="btn btn-default"><?php echo getlang('save'); ?></button>										
										</div>
									</div>
									<div class="media">
										<textarea name="content" id="full-featured"></textarea>
									</div>
								
							</div>
						</div>
						
						<script>
							function ajaxSave() {
								var text = btoa(tinymce.get('full-featured').getContent());
								var project = <?php echo $getid; ?>;
								var procid = <?php echo $projid; ?>;
								var LogUnamMsage = document.getElementById("LogUnamMsage");
								if (text == ""){
									LogUnamMsage.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span>  <?php echo getlang('enter_comment_text'); ?></div>';
								}else{
									var data = new FormData();
									data.append('project', project);
									data.append('procid', procid);
									data.append('text', text);
								
									var xhr1 = new XMLHttpRequest();
									xhr1.open('POST', '../ins/comment.php', true);
									xhr1.onload = function () {
										var chunammasg = trim(this.responseText);
										if (chunammasg == "error"){
											LogUnamMsage.innerHTML = '<div class="alert alert-danger no-border"><span class="text-semibold">Unknown ERROR!</span>  <?php echo getlang('contact_admin'); ?></div>';
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
						<?php
						}
						?>
					</div>
					
					<div class="col-md-4">
						<div class="panel panel-flat">							
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<h5 class="no-margin"><?php echo getlang('status'); ?>:</h5>
									</div>
									
									<div class="col-md-6 text-right">
										<h5 class="no-margin"><?php echo $projstatus; ?></h5>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h5 class="no-margin m-t-5"><?php echo getlang('problem_recored'); ?>:</h5>
									</div>
									
									<div class="col-md-6 text-right">
										<h5 class="no-margin m-t-5"><?php echo $projdate; ?></h5>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<h5 class="no-margin m-t-5"><?php echo getlang('solve_until'); ?>:</h5>
									</div>
									
									<div class="col-md-6 text-right">
										<h5 class="no-margin m-t-5"><?php echo $solunti; ?></h5>
									</div>
								</div>
								<?php
								if($Projissolv != NULL){
								?>
								<div class="row">
									<div class="col-md-6">
										<h5 class="no-margin m-t-5"><?php echo getlang('solved_on'); ?>:</h5>
									</div>
									
									<div class="col-md-6 text-right">
										<h5 class="no-margin m-t-5"><?php echo $Projissolv; ?></h5>
									</div>
								</div>
								<?php
								}else{
								?>
								<div class="row">
									<div class="col-md-6">
										<h5 class="no-margin m-t-5"><?php echo getlang('days_left'); ?>:</h5>
									</div>
									
									<div class="col-md-6 text-right">
										<h5 class="no-margin m-t-5"><?php echo $daysleftPI; ?></h5>
									</div>
								</div>
								<?php
								}
								?>
								<hr>
								<div class="row">
									<div class="col-md-12">
										<h6 class="no-margin"><?php echo getlang('details'); ?></h6>
										<div class="row">
											<div class="col-md-6 col-xs-6">
												<h5><?php echo getlang('prob_type'); ?></h5>
												<h5><?php echo getlang('problem_recored'); ?></h5>
												<h5><?php echo getlang('assigned_to'); ?></h5>
												<h5><?php echo getlang('department'); ?></h5>
											</div>
											
											<div class="col-md-6 col-xs-6 text-right">
												<h5><?php echo $real_problem_type; ?></h5>
												<h5><?php echo $pjit_row4["FName"].' '.$pjit_row4["LName"]; ?></h5>
												<h5><?php echo $pjit_row2["FName"].' '.$pjit_row2["LName"]; ?></h5>
												<h5><?php echo $pjit_depa; ?></h5>
											</div>
										</div>
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
												<h5><?php echo $projcomp; ?></h5>
												<h5><?php echo $projname; ?></h5>
											</div>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										<h6 class="no-margin m-b-10"><?php echo getlang('history'); ?></h6>
										<?php
											$histsql = "SELECT * FROM entry_history WHERE entry='$getid' ORDER BY date DESC";
											$histresult = $conn->query($histsql);

											if ($histresult->num_rows > 0) {
												while($istrow = $histresult->fetch_assoc()) {
													$histuser = $istrow["creator"];
													$histmessage = base64_decode($istrow["message"]);
													$histdate = $istrow["date"];
													$histdate = new DateTime($histdate);
													$histdate = $histdate->format('d-m-Y H:i');
													
													$selhistusesql = "SELECT  FName, LName, isAdm FROM user WHERE id='$histuser'";
													$selhistuseresult = $conn->query($selhistusesql);

													if ($selhistuseresult->num_rows == 1) {
														$selhistuserow = $selhistuseresult->fetch_assoc();
														
														$histuser = $selhistuserow["FName"].' '.$selhistuserow["LName"];
													}elseif($histuser == 0){
														$histuser = 'SERVER';
													}
													echo '<div class="col-md-13">
															<div class="col-md-6 col-xs-6">
																<h5>'.$histuser.' '.$histmessage.'</h5>
															</div>
															
															<div class="col-md-6 col-xs-6 text-right">
																<h5>'.$histdate.'</h5>
															</div>
														</div>';
												}
											}
										?>
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
<script src="assets/editors/tinymce/tinymce.min.js"></script>
<script src="/../assets/js/pages/editor_tinymce.js"></script>
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