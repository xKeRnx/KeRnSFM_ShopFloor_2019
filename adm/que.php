<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once(__DIR__ . '/../Include/_init.php'); 
if (isset($_SESSION['id']) AND $UserisAdm == true){
	$suid = mssql_escape_string($_SESSION['id']);

?>
<?php include(__DIR__ . '/../Include/head.php'); ?>
<?php include(__DIR__ . '/../Include/navbar.php'); ?>

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title"><i class="icon-display4"></i> <?php echo getlang('que'); ?></div>	
					<ul class="breadcrumb">
					<?php
					if(isset($_GET["id"])){
						echo '<li><a href="'.$_SITEURL.'adm">'.getlang('home').'</a></li>';
						echo '<li><a href="'.$_SITEURL.'adm/que">'.getlang('que').'</a></li>';
						echo '<li class="active">'.getlang('change').'</li>';
					}else{
						echo '<li><a href="'.$_SITEURL.'adm">'.getlang('home').'</a></li>';
						echo '<li class="active">'.getlang('que').'</li>';
					}
					?>					
					</ul>	
				</div>
			</div>			
			<!--/Page Header-->
			
			<div class="container-fluid page-content">
			<?php
			if(isset($_GET["id"])){
			?>
			<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo getlang('que'); ?></h5>						
							</div>
							<div class="m-t-20">
								<?php
								if(isset($_POST['save'])) {
									$stmt = $conn->prepare("UPDATE types SET names = ?, enabled = ? WHERE id = ?");
									$stmt->bind_param("sii", $name, $isEna, $id);
									$name = $_POST['name'];
									$isEna = $_POST['isEna'];
									$id = $_GET["id"];
									$stmt->execute();
									
									if($stmt){
										echo '<div class="col-md-12"><div class="alert alert-success no-border"<p class="text-size-large">'.getlang('saved').'</p></div></div>';
									}else{
										echo '<div class="col-md-12"><div class="alert alert-warning no-border"<p class="text-size-large">'.getlang('error').'</p></div></div>';
									}
									$stmt->close();
								}
								
								$Sel0stmt = $conn->prepare("SELECT * FROM types WHERE id = ?");
								$Sel0stmt->bind_param("i", $_GET["id"]);
								$Sel0stmt->execute();
								$Sel0result = $Sel0stmt->get_result();
								
								if ($Sel0result->num_rows > 0) {
									$Sel0row = $Sel0result->fetch_assoc();
									
									$Sel0entryid = $Sel0row["id"];
									$name = $Sel0row["names"];
									$enabled = $Sel0row["enabled"];
									
								?>		
								<form method="post">
									<div class="form-group">
										<label class="control-label col-lg-1"><?php echo getlang('name'); ?></label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<input type="text" name="name" class="form-control" placeholder="<?php echo getlang('name'); ?>" value="<?php echo getutf8($name); ?>" autocomplete="off">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-lg-1"><?php echo getlang('activated'); ?></label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<select name="isEna" id="isEna" class="form-control">
												<option value="0" <?php if($enabled == 0){echo 'selected';}?>><?php echo getlang('no'); ?></option>
												<option value="1" <?php if($enabled == 1){echo 'selected';}?>><?php echo getlang('yes'); ?></option>									
											</select>
										</div>
									</div>

									<div class="form-group">
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<button type="submit" name="save" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_default"><?php echo getlang('save'); ?></button>								
										</div>
									</div>
								</form>
								<?php	
								}else{
									echo getlang('error');
								}
								$Sel0stmt->close();
								?>								
							</div>
						</div>
					</div>																						
				</div>
			<?php	
			}else{
			?>
				<div id="modal_default" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title"><?php echo getlang('newque'); ?></h4>
							</div>
							<div class="modal-body">	
								<div id="LogUnamMsage" class="form-group"></div>
								<div class="form-group">
									<label class="control-label col-lg-4"><?php echo getlang('name'); ?></label>
									<div class="col-lg-8" style="padding-bottom: 10px;">
										<input type="text" id="newquename" class="form-control" placeholder="<?php echo getlang('name'); ?>" autocomplete="off">
									</div>
								</div>	
	
								<br>
								<script>
									function ajaxSave() {
										var newquename = document.getElementById('newquename').value;
										var LogUnamMsage = document.getElementById("LogUnamMsage");
										if (newquename == ""){
											LogUnamMsage.innerHTML = '<div class="alert alert-warning no-border"><span class="text-semibold">Warning!</span>  <?php echo getlang('enter_name'); ?></div>	';
										}else{
											var data = new FormData();
											data.append('newquename', newquename);
										
											var xhr1 = new XMLHttpRequest();
											xhr1.open('POST', '../adm/ins/newque.php', true);
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
			
			<!-- QUE Start-->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo getlang('que'); ?></h5>						
							</div>
							
							<div class="m-t-20">
								<div class="col-md-12 text-right">
									<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_default"><?php echo getlang('add'); ?></button>								
								</div>
							</div>
							
							<div class="m-t-20">
							<table class="table table-hover invoice-list" id="datatable">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-center"><?php echo getlang('entry'); ?></th>	
										<th class="text-center"><?php echo getlang('name'); ?></th>	
										<th class="text-center"><?php echo getlang('activated'); ?></th>											
										<th class="text-center"><?php echo getlang('edit'); ?></th>
									</tr>
								</thead>
								<tbody>
								<?php
								$sql = "SELECT * FROM types ORDER BY names ASC";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									$i=0;
									while($row = $result->fetch_assoc()) {
										$i++;
										$entryid = $row["id"];
										$name = $row["names"];
										$enabled = $row["enabled"];
										
										if($enabled == 1){
											$showstat = getlang('yes');
										}else{
											$showstat = getlang('no');
										}
										
										$sql1 = "SELECT * FROM project WHERE type='$entryid'";
										$result1 = $conn->query($sql1);
										$rowcount1 = mysqli_num_rows($result1);
										
										echo '<tr>';
											echo '<td class="text-center">'.$i.'</td>';
											echo '<td class="text-center">'.$rowcount1.'</td>';
											echo '<td class="text-center">'.getutf8($name).'</td>';
											echo '<td class="text-center">'.$showstat.'</td>';
											echo '<td class="text-center">
												<ul class="icons-list">
													<li><a href="'.$_SITEURL.'adm/que?id='.$entryid.'" ><i class="icon-eye2"></i></a></li>
												</ul>
											</td>
										</tr>';
									}
								} else {
									echo "<tr> No Ques found!</tr>";
								}
								?>
							
								</tbody>
							</table>
							</div>
						</div>
					</div>																						
				</div>
			<!-- QUE End-->	
			<?php } ?>
			</div>

<?php include(__DIR__ . '/../Include/footer.php'); ?>

<!-- Page scripts -->	

<!-- /page scripts -->
<?php include(__DIR__ . '/../Include/foot.php'); ?>
<?php 
}else{
	header("Location: ".$_SITEURL."Login");
}
?>