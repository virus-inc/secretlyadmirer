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
									<a href="signin.php" class="current-page-item">Sign in</a>
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
									
									unset($_SESSION['userid']);

									}
									else
									{
									}
								$ousername = '';
								if(isset($_POST['username'], $_POST['password']))
								{
									if(get_magic_quotes_gpc())
									{
										$ousername = stripslashes($_POST['username']);
										$username = mysql_real_escape_string(stripslashes($_POST['username']));
										$password = stripslashes($_POST['password']);
									}
									else
									{
										$username = mysql_real_escape_string($_POST['username']);
										$password =md5($_POST['password']);
									}
									$req = mysql_query('select password,no from users where username="'.$username.'" or email="'.$username.'"');
									$dn = mysql_fetch_array($req);
									if($dn['password']==$password and mysql_num_rows($req)>0)
									{
										$form = false;
										$_SESSION['userid'] = $dn['no'];
							?>
							<script>
							window.location.href='massage.php';
							</script>
							<?php
									}
									else
									{
										$form = true;
										$message = 'The username or password is incorrect.';
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
				
					<form method="post" enctype="multipart/form-data" action="<?php echo($_SERVER["PHP_SELF"]); ?>">

						
						<p><input type="text" name="username" id="username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" placeholder="User Name or Email" /></p>
						
						<p><input type="password" name="password" id="password" placeholder="Password" />
						
							<p><input type="submit" name="Submit" value="Sign in" /> </p>
					
					
					</form>
				<a href="forget.php"><button>Forget Password</button></a>
				
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