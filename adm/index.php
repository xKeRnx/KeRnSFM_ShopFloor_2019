<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once(__DIR__ . '/../Include/_init.php'); 
if (isset($_SESSION['id']) AND $UserisAdm == true){
	$suid = mssql_escape_string($_SESSION['id']);

?>
<?php include(__DIR__ . '/../Include/head.php'); ?>
<?php include(__DIR__ . '/../Include/navbar.php'); ?>

			<!--Page Header-->
			<div class="header">
				<div class="header-content">
					<div class="page-title"><i class="icon-display4"></i> <?php echo getlang('Dashboard'); ?></div>	
					<ul class="breadcrumb">
					<?php
						echo '<li class="active">'.getlang('home').'</li>';
					?>					
					</ul>	
				</div>
			</div>			
			<!--/Page Header-->
			
			<div class="container-fluid page-content">
			
			<!-- Chart  Start-->
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo getlang('last7days'); ?></h5>							
							</div>
							<div class="panel-body">
								<div class="chart" id="c3-bar-chart7"></div>
							</div>
						</div>
					</div>
					
					<div class="col-md-6 col-sm-6 col-xs-12">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title"><?php echo getlang('last30days'); ?></h5>							
							</div>
							<div class="panel-body">
								<div class="chart" id="c3-bar-chart30"></div>
							</div>
						</div>
					</div>
				</div>

			<!-- Chart End-->
			
			<!-- Open Problems Start-->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
					</div>																						
				</div>
			<!-- Open Problems End-->	
			</div>

<?php include(__DIR__ . '/../Include/footer.php'); ?>

<!-- Page scripts -->	

<script src="/../assets/js/charts/d3/d3.min.js"></script>
<script src="/../assets/js/charts/c3/c3.min.js"></script>
<script src="/../assets/js/charts/c3/c3_bars_pies.js"></script>
<script src="/../assets/js/charts/c3/c3_advanced.js"></script>
<script src="/../assets/js/charts/c3/c3_lines_areas.js"></script>
<script src="/../assets/js/charts/c3/c3_bars_pies.js"></script>
<?php
// entry_type -> 0 = escalated / 1 = add solution / 2 = new Solution time / 3 = Problem solved / 4 = Problem opened
$sqlstat7esc = "SELECT count(*) as total FROM entry_history WHERE DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= date AND entry_type = 0";
$resultstat7esc = $conn->query($sqlstat7esc);
if ($resultstat7esc->num_rows > 0) {
	$rowstar7esc = $resultstat7esc->fetch_assoc();
	$escal7 = $rowstar7esc['total'];
}else{
	$escal7 = 0;
}

$sqlstat7op = "SELECT count(*) as total FROM entry_history WHERE DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= date AND entry_type = 4";
$resultstat7op = $conn->query($sqlstat7op);
if ($resultstat7op->num_rows > 0) {
	$rowstar7op = $resultstat7op->fetch_assoc();
	$open7 = $rowstar7op['total'];
}else{
	$open7 = 0;
}

$sqlstat7clos = "SELECT count(*) as total FROM entry_history WHERE DATE_SUB(CURDATE(),INTERVAL 7 DAY) <= date AND entry_type = 3";
$resultstat7clos = $conn->query($sqlstat7clos);
if ($resultstat7clos->num_rows > 0) {
	$rowstar7clos = $resultstat7clos->fetch_assoc();
	$closed7 = $rowstar7clos['total'];
}else{
	$closed7 = 0;
}

$sqlstat30esc = "SELECT count(*) as total FROM entry_history WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= date AND entry_type = 0";
$resultstat30esc = $conn->query($sqlstat30esc);
if ($resultstat30esc->num_rows > 0) {
	$rowstar30esc = $resultstat30esc->fetch_assoc();
	$escal30 = $rowstar30esc['total'];
}else{
	$escal30 = 0;
}

$sqlstat30op = "SELECT count(*) as total FROM entry_history WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= date AND entry_type = 4";
$resultstat30op = $conn->query($sqlstat30op);
if ($resultstat30op->num_rows > 0) {
	$rowstar30op = $resultstat30op->fetch_assoc();
	$open30 = $rowstar30op['total'];
}else{
	$open30 = 0;
}

$sqlstat30clos = "SELECT count(*) as total FROM entry_history WHERE DATE_SUB(CURDATE(),INTERVAL 30 DAY) <= date AND entry_type = 3";
$resultstat30clos = $conn->query($sqlstat30clos);
if ($resultstat30clos->num_rows > 0) {
	$rowstar30clos = $resultstat30clos->fetch_assoc();
	$closed30 = $rowstar30clos['total'];
}else{
	$closed30 = 0;
}
?>
<script>
    // Generate chart
    var bar_chart = c3.generate({
        bindto: '#c3-bar-chart7',
        size: { height: 300 },
        data: {
            columns: [
				['<?php echo getlang('opened'); ?>', <?php echo $open7; ?>],
                ['<?php echo getlang('escalated'); ?>', <?php echo $escal7; ?>],
				 ['<?php echo getlang('closed'); ?>', <?php echo $closed7; ?>]
				
            ],
            type: 'bar'
        },
        color: {
            pattern: ['#2196F3', '#FF9800', '#4CAF50']
        },
        bar: {
            width: {
                ratio: 0.5
            }
        },
        grid: {
            y: {
                show: true
            }
        }
    });
	
    var bar_chart = c3.generate({
        bindto: '#c3-bar-chart30',
        size: { height: 300 },
        data: {
            columns: [
				['<?php echo getlang('opened'); ?>', <?php echo $open30; ?>],
                ['<?php echo getlang('escalated'); ?>', <?php echo $escal30; ?>],
				 ['<?php echo getlang('closed'); ?>', <?php echo $closed30; ?>]
				
            ],
            type: 'bar'
        },
        color: {
            pattern: ['#2196F3', '#FF9800', '#4CAF50']
        },
        bar: {
            width: {
                ratio: 0.5
            }
        },
        grid: {
            y: {
                show: true
            }
        }
    });

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

var pie_chart = c3.generate({
	bindto: '#c3-pie-chart1',
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