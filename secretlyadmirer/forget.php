<!DOCTYPE HTML>
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
										if(isset($_SESSION['userid']))
									{
									
									unset($_SESSION['userid']);

									}
									else
									{
									}

				if(isset($_POST['username']) and $_POST['username']!='')
{
	if(get_magic_quotes_gpc())
	{
		$_POST['username'] = stripslashes($_POST['username']);
	}
	$username=$_POST['username'];
	    
							$req = mysql_query('select email,code from users where username="'.$username.'" or email="'.$username.'"');
							$dn = mysql_fetch_array($req);
							$code=$dn['code'];
													$form = false;
													$to=$dn['email'];
$from ="admin@secretlyadmirer.me";
$subject="Email Verification";
$body='Hi '.$username.',
Click the flowed link.
User Name: '.$username.'
Code:'.$code.' 
http://secretlyadmirer.me/fpass.php?username='.$username.'&code='.$code.' ';
$headers = "From: Secretly Admirer $from \r\n";
$headers .= "Reply-To: $from \r\n";
mail($to, $subject, $body,$headers);
												
													?>
													
													<script>
							window.location.href='fpass.php';
							</script>
													
													<?php
													


	
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

						
						
						<p><input type="text" name="username" id="username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" placeholder="User Name" /></p>
						</p>
							<p><input type="submit" name="Submit" value="Sign up" /> </p>
					
					
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