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
	<div class="wrapper tea-page">
		<div class="slider tea-slider">
			<div class="overlay">
				<div class="content">
					<h1>Tea</h1>
				</div>
			</div>
		</div>

		<ul class="sub-menu">
			<li>
				<a href="tea.php"><h4>View All</h4></a>
				<h4>By Type:</h4>
				<?php
				$postQuery = "SELECT * FROM sub_categories WHERE category_id = '1' ORDER BY sub_category_name ASC";
				$checkResult = mysqli_query($link, $postQuery);
				while ($rows = mysqli_fetch_assoc($checkResult)):
				$id = $rows['sub_category_id'];
				$name = $rows['sub_category_name'];
				?>
				<a href="tea.php?id=<?php echo $id;?>"><h4><?php echo $name;?></h4></a>
				<?php
				endwhile;
			 	?>
			</li>
			<li>
				<h4>By Flavor:</h4>
				<a href="tea.php?flavor=earth"><h4>Earth</h4></a>
				<a href="tea.php?flavor=spice"><h4>Spice</h4></a>
				<a href="tea.php?flavor=sweet"><h4>Sweet</h4></a>
				<a href="tea.php?flavor=fruit"><h4>Fruit</h4></a>
				<a href="tea.php?flavor=nut"><h4>Nut</h4></a>
				<a href="tea.php?flavor=char"><h4>Char</h4></a>
			</li>
		</ul>

		<?php
		if(isset($_GET['id'])) {
		    $typeId = $_GET['id'];
		    $postQuery = "SELECT sub_category_name FROM sub_categories WHERE sub_category_id = '".mysqli_real_escape_string($link,$typeId)."'";
		    $checkResult = mysqli_query($link, $postQuery);
			$rows = mysqli_fetch_assoc($checkResult);
		    $typeName = $rows['sub_category_name'];
		    $postQuery = "SELECT * FROM products WHERE sub_category_id = $typeId";
		} else if (isset($_GET['flavor'])) {
			$flavor = $_GET['flavor'];
		    $typeName = $flavor;
		    $typeName.=" flavored";
		    $postQuery = "SELECT * FROM products WHERE product_flavor = '".mysqli_real_escape_string($link,$flavor)."'";
		} else {
			$typeName = "All";
			$postQuery = "SELECT * FROM products WHERE category_id = '1'";
		}
		?>

		<div class="title">
			<h3><?php echo $typeName;?> Tea</h3>
			<hr>
		</div>
		<ul class="listings">

			<?php
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
