<?php
if (isset($_POST["submit"])) {
	if ($_POST['submit'] == 'Update') {
		$id = $_POST['category-id'];
		$name = $_POST['category-name'];
		//update
		$postQuery = "UPDATE sub_categories SET sub_category_name = '".mysqli_real_escape_string($link,$name)."' WHERE sub_category_id='".
		mysqli_real_escape_string($link,$id)."'";
		mysqli_query($link, $postQuery);
	} else if ($_POST['submit'] == 'Delete') {
		$id = $_POST['category-id'];
		//delete
		$postQuery = "DELETE FROM sub_categories WHERE sub_category_id='".mysqli_real_escape_string($link,$id)."'";
		mysqli_real_escape_string($link,$id)."'";
		mysqli_query($link, $postQuery);
	} else if ($_POST['submit'] == 'Add') {
		$categoryNameId = $_POST['categoryNameId'];
		$newCategory = $_POST['new-category'];

		$postQuery = "INSERT INTO sub_categories (sub_category_name, category_id) VALUES 
								('".mysqli_real_escape_string($link,$newCategory)."', 
		 						'".mysqli_real_escape_string($link,$categoryNameId)."')";
		mysqli_query($link, $postQuery);
	}
}
?>