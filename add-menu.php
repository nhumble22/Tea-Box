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
	include('/php/add-product.php');
	?>

	<?php 
	if (	(!isset($_SESSION['user']))	||	
		(isset($_SESSION['user']) && 
		$_SESSION['user']['user_type'] == 2)	) { 
		header("Location:index.php");
		exit();
	} else if (isset($_SESSION['user']) && 
	$_SESSION['user']['user_type'] == 1) { ?>
	
	<div class="wrapper search-page">
		<div class="slider">
			<div class="overlay">
				<div class="content">
					<h1>Admin Dashboard</h1>
				</div>
			</div>
		</div>

		<ul class="sub-menu">
			<li>
				<a href="orders-menu.php"><h4>Orders</h4></a>
				<a href="add-menu.php"><h4>Add New</h4></a>
				<a href="products-menu.php"><h4>Products</h4></a>
				<a href="tea-menu.php"><h4>Tea Menu</h4></a>
				<a href="teaware-menu.php"><h4>Teaware Menu</h4></a>
				<a href="php/logout.php"><h4>Logout</h4></a>
			</li>
		</ul>
		<div class="text-box">
			<div class="text-box-inner">
				<div class="title">
					<h3>New Product</h3>
					<hr>
				</div>
				<div class="admin-product-menu-submit">
					<form method="POST" class="newProductForm">
						<ul>
							<li>
								<p><b>Category:</b></p>
								<select id="category" name="category-id">
									<option value="1">Tea</option>
									<option value="2">Teaware</option>
								</select>
							</li>
							<li>
								<p><b>Sub Category:</b></p>
								<select class="input" id="sub-category" name="sub-category-id">
									<option value="" disabled="disabled" selected="selected">Tea</option>
									<?php
									$postQuery = "SELECT * FROM sub_categories WHERE category_id = '1'";
			   						$checkResult = mysqli_query($link, $postQuery);
									while ($rows = mysqli_fetch_assoc($checkResult)):
									$id = $rows['sub_category_id'];
									$subCategoryName = $rows['sub_category_name'];	
									?>
									<option class="<?php echo $id ?>" value="<?php echo $id;?>"><?php echo $subCategoryName; ?></option>
									<?php
									endwhile;
								 	?>	
								 	<option value="" disabled="disabled">Teaware</option>
									<?php
									$postQuery = "SELECT * FROM sub_categories WHERE category_id = '2'";
			   						$checkResult = mysqli_query($link, $postQuery);
									while ($rows = mysqli_fetch_assoc($checkResult)):
									$id = $rows['sub_category_id'];
									$subCategoryName = $rows['sub_category_name'];	
									?>
									<option value="<?php echo $id;?>"><?php echo $subCategoryName; ?></option>
									<?php
									endwhile;
								 	?>	
								</select>
							</li>
							<li>
								<p><b>Flav:</b></p>
								<select class="input" id="flavor" name="flavor">
									<option value="x"></option>
									<option value="Earth">Earth</option>
									<option value="Spice">Spice</option>
									<option value="Sweet">Sweet</option>
									<option value="Fruit">Fruit</option>
									<option value="Nut">Nut</option>
									<option value="Char">Char</option>
								</select>
							</li>
							<li>
								<p><b>Name:</b></p>
								<input class="input" id="name" name="name">
							</li>
							<li>
								<p><b>Quantity:</b></p>
								<input class="input" id="quantity" name="quantity">
							</li>
							<li>
								<p><b>Price in dollars $:</b></p>
								<input class="input" id="price" name="price">
							</li>
							<li>
								<p><b>Description:</b></p>
								<textarea class="input" id="description" name="description"></textarea>
							</li>
							<li>
								<p><b>Sub Description:</b></p>
								<textarea class="input" id="sub-description" name="sub-description"></textarea>
							</li>
							<li>
								<p><b>Image:</b></p>
								<input type="file" name="image">
							</li>
							<li>
								<input type="submit" name="submit" value="Add">
							</li>
						</ul>
					</form>
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