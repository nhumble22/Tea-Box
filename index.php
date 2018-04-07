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
	<div class="wrapper home-page">
		<div class="slider">
			<div class="overlay">
				<div class="content">
					<img src="img/leaf2.png">
					<h1>TEA BOX</h1>
				</div>
			</div>
		</div>
		<div class="text-box">
			<div class="text-box-inner">
				<div class="title">
					<h3>Welcome to Tea Box</h3>
					<hr>
				</div>
				<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis 
					praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias 
					excepturi sint occaecati cupiditate non provident, similique sunt in 
					culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. 
					Et harum quidem rerum facilis est et expedita distinctio.</p>
			</div>
		</div>
		<div class="title">
			<h3>Our Favorites</h3>
			<hr>
		</div>
		<ul class="listings">
			<?php
			$postQuery = "SELECT * FROM products WHERE category_id = 1 ORDER BY product_stock LIMIT 3";
			$checkResult = mysqli_query($link, $postQuery);
			while ($rows = mysqli_fetch_assoc($checkResult)):
			$id = $rows['product_id'];
			$name = $rows['product_name'];	
			$img = $rows['product_image'];
			$flavor = $rows['product_flavor'];	
			$price = $rows['product_price'];
			?>

			<li class="listing-item">
				<a href="product.php?id=<?php echo $id;?>">
					<div class="listing-wrapper">
						<div class="listing-title">
							<h2><?php echo $name;?></h2>
						</div>
						<div class="listing-image" style="background-image: url(img/products/<?php echo $img;?>);">

						</div>
						<div class="listing-details">
							<div class="listing-flavor">
								<h5><?php echo $flavor;?></h5>
							</div>
							<div class="listing-price">
								<p><b>$<?php echo $price;?></b></p>
							</div>
						</div>
					</div>
				</a>
			</li>





			<?php
			endwhile;
		 	?>

		</ul>

	</div>

	<?php
	include('/php/footer.php');
	?>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="js/app.js" type="text/javascript" charset="utf-8"></script>

</body>
</html>
