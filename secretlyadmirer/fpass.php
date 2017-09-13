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
								$ousername = '';
								if(isset($_GET['username'], $_GET['code']))
								{
									if(get_magic_quotes_gpc())
									{
										$ousername = stripslashes($_GET['username']);
										$username = mysql_real_escape_string(stripslashes($_GET['username']));
										$code = stripslashes($_GET['code']);
									}
									else
									{
										$username = mysql_real_escape_string($_GET['username']);
										$code = $_GET['code'];
									}
									$req = mysql_query('select code,no from users where username="'.$username.'" or email="'.$username.'"');
									$dn = mysql_fetch_array($req);
									$code1=rand(1000,100000);
									if($dn['code']==$code and mysql_num_rows($req)>0)
									{
										
										
										if(mysql_query('update users set code="'.$code1.'", con="yes" where no="'.$dn['no'].'"'))
												{
												
													$form = false;
													$_SESSION['rpass'] = $dn['no'];
													?>
							<script>
							window.location.href='rpass.php';
							</script>
													<?php
												}
												else
												{
													$form = true;
													$message = 'Error occurred while Confirming up.';
												}
									}
									else
									{
										$form = true;
										$message = 'The username or Code is incorrect.';
									}
								}
								else
								{
									$form = true;
								}
								if($form)
					{
								if(isset($message))
								{
									echo '<div class="message">'.$message.'</div>';
								}
							?>
				
					<form method="get" action="<?php echo($_SERVER["PHP_SELF"]); ?>">

						<p><input type="text" name="username" id="username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" placeholder="User Name or Email" /></p>
						
						<p><input type="text" name="code" id="code" placeholder="Code" /></p>
						
							
							<p><input height="200px" type="submit" name="Submit" value="confirm" /> </p>
					
					
					</form>
				
				
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