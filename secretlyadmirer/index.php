<!DOCTYPE HTML>
<!--
	Minimaxing by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<?php
		include("config.php");
		?>
		<title>
		<?php 
		if(isset($_GET['un']))
		{
							$dn2 = mysql_query('select name from users where username="'.$_GET['un'].'"');
							$dnn2 = mysql_fetch_array($dn2);
							$name=$dnn2['name'];
							echo "Send Message to $name";
		}
		elseif(isset($_GET['no'] , $_GET['date']))
		{
							$dn2 = mysql_query('select name from users where no="'.$_GET['no'].'"');
							$dnn2 = mysql_fetch_array($dn2);
							$name=$dnn2['name'];
							echo "Message of $name";
		}
		else{
		echo 'Secretly Admirer';
		}
		
		?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="http://secretlyadmirer.me/assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="http://secretlyadmirer.me/assets/css/main.css" />
		<link rel="icon" href="http://secretlyadmirer.me/images/icon.jpg" />
		<!--[if lte IE 9]><link rel="stylesheet" href="http://secretlyadmirer.me/assets/css/ie9.css" /><![endif]-->

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
								<?php
								if(isset($_GET['no'] , $_GET['date'])){
								?>
								<a href="http://secretlyadmirer.me">Homepage</a>
								<?php
								}else{
								?>
									<a href="http://secretlyadmirer.me" class="current-page-item">Homepage</a>
									<?php
									}
										if(isset($_SESSION['userid']))
									{
									?>
									<a href="http://secretlyadmirer.me/signout.php">Sign Out</a>
									
									<?php

									}
									else
									{
									?>
									<a href="http://secretlyadmirer.me/signin.php">Sign in</a>
									<a href="http://secretlyadmirer.me/signup.php">Sign up</a>
									<?php
									}
									?>
									
									<a href="http://secretlyadmirer.me/massage.php">Massage</a>
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
				if(isset($_GET['un']))
				{
							$dn2 = mysql_query('select no,name from users where username="'.$_GET['un'].'"');
							$dnn2 = mysql_fetch_array($dn2);
							
							$dn1 = mysql_query('select image from image where no="'.$dnn2['no'].'"');
							$dnn1 = mysql_fetch_array($dn1);
							$imag=$dnn1['image'];
							
							if(isset($_POST['massage'])){
							?>
							<h2><?php echo $dnn2['name']; ?> </h2>
							
							<?php
									}else
									{
									?>
									<h2>You are sending message to <?php echo $dnn2['name']; ?> </h2>
									<?php
									}
									?>

									<p> <?php echo '<img alt="'.$_GET['un'].'" width="150" height="150" src="data:image;base64,'.$imag.'">';; ?></p>
									<?php
				
					if(isset($_POST['massage']))
				{
						$massage = stripslashes($_POST['massage']);
	

	$massage = mysql_real_escape_string(nl2br(htmlentities($massage, ENT_QUOTES, 'UTF-8')));

	if(get_magic_quotes_gpc())
									{
										$oun = stripslashes($_GET['un']);
										$un = mysql_real_escape_string(stripslashes($_GET['un']));
									}
									else
									{
										$un = mysql_real_escape_string($_GET['un']);
									}
					

						$fno="0";
						$req1 = mysql_query('select no from users where username="'.$un.'" or email="'.$un.'"');
						$dn2 = mysql_fetch_array($req1);
						if(mysql_query('insert into ip(rno,ip,browser,date) values ('.$dn2['no'].', "'.$_SERVER['REMOTE_ADDR'].'","'.$_SERVER['HTTP_USER_AGENT'].'","'.time().'")'))
						{
						
						
						
						
									
									
									$req = mysql_query('select no from users where username="'.$un.'" or email="'.$un.'"');
									$dn = mysql_fetch_array($req);
									if(mysql_query('insert into massage( fno,rno,massage,date) values ('.$fno.', "'.$dn['no'].'", "'.$massage.'","'.time().'")'))
									{
									?>
									 Message send succed
									
									<?php
									}
									else
									{
									?>
									Error! occourd.
									<?php
									}
									}
									
				}
				else
				{
				?>
				<p> Write your Message Here:</p>
					<form method="post" action="index.php?un=<?php echo $_GET['un']; ?>">

						
						<p><textarea type="text" cols="50" rows="5" name="massage" placeholder="Massage">
						</textarea></p>
						
						
						
							<p><input type="submit" name="Submit" value="Send" /> </p>
					
					
					</form>
				<?php
				}
				}
				elseif(isset($_GET['no'] , $_GET['date']))
							{
							$dn = mysql_query('select massage from massage where rno="'.$_GET['no'].'" and date="'.$_GET['date'].'"');
							$dn1 = mysql_fetch_assoc($dn);
							$massage=$dn1['massage'];
							?>
							<div height="200px" width="200px" class="red">
						<?php echo $massage;
							?>
							
							</div>
							<?php
							
							}
				else
				{
				?>
				<p>Send a funny or shoking message to your friend without publishing your Identy.</p>
				And you can also get message,Just Sign up in our site and enjoy it.
				<p>We can't collect your Identy</p>
Just collect your Log in information.
				<p>If someone say worg word, we are not responsible for it.</p>
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
			<script src="http://secretlyadmirer.me/assets/js/jquery.min.js"></script>
			<script src="http://secretlyadmirer.me/assets/js/skel.min.js"></script>
			<script src="http://secretlyadmirer.me/assets/js/skel-viewport.min.js"></script>
			<script src="http://secretlyadmirer.me/assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="http://secretlyadmirer.me/assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="http://secretlyadmirer.me/assets/js/main.js"></script>

	</body>
</html>