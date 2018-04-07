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
	include('/php/address-form.php');
	?>


	<?php 
	if (	(!isset($_SESSION['user']))	||	
		(isset($_SESSION['user']) && 
		$_SESSION['user']['user_type'] == 1)	) { 
		header("Location:index.php");
		exit();
	} else if (isset($_SESSION['user']) && 
	$_SESSION['user']['user_type'] == 2) { 

	$userId = $_SESSION['user']['user_id'];
	$postQuery = "SELECT * FROM users WHERE user_id = $userId";
	$checkResult = mysqli_query($link, $postQuery);
	$rows = mysqli_fetch_assoc($checkResult);

	$firstName = $rows['user_first_name'];
	$lastName = $rows['user_last_name'];
	$address = $rows['user_address'];
	$suburb = $rows['user_suburb'];
	$city = $rows['user_city'];
	$phone = $rows['user_phone'];
	?>

	
	<div class="wrapper search-page">
		<div class="slider about-slider">
			<div class="overlay">
				<div class="content">
					<h1>My Account</h1>
				</div>
			</div>
		</div>

		<ul class="sub-menu">
			<li>
				<a href="account.php"><h4>Personal Details</h4></a>
				<a href="previousorders.php"><h4>Previous Orders</h4></a>
				<a href="php/logout.php"><h4>Logout</h4></a>
			</li>
		</ul>

		<div class="text-box">
			<div class="text-box-inner">
				<div class="title">
					<h3>Personal Details</h3>
					<hr>
				</div>
				<form method="POST" class="personalDetails">
					<ul class="address">
						<li>
							<label><p><b>First Name:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" id="first-name" name="first-name" value="<?php echo $firstName;?>">
						</li>
						<li>
							<label><p><b>Last Name:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" id="last-name" name="last-name" value="<?php echo $lastName;?>">
						</li>
						<li>
							<label><p><b>Street Address:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" id="address" name="address" value="<?php echo $address;?>">
						</li>
						<li>
							<label><p><b>Suburb:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" id="suburb" name="suburb" value="<?php echo $suburb;?>">
						</li>
						<li>
							<label><p><b>City:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" id="city" name="city" value="<?php echo $city;?>">
						</li>
						<li>
							<label><p><b>Contact Number:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" id="phone" name="phone" value="<?php echo $phone;?>">
						</li>
						<li>
							<input type="submit" name="submit" id="login-submit" value="Update">
						</li>
						<li>
							<p>We will always confirm your delivery address on checkout.</p>
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