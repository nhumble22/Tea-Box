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
	<div class="wrapper search-page">
		<div class="slider about-slider">
			<div class="overlay">
				<div class="content">
					<h1>Cart</h1>
				</div>
			</div>
		</div>
		<div class="text-box">
			<div class="text-box-inner">
				<div class="title">
					<h3>Your Order</h3>
					<hr>
				</div>
				<ul class="cart-list">
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
				<div class="payment">
					<p><b>Paypal or CC payment:</b></p>
					<input type="submit" value="Proceed">
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
