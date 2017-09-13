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
							
						$no=$_SESSION['userid'];
						$count = mysql_fetch_array(mysql_query('select count(*) as count from massage where (rno="'.$no.'")'));
						$count = $count['count'];
							$dn2= mysql_query('select name,username from users where no="'.$no.'"');
							$dnn2 = mysql_fetch_array($dn2);
						?>
						<h2>Hi <?php echo $dnn2['name']; ?>, </h2>
						<h2>Your Link:
						<input type="text" value="https://secretlyadmirer.me/<?php echo $dnn2['username']; ?>"> </h2>
						<h2>You have <?php echo $count; ?> message </h2>
						<hr />
						<?php
							$dn1 = mysql_query('select image from image where no="'.$no.'"');
							$dnn1 = mysql_fetch_array($dn1);
							$imag=$dnn1['image'];
							?>
									<p> <?php echo '<img alt="'.$no.'" width="150" height="150" src="data:image;base64,'.$imag.'">';; ?></p>
									<hr />
	<table border="2">
	<tr>
    	<th>Message</th>
        <th>Time</th>
    </tr>

							<?php
							$req1 = mysql_query('select m1.fno, m1.massage,m1.date, count(m2.rno) as reps, users.no as userno, users.username from massage as m1, massage as m2,users where (m1.rno="'.$no.'") group by m1.date order by m1.date desc');
							
						while($dn = mysql_fetch_array($req1))
						{
	$kaa = explode(" ", $dn['massage']);
	$kaa1=$kaa[0];
	$kaa2=$kaa[1];
	$kaa3=array("$kaa1","$kaa2");
	$kaa4=implode(" ",$kaa3);
	?>
					<tr>
    	<td><a href="mview.php?no=<?php echo $no; ?>&date=<?php echo $dn['date']; ?>"><?php echo htmlentities($kaa4 , ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td> <?php echo date('  H:i:s,Y/m/d ' ,$dn['date']); ?></td>
    </tr>
					<?php		
						}
						?>
	</table>
							<?php
						if(intval(mysql_num_rows($req1))==0)
						{
						?>
						
						<h2>No Massage </h2>
						
					
						<?php
						
						}
						}
						else
						{
						?>
						<script>
							window.location.href='signin.php';
							</script>
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