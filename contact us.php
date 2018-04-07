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
	include('/php/contact-form.php');
	?>
	<div class="wrapper">
		<div class="slider about-slider">
			<div class="overlay">
				<div class="content">
					<h1>Contact Us</h1>
				</div>
			</div>
		</div>
		<div class="text-box">
			<div class="text-box-inner">
				<div class="title">
					<h3>Send us a message</h3>
					<hr>
				</div>
				<ul class="contact-us">
					<form method="POST" class="contactForm">
						<li>
							<label><p><b>Name:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" name="name" id="contact-name">
						</li>
						<li>
							<label><p><b>Email:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" name="email" id="contact-email">
						</li>
						<li>
							<label><p><b>Phone:</b></p></label>
						</li>
						<li>
							<input type="text" class="input" name="phone" id="contact-phone">
						</li>
						<li>
							<label><p><b>Message:</b></p></label>
						</li>
						<li>
							<textarea name="message" class="input" id="contact-message"></textarea>
						</li>
						<li>
							<input type="submit" name="submit" value="Send">
						</li>
					</form>
				</ul>
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
