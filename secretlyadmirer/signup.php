<!DOCTYPE HTML>
<html>
	<head>
		<title>Secretly Admirer</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="icon" href="images/icon.jpg" />
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
									<a href="signup.php" class="current-page-item">Sign up</a>
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

				if(isset($_POST['name'],$_POST['username'], $_POST['password'], $_POST['rpassword'], $_POST['email']) and $_POST['username']!='')
{
	if(get_magic_quotes_gpc())
	{
		$_POST['name'] = stripslashes($_POST['name']);
		$_POST['username'] = stripslashes($_POST['username']);
		$_POST['password'] = stripslashes($_POST['password']);
		$_POST['rpassword'] = stripslashes($_POST['rpassword']);
		$_POST['email'] = stripslashes($_POST['email']);
	}
			$imgFile = $_FILES['id']['name'];
			$tmp_dir = $_FILES['id']['tmp_name'];
			$imgSize = $_FILES['id']['size'];
			

			
	if(empty($imgFile))
	{
		$form = true;
		$message = 'Missing Image';
	}
		
	else
	{
	    			$image= addslashes($_FILES['id']['tmp_name']);
					$iname= addslashes($_FILES['id']['name']);
					$image=file_get_contents($image);
					$image=base64_encode($image);
	    
	    
		if($_POST['password']==$_POST['rpassword'])
		{
			if(strlen($_POST['password'])>=6)
			{
				if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
				{
				
					
							
							$name = mysql_real_escape_string($_POST['name']);
							$username = mysql_real_escape_string($_POST['username']);
							$password =md5(mysql_real_escape_string($_POST['password']));
							$email = mysql_real_escape_string($_POST['email']);
							$con = 'na';
							$code=rand(1000,100000);
							
							
																			
									$imgExt = strtolower(pathinfo($iname,PATHINFO_EXTENSION));
								
									
									$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
																		
									
							if(in_array($imgExt, $valid_extensions))
							{			
									
								if($imgSize < 2000000)
								{							
										$dn = mysql_num_rows(mysql_query('select no from users where username="'.$username.'"'));
										if($dn==0)
										
										{
											$dn2 = mysql_num_rows(mysql_query('select no from users'));
											$id = $dn2+1;
												if(mysql_query('insert into users( no,name, username, password, email, con, code,date) values ('.$id.', "'.$name.'", "'.$username.'", "'.$password.'", "'.$email.'", "'.$con.'",  "'.$code.'", "'.time().'")'))
												{
													
													if(mysql_query("insert into image (image,no) values ('$image', '$id')"))
														{
													$form = false;
													$to=$email;
$from ="admin@secretlyadmirer.me";
$subject="Email Verification";
$body='Hi '.$username.',
We need to make sure you are human. Please verify your email and get started using your Website account.
User Name: '.$username.'
Code:'.$code.' 
http://secretlyadmirer.me/conf.php?username='.$username.'&code='.$code.' ';
$headers = "From: Secretly Admirer $from \r\n";
$headers .= "Reply-To: $from \r\n";
mail($to, $subject, $body,$headers);




																								
													?>
													
													<script>
							window.location.href='conf.php';
							</script>
													
													<?php
													}
													else
													{
															$form = true;
															$message = 'Error occurred while Loging up.fgvf';
													}
													
												}
												else
												{
													$form = true;
													$message = 'Error occurred while Loging up.uiui';
												}
									

										}
									else
									{
										$form = true;
										$message = 'Please choose another username.';
									}
								}
								else
								{
									$form = true;
									$message = 'Images size is geatter than 2MB';
								}
							}
							else
								{
										$form = true;
										$message = 'Only JPG, JPEG, PNG & GIF files are allowed.';		
								}

			}
				else
				{
					$form = true;
					$message = 'Check Email Address';
				}
		}
			else
			{
				$form = true;
				$message = 'Your password contain is not 6 characters.';
			}
		}
	else
	{
		$form = true;
		$message = 'You type different password';
	}
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

						<p><input type="text" name="name" id="name" value="<?php if(isset($_POST['name'])){echo htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');} ?>"  placeholder="Name" /></p>
						<p><input type="text" name="username" id="username" value="<?php if(isset($_POST['username'])){echo htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8');} ?>" placeholder="User Name" /></p>
						
						<p><input type="password" name="password" id="password" placeholder="Password" /></p>
						<p><input type="password" name="rpassword" id="rpassword" placeholder="Retive Password" /></p>
						<p><input type="email" name="email" id="email" value="<?php if(isset($_POST['email'])){echo htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8');} ?>" placeholder="Email" /></p>
						
							Your Photo:
						<p><div class="field">
							<input type="file" name="id" id="id" accept="image/*"/>
						</div></p>
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