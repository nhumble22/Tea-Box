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
	include('/php/register-form.php');
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
					<h3>Please register</h3>
					<hr>
				</div>
				<form  method="POST" class="form registerForm">
					<ul class="register">
						<li>
							<label><p><b>First Name:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" id="register-first-name" name="register-first-name" class="input <?php echo $registerFirstNameClass; ?>" value="<?php if(isset($_POST['register-first-name'])){ echo $_POST['register-first-name'];}?>">
						</li>
						<li>
							<label><p><b>Last Name:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" id="register-last-name" name="register-last-name" class="input <?php echo $registerLastNameClass; ?>" value="<?php if(isset($_POST['register-last-name'])){ echo $_POST['register-last-name'];}?>">
						</li>
						<li>
							<label><p><b>Email:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" id="register-email" name="register-email" class="input <?php echo $registerEmailClass; ?>" value="<?php if(isset($_POST['register-email'])){ echo $_POST['register-email'];}?>">
						</li>
						<li>
							<label><p><b>Password:</b></p></label>
						</li>
						<li>
							<input type="password" class="input" id="register-password" name="register-password" class="input <?php echo $registerPasswordClass; ?>" value="<?php if(isset($_POST['register-password'])){ echo $_POST['register-password'];}?>">
						</li>


						<li>
							<input type="submit" id="register-submit" name="submit" value="Register">
						</li>
						<li>
							<p>Already have an account? Please <a href="login.php">login</a>.</p>
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