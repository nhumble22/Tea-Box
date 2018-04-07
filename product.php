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
	if(isset($_GET['id'])) {
	    $productId = $_GET['id'];
	    $postQuery = "SELECT * FROM products WHERE product_id = $productId";
	    $checkResult = mysqli_query($link, $postQuery);
		$rows = mysqli_fetch_assoc($checkResult);
	    $categoryId = $rows['category_id'];
	    $subCategoryId = $rows['sub_category_id'];
		$name = $rows['product_name'];	
		$img = $rows['product_image'];
		$flavor = $rows['product_flavor'];	
		$price = $rows['product_price'];
		$stock = $rows['product_stock'];
		$description = $rows['product_description'];	
		$subDescription = $rows['product_sub_description'];

	    $postQuery = "SELECT category_name FROM categories WHERE category_id = $categoryId";
	    $checkResult = mysqli_query($link, $postQuery);
		$rows = mysqli_fetch_assoc($checkResult);
	    $typeName = $rows['category_name'];

	    $postQuery = "SELECT sub_category_name FROM sub_categories WHERE sub_category_id = $subCategoryId";
	    $checkResult = mysqli_query($link, $postQuery);
		$rows = mysqli_fetch_assoc($checkResult);
	    $subCategoryName = $rows['sub_category_name'];
	} else {
		header("Location:index.php");
		exit();
	}
	?>
	<div class="wrapper listing-page">
		<div class="slider tea-slider">
			<div class="overlay">
				<div class="content">
					<h1><?php echo $typeName;?></h1>
				</div>
			</div>
		</div>
		<div class="text-box">
				<ul class="product-wrapper">








					<li style="background-image: url(img/products/<?php echo $img;?>);">
						<!-- image here -->
					</li>
					<li>
						<h2><?php echo $name;?></h2>
						<?php if ($categoryId == 1) {
							?>
						<p><b><?php echo $flavor;?> Flavoured <?php echo $subCategoryName;?> Tea</b></p>
						<?php }?>
						<hr>
						<p><?php echo $description;?></p>
						<br>
						<p><?php if ($categoryId == 1) {?>Sold as <?php }?><?php echo $subDescription;?></p>
						<br>
						<div>
							<p><b>Quantity:</b></p>
							<select>
								<option selected>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
							<p><b> at <?php echo $price;?> each</b></p>
							<input type="submit" value="Add to Cart">
						</div>
					</li>
				</ul>
			</div>
		</div>
		<div class="title">
			<h3>Similar to <?php echo $name;?></h3>
			<hr>
		</div>
		<ul class="listings">

			<?php

			if ($categoryId == 1) {

				$postQuery = "SELECT * FROM products WHERE sub_category_id = $subCategoryId AND product_id != $productId";
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

		 	<?php

			} else if ($categoryId == 2) {
				$postQuery = "SELECT * FROM products WHERE category_id = '2' AND product_id != $productId";
				$checkResult = mysqli_query($link, $postQuery);
			while ($rows = mysqli_fetch_assoc($checkResult)):
			$id = $rows['product_id'];
			$name = $rows['product_name'];	
			$img = $rows['product_image'];
			$price = $rows['product_price'];
			$typeId = $rows['sub_category_id'];

			?>
			<?php
			$listQuery = "SELECT sub_category_name FROM sub_categories WHERE sub_category_id = $typeId";
		    $listCheckResult = mysqli_query($link, $listQuery);
			$list = mysqli_fetch_assoc($listCheckResult);
		    $typeName = $list['sub_category_name'];
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
								<h5><?php echo $typeName;?></h5>
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
		 	<?php

			}

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
