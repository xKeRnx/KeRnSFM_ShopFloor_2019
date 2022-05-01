<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once(__DIR__ . '/../Include/_init.php'); 
if (isset($_SESSION['id']) AND $UserisAdm == true){
	$suid = mssql_escape_string($_SESSION['id']);

?>
<?php include(__DIR__ . '/../Include/head.php'); ?>
<?php include(__DIR__ . '/../Include/navbar.php'); ?>

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title"><i class="icon-display4"></i> <?php echo getlang('settings'); ?></div>	
					<ul class="breadcrumb">
					<?php
						echo '<li><a href="'.$_SITEURL.'adm">'.getlang('home').'</a></li>';
						echo '<li class="active">'.getlang('settings').'</li>';
					?>					
					</ul>	
				</div>
			</div>			
			<!--/Page Header-->
			
			<div class="container-fluid page-content">
			
			<!-- Open Problems Start-->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo getlang('settings'); ?></h5>						
							</div>
							<div class="m-t-20">
							<?php
								if(isset($_POST['save'])) {
									$id_array=$_POST['id']; 
									$name_array=$_POST['name']; 
									$count=count($_POST["name"]);
									$error=false;
									for($i=0;$i<$count;$i++){ 
										$stmt = $conn->prepare("UPDATE settings SET setting = ? WHERE id = ?");
										$stmt->bind_param("si", $name, $id);
										$id = $id_array[$i];
										$name = $name_array[$i];
										$stmt->execute();
										if($stmt){
											$error = false;
										}else{
											$error = true;
										}
										$stmt->close();
									}
									 if($error == false){
										echo '<div class="col-md-12"><div class="alert alert-success no-border"<p class="text-size-large">'.getlang('saved').'</p></div></div>';
									}else{
										echo '<div class="col-md-12"><div class="alert alert-warning no-border"<p class="text-size-large">'.getlang('error').'</p></div></div>';
									}
								}
							
							
								$sql = "SELECT * FROM settings";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									$i=0;
									echo '<form method="post">';
									while($row = $result->fetch_assoc()) {
										$id = $row["id"];
										$name = $row["name"];
										$setting = $row["setting"];
										
										echo '<div class="form-group">
										<label class="control-label col-lg-1">'.getlang($name).'</label>
										<div class="col-lg-12" style="padding-bottom: 10px;">
											<input type="hidden" name="id[]"  value="'.$id.'">
											<input type="text" name="name[]" class="form-control" value="'.$setting.'" autocomplete="off">
										</div>
									</div>';
									}
									echo '<div class="form-group">
											<div class="col-lg-12" style="padding-bottom: 10px;">
												<button type="submit" name="save" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_default">'.getlang('save').'</button>								
											</div>
										</div>
									</form>';
								}
							?>		
							</div>
						</div>
					</div>																						
				</div>
			<!-- Open Problems End-->	
			</div>

<?php include(__DIR__ . '/../Include/footer.php'); ?>

<!-- Page scripts -->	

<script src="/../assets/js/charts/d3/d3.min.js"></script>
<script src="/../assets/js/charts/c3/c3.min.js"></script>
<script src="/../assets/js/charts/c3/c3_bars_pies.js"></script>
<script>
var pie_chart = c3.generate({
	bindto: '#c3-pie-chart',
	size: { width: 350 },
	color: {
		pattern: ['#3F51B5', '#FF9800', '#4CAF50', '#00BCD4', '#F44336']
	},
	data: {
		columns: [
			['data1', 10],
			['data2', 10],
			['data3', 10],
		],
		type : 'pie'
	}
});
</script>

<!-- /page scripts -->
<?php include(__DIR__ . '/../Include/foot.php'); ?>
<?php 
}else{
	header("Location: ".$_SITEURL."Login");
}
?>