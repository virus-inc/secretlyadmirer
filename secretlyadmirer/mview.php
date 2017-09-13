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
									<a href="index.php">Homepage</a>
									<?php
										if(isset($_SESSION['userid']))
									{
									?>
									<a href="signout.php">Sign Out</a>
									
									<?php

									}
									else
									{
									?>
									<a href="signin.php">Sign in</a>
									<a href="signup.php">Sign up</a>
									<?php
									}
									?>
									
									<a href="massage.php" class="current-page-item">Massage</a>
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
							
							if(isset($_GET['no'] , $_GET['date']))
							{
							$dn = mysql_query('select massage from massage where rno="'.$_GET['no'].'" and date="'.$_GET['date'].'"');
							$dn1 = mysql_fetch_assoc($dn);
							$massage=$dn1['massage'];
							?><p> If you want to share this message just 
							Sheare this link <input type="text" value="http://secretlyadmirer.me/message/<?php echo $_GET['no'];?>/<?php echo $_GET['date']; ?>"></p>
							<div height="200px" width="200px" class="red">
						<?php echo $massage;
							?>
							
							</div>
							<?php
							
							}
							else
							{
							?>
							<script>
							window.location.href='massage.php';
							</script>
							<?php
							}
						}
						else
						{
						
						?>
							<script>
							window.location.href='massage.php';
							</script>	<?php
						
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