<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php
	include('/php/header.php');
	include('/php/login-form.php');
	?>

	<?php 
	if (isset($_SESSION['user'])	) { 
		header("Location:index.php");
		exit();
	} else { ?>



	<div class="wrapper search-page">
		<div class="slider about-slider">
			<div class="overlay">
				<div class="content">
					<h1>My Account</h1>
				</div>
			</div>
		</div>
		<div class="text-box">
			<div class="text-box-inner">
				<div class="title">
					<h3>Please login</h3>
					<hr>
				</div>
				<form method="POST" class="form loginForm">
					<ul class="login">
						<li>
							<label><p><b>Email:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" id="login-email" name="login-email" class="input <?php echo $loginEmailClass; ?>" value="<?php if(isset($_POST['login-email'])){ echo $_POST['login-email'];}?>">
						</li>
						<li>
							<label><p><b>Password:</b></p></label>
						</li>
						<li>
							<input type="password" class="input" id="login-password" name="login-password" class="input <?php echo $loginPasswordClass; ?>" value="<?php if(isset($_POST['login-password'])){ echo $_POST['login-password'];}?>">
						</li>
						<li>
							<input type="submit" class="input" id="login-submit" name="submit" value="LOGIN">
						</li>
						<li>
							<p>No account? Please <a href="register.php">register</a>.</p>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>

	<?php
	include('/php/footer.php');
	?>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="js/app.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>

<?php } ?>