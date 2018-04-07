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
	include('php/category-form.php');
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
					<h3>Teaware Categories</h3>
					<hr>
				</div>
				<?php
				$postQuery = "SELECT * FROM sub_categories WHERE category_id = '2' ORDER BY sub_category_name ASC";
				$checkResult = mysqli_query($link, $postQuery);
				while ($rows = mysqli_fetch_assoc($checkResult)):
				$id = $rows['sub_category_id'];
				$name = $rows['sub_category_name'];	
				?>
				
				<div class="admin-menu">
					<form method="POST">
						<div>

							<input type="hidden" name="category-id" value="<?php echo $id; ?>">
							<input type="text" name="category-name" value="<?php echo $name;?>">
						</div>
						<div>
							<input type="submit" name="submit" value="Delete">
							<input type="submit" name="submit" value="Update">
						</div>
					</form>
				</div>

				<?php
				endwhile;
			 	?>

				<div class="admin-menu">
					<form method="post">
						<div>
							<input type="hidden" name="categoryNameId" value="2">
							<input type="text" name="new-category">
						</div>
						<div>
							<input type="submit" name="submit" value="Add">
						</div>
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