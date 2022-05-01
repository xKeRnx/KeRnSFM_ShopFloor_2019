<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once(__DIR__ . '/../Include/_init.php');
	require_once __DIR__ . '/../assets/vendor/autoload.php';
	use YoHang88\LetterAvatar\LetterAvatar;

if (isset($_SESSION['id'])){
	$suid = $_SESSION['id'];
	$suid = mssql_escape_string($suid);	
?>
</head>
<body class="material-menu" id="top">
	<div id="preloader">
		<div id="status">
			<div class="loader">
				<div class="loader-inner ball-pulse">
				  <div class="bg-blue"></div>
				  <div class="bg-amber"></div>
				  <div class="bg-success"></div>
				</div>
			</div>
		</div>
	</div>
	
	<header class="main-nav clearfix">	
		
		<div class="navbar-left pull-left">
			<div class="clearfix">
				<ul class="left-branding pull-left">
					<li><span class="left-toggle-switch visible-handheld"><i class="icon-menu7"></i></span></li>
					<li>
						<a href="../"><div class="logo"></div></a>
					</li>
				</ul>				
			</div>
		</div>
		
		<div class="navbar-right pull-right">
			<div class="clearfix">				
				<ul class="pull-right top-right-icons">		
					<li class="dropdown notifications">
						<a href="#" class="btn-notification dropdown-toggle" data-toggle="dropdown"><i class="fas fa-globe"></i></a>
						<div class="dropdown-menu" style="width: 150px !important;min-width: 100px;">
							<div>															
								<div class="media-container">											
									<ul class="clearfix">
										<li class="clearfix">
											<a onclick="change_lang('de');" class="media-thumb"><img src="/../assets/images/iso_flags/de.png" alt="image" style="border-radius: 0%;webkit-border-radius: 0%;"></a>
											<a onclick="change_lang('de');" class="media-title"><strong>German</strong></a>
										</li>
										<li class="clearfix">
											<a onclick="change_lang('en');" class="media-thumb"><img src="/../assets/images/iso_flags/us.png" alt="image" style="border-radius: 0%;webkit-border-radius: 0%;"></a>
											<a onclick="change_lang('en');" class="media-title"><strong>English</strong></a>
										</li>
										<li class="clearfix">
											<a onclick="change_lang('cn');" class="media-thumb"><img src="/../assets/images/iso_flags/cn.png" alt="image" style="border-radius: 0%;webkit-border-radius: 0%;"></a>
											<a onclick="change_lang('cn');" class="media-title"><strong>Chinese</strong></a>
										</li>
										<li class="clearfix">
											<a onclick="change_lang('in');" class="media-thumb"><img src="/../assets/images/iso_flags/in.png" alt="image" style="border-radius: 0%;webkit-border-radius: 0%;"></a>
											<a onclick="change_lang('in');" class="media-title"><strong>Indian</strong></a>
										</li>
									</ul>
								</div>																	
							</div>
						</div>
					</li>
					<script>
					function change_lang(lang){
						document.cookie = "lang="+lang+"; expires=Thu, 24 Dec 2099 00:00:00 UTC;"; 
						location.reload(true);
					}
					</script>
					<li class="dropdown notifications">
						<a href="#" class="btn-notification dropdown-toggle" data-toggle="dropdown"><i class="icon-bell2"></i></a>
						<div class="dropdown-menu">
							<div>															
								<div class="media-container">											
									<ul class="clearfix">
										<?php
										
										$sql0 = "SELECT * FROM entry_history WHERE entry IN (SELECT id FROM project_entry WHERE creator='$suid') ORDER BY date DESC LIMIT 5";
										$result0 = $conn->query($sql0);

										if ($result0->num_rows > 0) {
											while($row0 = $result0->fetch_assoc()) {
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
												$navavatarImage = new LetterAvatar($navselcomuser, 'circle', 64);
												echo '<li class="clearfix">
														<a href="'.$_SITEURL.'projects_item?id='.$navnaventryid.'" class="media-thumb"><img src="'.$navavatarImage.'" alt="image"></a>
														<a href="'.$_SITEURL.'projects_item?id='.$navnaventryid.'" class="media-title"><strong>'.$navselcomuser.' </strong>'.$entryhismsg.'<span class="media-time">'.$navnavprojdes.'</span><span class="media-time">'.$entryhisdate.'</span></a>
													</li>';
												
											}
										}
										?>											
									</ul>
									<a class="btn btn-link btn-block btn-view-all" href="<?php echo $_SITEURL; ?>msg"><span><i class="icon-comment"></i> View all messages</span></a>
								</div>																	
							</div>
						</div>
					</li>
					
					<?php
					$sql22 = "SELECT department, FName, LName, isAdm FROM user WHERE id='$suid'";
					$result22 = $conn->query($sql22);

					if ($result22->num_rows == 1) {
						$row22 = $result22->fetch_assoc();
						$navnavselcomuser = $row22["FName"].' '.$row22["LName"];	
						$navnavyouravatar = new LetterAvatar($navnavselcomuser, 'circle', 64);
						$isthisuseradm = $row22["isAdm"];
					}

					if ($UserisAdm == true) {
					?>	
					<li class="dropdown user-dropdown">
						<a href="#" class="btn-notification dropdown-toggle" data-toggle="dropdown"><i class="icon-profile"></i></a>
						<div class="dropdown-menu">	
							<ul class="more-apps">
								<li><a href="<?php echo $_SITEURL; ?>adm"><i class="icon-cogs"></i> Admin Home</a></li>
								<li><a href="<?php echo $_SITEURL; ?>adm/que"><i class="icon-cogs"></i> Admin <?php echo getlang('que'); ?></a></li>
								<li><a href="<?php echo $_SITEURL; ?>adm/probtype"><i class="icon-cogs"></i> Admin <?php echo getlang('problem_description'); ?></a></li>
								<li><a href="<?php echo $_SITEURL; ?>adm/project"><i class="icon-cogs"></i> Admin <?php echo getlang('project'); ?></a></li>
								<li><a href="<?php echo $_SITEURL; ?>adm/user"><i class="icon-cogs"></i> Admin <?php echo getlang('user'); ?></a></li>
								<li><a href="<?php echo $_SITEURL; ?>adm/lang"><i class="icon-cogs"></i> Admin <?php echo getlang('lang_set'); ?></a></li>
								<li><a href="<?php echo $_SITEURL; ?>adm/sett"><i class="icon-cogs"></i> Admin <?php echo getlang('settings'); ?></a></li>
							</ul>
						</div>
					</li>
					<?php } ?>
					
					<li class="dropdown user-dropdown">
						<a href="#" class="btn-user dropdown-toggle hidden-xs" data-toggle="dropdown"><img src="<?php echo $navnavyouravatar; ?>" class="img-circle user" alt=""/></a>
						<a href="#" class="dropdown-toggle visible-xs" data-toggle="dropdown"><i class="icon-more"></i></a>
						<div class="dropdown-menu">	
							<div class="text-center"><img src="<?php echo $navnavyouravatar; ?>" class="img-circle img-70" alt=""/></div>
							<h5 class="text-center"><b>Hi! <?php echo $navnavselcomuser; ?></b></h5>
							<ul class="more-apps">
								<li><a href="<?php echo $_SITEURL; ?>settings"><i class="icon-cogs"></i> Settings</a></li>
							</ul>
							<div class="text-center"><a href="<?php echo $_SITEURL; ?>logout" class="btn btn-sm btn-info"><i class="icon-exit3 i-16 position-left"></i> Logout</a></div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</header>
<?php 
}else{
	header("Location: ".$_SITEURL."Login");
} ?>