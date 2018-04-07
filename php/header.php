<?php
	include('config.php');
?>
<header>
	<input type="checkbox" id="mobile-menu-checkbox">
	<input type="checkbox" id="search-checkbox">
	<div class="nav-wrapper">
		<div class="mobile-nav">
			<div class="left">
				<label for="mobile-menu-checkbox" class="menu" ><img src="img/menu.png"></label>
				<a href="index.php">
					<h1 class="logo">TEA BOX</h1>
					<img src="img/leaf.png">
				</a>
			</div>
			<div class="center">
				<a href="monthly box.php"><h4>Monthly Box</h4></a>
				<a href="tea.php" class="tea-nav"><h4>Tea+</h4></a>
				<a href="teaware.php"class="teaware-nav"><h4>Teaware+</h4></a>
				<a href="about us.php" class="about-nav"><h4>About+</h4></a>
			</div>
			<div class="right">
				<?php if (!isset($_SESSION['user'])) { ?>
				<a href="login.php" class="account-nav"><img src="img/account.png"></a>
				<?php } else if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 2) { ?>
				<a href="account.php" class="account-nav"><img src="img/account.png"></a>
				<?php } else if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 1) { ?>
				<a href="products-menu.php" class="account-nav"><img src="img/account.png"></a>
				<?php } ?>
				<label for="search-checkbox" class="search"><img src="img/search.png"></label>
				<a href="cart.php" class="cart"><img src="img/cart.png"></a>
			</div>
		</div>
	</div>
	<div class="search-div">
		<input type="text" placeholder="search...">
	</div>
	<ul class="mobile-menu">
		<?php if (!isset($_SESSION['user'])) { ?>
		<li><a href="login.php"><h4>Login</h4></a></li>
		<?php } else if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 2) { ?>
		<li><a href="account.php"><h4>My Account</h4></a></li>
		<?php } else if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 1) { ?>
		<li><a href="products-menu.php"><h4>Admin Dashboard</h4></a></li>
		<?php } ?>
		<li><a href="monthly box.php"><h4>Monthly Box</h4></a></li>
		<li><a href="tea.php"><h4>Tea</h4></a></li>
		<li><a href="teaware.php"><h4>Teaware</h4></a></li>
		<li><a href="about us.php"><h4>About Us</h4></a></li>
		<li><a href="faq.php"><h4>FAQ</h4></a></li>
		<li><a href="shipping.php"><h4>Shipping</h4></a></li>
		<li><a href="contact us.php"><h4>Contact Us</h4></a></li>
	</ul>
	<ul class="tea-menu">
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
	<ul class="teaware-menu">
		<li>
			<a href="teaware.php"><h4>View All</h4></a>
			<h4>By Type:</h4>
			<?php
			$postQuery = "SELECT * FROM sub_categories WHERE category_id = '2' ORDER BY sub_category_name ASC";
			$checkResult = mysqli_query($link, $postQuery);
			while ($rows = mysqli_fetch_assoc($checkResult)):
			$id = $rows['sub_category_id'];
			$name = $rows['sub_category_name'];	
			?>
			<a href="teaware.php?id=<?php echo $id;?>"><h4><?php echo $name;?></h4></a>
			<?php
			endwhile;
		 	?>
		</li>
	</ul>
	<ul class="about-menu">
		<li>
			<a href="about us.php"><h4>About Us</h4></a>
			<a href="faq.php"><h4>FAQ</h4></a>
			<a href="shipping.php"><h4>Shipping</h4></a>
			<a href="contact us.php"><h4>Contact Us</h4></a>
		</li>
	</ul>
	<?php
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 2) {	?>
	<ul class="account-menu">
			<li>
				<a href="account.php"><h4>Personal Details</h4></a>
				<a href="previous orders.php"><h4>Previous Orders</h4></a>
				<a href="php/logout.php"><h4>Logout</h4></a>
			</li>
		</ul>
	<?php 
	}
	?>
</header>