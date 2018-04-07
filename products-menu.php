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
					<h3>Products</h3>
					<hr>
				</div>
				<div class="admin-product-menu">
					<div>
						<form method="GET">
							<select name="sub-category-id">
								<option></option>
								<option value="" disabled="disabled">Tea</option>
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
							<input type="submit" name="submit" value="View">
						</form>
					</div>
				</div>







		<?php
		if(isset($_GET['sub-category-id'])) {
			$subCategoryId = $_GET['sub-category-id'];
			$postQuery = "SELECT * FROM products WHERE sub_category_id = $subCategoryId";
			$checkResult = mysqli_query($link, $postQuery);
			//$rows = mysqli_fetch_assoc($checkResult);
		  
			while ($rows = mysqli_fetch_assoc($checkResult)):
				$id = $rows['product_id'];
			$name = $rows['product_name'];	
			$img = $rows['product_image'];
			$stock = $rows['product_stock'];	
			$price = $rows['product_price'];
			?>
			<div class="product-view">
				<p><b><?php echo $name; ?></b></p>
				<p>Quantity: <?php echo $stock; ?>, Price: <?php echo $price; ?></p>
				<p>
					<a href="php/delete-product.php?id=<?php echo $id; ?>">Delete</a>
					<a href="edit-product-menu.php?id=<?php echo $id; ?>">Edit</a>	
				</p>
			</div>
			<?php
			endwhile;
			}
		 	?>
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