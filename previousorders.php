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
	?>

	<?php 
	if (	(!isset($_SESSION['user']))	||	
		(isset($_SESSION['user']) && 
		$_SESSION['user']['user_type'] == 1)	) { 
		header("Location:index.php");
		exit();
	} else if (isset($_SESSION['user']) && 
	$_SESSION['user']['user_type'] == 2) { ?>


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
					<h3>Previous Orders</h3>
					<hr>
				</div>
				<ul class="cart-list">
					<li class="previous-order">
						<div>
							<p><b>Order Number: </b></p>
							<p>1000342</p>
						</div>
						<div>
							<p><b>Order Date: </b></p>
							<p>22/03/2016</p>
						</div>
					</li>
					<li>
						<div>
							<a href="#"><img src="img/delete.png"></a>
							<p>2x</p>
							<p>Caramel Toffee</p>
						</div>
						<div>
							<p>$4.99</p>
							<p>$9.88</p>
						</div>
					</li>
					<li>
						<div>
							<a href="#"><img src="img/delete.png"></a>
							<p>1x</p>
							<p>China Teapot</p>
						</div>
						<div>
							<p>$7.99</p>
							<p>$7.99</p>
						</div>
					</li>
					
				</ul>
				<div class="sub-cart">
					<p>Flat rate NZ shipping:</p>
					<p>$5.00</p>
					<br>
					<p><b>Total:</b></p>
					<p><b>$22.87</b></p>
				</div>
				<ul class="cart-list">
					<li class="previous-order">
						<div >
							<p><b>Order Number: </b></p>
							<p>1000342</p>
						</div>
						<div>
							<p><b>Order Date: </b></p>
							<p>22/03/2016</p>
						</div>
					</li>
					<li>
						<div>
							<a href="#"><img src="img/delete.png"></a>
							<p>2x</p>
							<p>Caramel Toffee</p>
						</div>
						<div>
							<p>$4.99</p>
							<p>$9.88</p>
						</div>
					</li>
					<li>
						<div>
							<a href="#"><img src="img/delete.png"></a>
							<p>1x</p>
							<p>China Teapot</p>
						</div>
						<div>
							<p>$7.99</p>
							<p>$7.99</p>
						</div>
					</li>
					
				</ul>
				<div class="sub-cart">
					<p>Flat rate NZ shipping:</p>
					<p>$5.00</p>
					<br>
					<p><b>Total:</b></p>
					<p><b>$22.87</b></p>
				</div>
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