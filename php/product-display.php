<?php
if (isset($_GET["submit"])) {

		$subCategoryId = $_POST['sub-category-id'];
		$postQuery = "SELECT * FROM products WHERE sub-category_id = $subCategoryId";
		$checkResult = mysqli_query($link, $postQuery);
		while ($rows = mysqli_fetch_assoc($checkResult)):
		?>
		<option class="<?php echo $categoryId ?>" value="<?php echo $id;?>"><?php echo $subCategoryName; ?></option>
		<?php
		endwhile;
	 	?>	




}
?>