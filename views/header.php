<!DOCTYPE HTML>
<html>
<head>
	<title>weather</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
	<body>
		<nav class="navbar navbar-inverse"> 
			<div class="container-fluid">
				<div class="navbar-header">
					<h4>Weather</h4>
				</div>
				<ul class="nav navbar-nav">
					
					<li class="active"><a href="<?php echo URL;?>/weather/index">Weather</a></li>
					<li><a href="<?php echo URL;?>/feedback/index">FeedBack</a></li>

					<li><a href="<?php echo URL; ?>/feeds/getlist">Feeds</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<?php 
					$first_name = $_SESSION['first_name'];
					if (!empty($first_name)) {
						echo "<div class='text-warning'> $first_name, welcome!</div>";?>
						<li><a href="<?php echo URL;?>/login/userExit"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						<?php
					}
					else {?>
						<li><a href="<?php echo URL;?>/login/auth"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="<?php echo URL;?>/login/index"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					<?php
				}
			 	?>
				
				</ul>
			</div>
			
		</nav>

		<div class="well">
