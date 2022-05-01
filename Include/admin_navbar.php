<?php $__TOKEN = "hardcodeshitbykernstudios"; require_once(__DIR__ . '/../Include/_init.php');
	require_once __DIR__ . '/../assets/vendor/autoload.php';
	use YoHang88\LetterAvatar\LetterAvatar;

if (isset($_SESSION['id']) AND $UserisAdm == true){
	$suid = mssql_escape_string($_SESSION['id']);
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
	
	<header class="main-nav1 clearfix">			
		<div class="topnav" id="myTopnav">
			<a class="nobg" href="../"><div class="logo"></div></a>
			<a href="../adm">Home</a>
			<a href="que"><?php echo getlang('que'); ?></a>
			<a href="user"><?php echo getlang('user'); ?></a>
			<a href="lang"><?php echo getlang('lang_set'); ?></a>
			<a href="sett"><?php echo getlang('settings'); ?></a>
			<a href="javascript:void(0);" class="icon" onclick="showNav()">
			<i class="fa fa-bars"></i>
		  </a>
		</div>
		
		
	</header>
	
	<script>
	function showNav() {
	  var x = document.getElementById("myTopnav");
	  if (x.className === "topnav") {
		x.className += " responsive";
	  } else {
		x.className = "topnav";
	  }
	}
	</script>
<?php 
}else{
	header("Location: ".$_SITEURL."Login");
} ?>