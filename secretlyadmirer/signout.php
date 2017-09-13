<!DOCTYPE HTML>
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Secretly Admirer</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/icon.jpg" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<?php
	include("config.php");
	?>
	</head>
	<body>
		<div id="page-wrapper">
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

							<header id="header">
								<h1><a href="#" id="logo">Secretly Admirer</a></h1>
								<nav id="nav">
									<a href="index.php" class="current-page-item">Homepage</a>
									<a href="signin.php">Sign in</a>
									<a href="signup.php">Sign up</a>
									<a href="massage.php">Massage</a>
								</nav>
							</header>

						</div>
					</div>
				</div>
			</div>
			<br/>
			<br/>
			<div id="main">
				<div class="container">
				<br />
				<br />
				
				<center>
				
				<?php
						if(isset($_SESSION['userid']))
						{

							unset($_SESSION['username'], $_SESSION['userid']);
							?>

						<h2>Logged Out</h2>	
						
						<hr />
						<?php
						}
						else
						{
						?>
						<hr />
						You are not logged in
						<hr />
						<?php
						
						}
						?>
						
				
				
				
				</center>
				
				
				
				
				</div>
			</div>
			<div id="footer-wrapper">
				<div class="container">

						

					
					<div class="row">
						<div class="12u">

							<div id="copyright">
								&copy; <a href="http://virusincbd.com">VI Tech</a> | HTML Design: <a href="http://html5up.net">HTML5 UP</a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/skel-viewport.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>