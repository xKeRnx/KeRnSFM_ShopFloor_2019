<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once(__DIR__ . '/../Include/_init.php'); 
if (isset($_SESSION['id']) AND $UserisAdm == true){
	$suid = mssql_escape_string($_SESSION['id']);

?>
<?php include(__DIR__ . '/../Include/head.php'); ?>
<?php include(__DIR__ . '/../Include/navbar.php'); ?>

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title"><i class="icon-display4"></i> <?php echo getlang('lang_set'); ?></div>	
					<ul class="breadcrumb">
					<?php
					if(isset($_GET["id"])){
						echo '<li><a href="'.$_SITEURL.'adm">'.getlang('home').'</a></li>';
						echo '<li><a href="'.$_SITEURL.'adm/lang">'.getlang('lang_set').'</a></li>';
						echo '<li class="active">'.getlang('change').'</li>';
					}else{
						echo '<li><a href="'.$_SITEURL.'adm">'.getlang('home').'</a></li>';
						echo '<li class="active">'.getlang('lang_set').'</li>';
					}
					?>					
					</ul>	
				</div>
			</div>			
			<!--/Page Header-->
			
			<div class="container-fluid page-content">
			<?php
			if(isset($_GET["id"])){
				$getid = mssql_escape_string($_GET["id"]);
			?>
			<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo getlang('lang_set'); ?></h5>						
							</div>
							<div class="m-t-20">
								<?php
								if(isset($_POST['save'])) {
									$stmt = $conn->prepare("UPDATE language SET lang_de = ?, lang_en = ?, lang_cn = ?, lang_in = ? WHERE id = ?");
									$stmt->bind_param("ssssi", $detext, $entext, $cntext, $intext, $id);
									$detext = $_POST['de'];
									$entext = $_POST['en'];
									$cntext = $_POST['cn'];
									$intext = $_POST['in'];
									$id = $_GET["id"];
									$stmt->execute();
									
									if($stmt){
										echo '<div class="col-md-12"><div class="alert alert-success no-border"<p class="text-size-large">'.getlang('saved').'</p></div></div>';
									}else{
										echo '<div class="col-md-12"><div class="alert alert-warning no-border"<p class="text-size-large">'.getlang('error').'</p></div></div>';
									}
									$stmt->close();
								}
								
								$Sel0stmt = $conn->prepare("SELECT * FROM language WHERE id = ?");
								$Sel0stmt->bind_param("i", $_GET["id"]);
								$Sel0stmt->execute();
								$Sel0result = $Sel0stmt->get_result();
								
								if ($Sel0result->num_rows > 0) {
									$Sel0row = $Sel0result->fetch_assoc();
									
									$Sel0entryid = $Sel0row["id"];
									$Sel0germ = $Sel0row["lang_de"];
									$Sel0eng = $Sel0row["lang_en"];
									$Sel0chin = $Sel0row["lang_cn"];
									$Sel0ind = $Sel0row["lang_in"];
									
								?>		
								<form method="post">
									<div class="form-group">
										<label class="control-label col-lg-1"><?php echo getlang('de'); ?></label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<input type="text" name="de" class="form-control" placeholder="<?php echo getlang('de'); ?>" value="<?php echo getutf8($Sel0germ); ?>" autocomplete="off">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-1"><?php echo getlang('en'); ?></label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<input type="text" name="en" class="form-control" placeholder="<?php echo getlang('en'); ?>" value="<?php echo getutf8($Sel0eng); ?>" autocomplete="off">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-lg-1"><?php echo getlang('cn'); ?></label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<input type="text" name="cn" class="form-control" placeholder="<?php echo getlang('cn'); ?>" value="<?php echo getutf8($Sel0chin); ?>" autocomplete="off">
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-lg-1"><?php echo getlang('in'); ?></label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<input type="text" name="in" class="form-control" placeholder="<?php echo getlang('in'); ?>" value="<?php echo getutf8($Sel0ind); ?>" autocomplete="off">
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
			<!-- Langsettings Start-->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo getlang('lang_set'); ?></h5>						
							</div>
							<div class="m-t-20">
							<table class="table table-hover invoice-list" id="datatable">
								<thead>
									<tr>
										<th>#</th>
										<th><?php echo getlang('de'); ?></th>	
										<th><?php echo getlang('en'); ?></th>		
										<th><?php echo getlang('cn'); ?></th>	
										<th><?php echo getlang('in'); ?></th>																		
										<th class="text-center"><?php echo getlang('edit'); ?></th>
									</tr>
								</thead>
								<tbody>
								<?php
								$sql = "SELECT * FROM language ORDER BY name DESC";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									$i=0;
									while($row = $result->fetch_assoc()) {
										$i++;
										$entryid = $row["id"];
										$germ = $row["lang_de"];
										$eng = $row["lang_en"];
										$chin = $row["lang_cn"];
										$ind = $row["lang_in"];

										echo '<tr>';
											echo '<td>'.$i.'</td>';
											echo '<td>'.getutf8($germ).'</td>';
											echo '<td>'.getutf8($eng).'</td>';
											echo '<td>'.getutf8($chin).'</td>';
											echo '<td>'.getutf8($ind).'</td>';
											echo '<td class="text-center">
												<ul class="icons-list">
													<li><a href="'.$_SITEURL.'adm/lang?id='.$entryid.'" ><i class="icon-eye2"></i></a></li>
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
					</div>																						
				</div>
			<!-- Langsettings End-->	
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