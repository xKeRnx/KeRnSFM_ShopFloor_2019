<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once(__DIR__ . '/../Include/_init.php'); 
if (isset($_SESSION['id']) AND $UserisAdm == true){
	$suid = mssql_escape_string($_SESSION['id']);

?>
<?php include(__DIR__ . '/../Include/head.php'); ?>
<?php include(__DIR__ . '/../Include/navbar.php'); ?>

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title"><i class="icon-display4"></i> <?php echo getlang('user'); ?></div>	
					<ul class="breadcrumb">
					<?php
					if(isset($_GET["id"])){
						echo '<li><a href="'.$_SITEURL.'adm">'.getlang('home').'</a></li>';
						echo '<li><a href="'.$_SITEURL.'adm/user">'.getlang('user').'</a></li>';
						echo '<li class="active">'.getlang('change').'</li>';
					}else{
						echo '<li><a href="'.$_SITEURL.'adm">'.getlang('home').'</a></li>';
						echo '<li class="active">'.getlang('user').'</li>';
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
								<h5 class="panel-title"><?php echo getlang('user'); ?></h5>						
							</div>
							<div class="m-t-20">
								<?php
								if(isset($_POST['save'])) {
									$stmt = $conn->prepare("UPDATE user SET USER = ?, FName = ?, LName = ?, Department = ?, isAdm = ? WHERE id = ?");
									$stmt->bind_param("sssiii", $email, $fname, $lname, $depar, $isad, $id);
									$email = $_POST['email'];
									$fname = $_POST['firstname'];
									$lname = $_POST['lastname'];
									$depar = $_POST['deparment'];
									$isad = $_POST['isAdm'];
									$id = $_GET["id"];
									$stmt->execute();
									
									if($stmt){
										echo '<div class="col-md-12"><div class="alert alert-success no-border"<p class="text-size-large">'.getlang('saved').'</p></div></div>';
									}else{
										echo '<div class="col-md-12"><div class="alert alert-warning no-border"<p class="text-size-large">'.getlang('error').'</p></div></div>';
									}
									$stmt->close();
								}
								
								$Sel0stmt = $conn->prepare("SELECT * FROM user WHERE id = ?");
								$Sel0stmt->bind_param("i", $_GET["id"]);
								$Sel0stmt->execute();
								$Sel0result = $Sel0stmt->get_result();
								
								if ($Sel0result->num_rows > 0) {
									$Sel0row = $Sel0result->fetch_assoc();
									
									$Sel0entryid = $Sel0row["id"];
									$email = $Sel0row["USER"];
									$FNAMe = $Sel0row["FName"];
									$LNAME = $Sel0row["LName"];
									$Depa = $Sel0row["Department"];
									$IsAdm = $Sel0row["isAdm"];

									$Sel1stmt = $conn->prepare("SELECT * FROM department WHERE id = ?");
									$Sel1stmt->bind_param("i", $Depa);
									$Sel1stmt->execute();
									$Sel1result = $Sel1stmt->get_result();
										
									if ($Sel1result->num_rows > 0) {
										$Sel1row = $Sel1result->fetch_assoc();
											
										$DepID = $Sel1row["id"];
										$DepNAME = $Sel1row["name"];
									}else{
										$DepNAME = 'error';
									}
									
								?>		
								<form method="post">
									<div class="form-group">
										<label class="control-label col-lg-1"><?php echo getlang('firstname'); ?></label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<input type="text" name="firstname" class="form-control" placeholder="<?php echo getlang('firstname'); ?>" value="<?php echo getutf8($FNAMe); ?>" autocomplete="off">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-1"><?php echo getlang('lastname'); ?></label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<input type="text" name="lastname" class="form-control" placeholder="<?php echo getlang('lastname'); ?>" value="<?php echo getutf8($LNAME); ?>" autocomplete="off">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-lg-1"><?php echo getlang('email'); ?></label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<input type="text" name="email" class="form-control" placeholder="<?php echo getlang('email'); ?>" value="<?php echo getutf8($email); ?>" autocomplete="off">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-lg-1"><?php echo getlang('department'); ?></label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<select name="deparment" id="deparment" class="form-control">
											<?php
												$depasql = "SELECT * FROM department ORDER BY name DESC";
												$deparesult = $conn->query($depasql);

												if ($deparesult->num_rows > 0) {
													// output data of each row
													$i=0;
													echo '<option value="0">Deparment</option>';
													while($deparow = $deparesult->fetch_assoc()) {
														$depaid = $deparow['id'];
														$depaname = $deparow['name'];
														if($depaid == $Depa){$sel = 'selected';}else{$sel='';}
														echo '<option value="'.$depaid.'" '.$sel.'>'.$depaname.'</option>';
													}
												}
											?>									
											</select>
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-lg-1">Administrator</label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<select name="isAdm" id="isAdm" class="form-control">
												<option value="0" <?php if($IsAdm == 0){echo 'selected';}?>><?php echo getlang('no'); ?></option>
												<option value="1" <?php if($IsAdm == 1){echo 'selected';}?>><?php echo getlang('yes'); ?></option>									
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
								$Sel1stmt->close();
								?>								
							</div>
						</div>
					</div>																						
				</div>
			<?php	
			}else{
			?>
			<!-- USER Start-->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo getlang('user'); ?></h5>						
							</div>
							<div class="m-t-20">
							<table class="table table-hover invoice-list" id="datatable">
								<thead>
									<tr>
										<th>#</th>
										<th><?php echo getlang('firstname'); ?></th>	
										<th><?php echo getlang('lastname'); ?></th>		
										<th><?php echo getlang('email'); ?></th>	
										<th><?php echo getlang('department'); ?></th>
										<th>Admin</th>			
										<th class="text-center"><?php echo getlang('edit'); ?></th>
									</tr>
								</thead>
								<tbody>
								<?php
								$sql = "SELECT * FROM user ORDER BY LName DESC";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									$i=0;
									while($row = $result->fetch_assoc()) {
										$i++;
										$entryid = $row["id"];
										$email = $row["USER"];
										$FNAMe = $row["FName"];
										$LNAME = $row["LName"];
										$Depa = $row["Department"];
										$isAdm = $row["isAdm"];
										
										if($isAdm == 1){
											$showAdm = getlang('yes');
										}else{
											$showAdm = getlang('no');
										}

										$Sel0stmt = $conn->prepare("SELECT * FROM department WHERE id = ?");
										$Sel0stmt->bind_param("i", $Depa);
										$Sel0stmt->execute();
										$Sel0result = $Sel0stmt->get_result();
										
										if ($Sel0result->num_rows > 0) {
											$Sel0row = $Sel0result->fetch_assoc();
											
											$DepID = $Sel0row["id"];
											$DepNAME = $Sel0row["name"];
										}else{
											$DepNAME = 'error';
										}
										
										echo '<tr>';
											echo '<td>'.$i.'</td>';
											echo '<td>'.getutf8($FNAMe).'</td>';
											echo '<td>'.getutf8($LNAME).'</td>';
											echo '<td>'.getutf8($email).'</td>';
											echo '<td>'.getutf8($DepNAME).'</td>';
											echo '<td>'.getutf8($showAdm).'</td>';
											echo '<td class="text-center">
												<ul class="icons-list">
													<li><a href="'.$_SITEURL.'adm/user?id='.$entryid.'" ><i class="icon-eye2"></i></a></li>
												</ul>
											</td>
										</tr>';
									}
									$Sel0stmt->close();
								} else {
									echo "<tr> No open Projects found!</tr>";
								}
								?>
							
								</tbody>
							</table>
							</div>
						</div>
					</div>																						
				</div>
			<!-- USER End-->	
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