<?php require_once("includes/header.php" ?>
    <h1>OpenShift File Upload Demonstration</h1><hr>

<?php
// Doesn't do any sort of checking on the file validity just yet.
if (isset($_POST['submit']) {
	$upload_dir = "uploaded/";
	$filename = $upload_dir . basename($_FILES["fto"]["name"]);
	$uploadValid = 1;
	
	if ($_FILES["fto"]["size"] > 204800000) {
		echo "Your file is too large. Please upload a file that is smaller than 20MB.";
		$uploadValid = 0;
	
	}
	
	if ($uploadValid == 0){
		echo "<div class='bg-danger text-white'>";
		echo "Error: Your file cannot be uploaded as-is. Please make sure it's the correct size before attempting again.";
		echo "</div>";
	} else {
		if (move_uploaded_file($_FILES["fto"]["tmp_name"], $filename)) {
			echo "<div class='bg-primary text-white'>The file " . basename( $_FILES["fto"]["name"]) . " has been uploaded.</div>";
			echo '<a href="./listfiles.php">List Uploaded Files</a>';
		} else {
			echo "<div class='bg-danger text-white'>";
			echo "An unknown error has occurred. Please try again.";
			echo "</div>";
		}
	}
}
?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<h2>Select a file to upload:</h2>
		<label for="post_image">Upload Image</label>
		<input type="file" name="fto" id="fto">
	</div>

	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="submit" value="Upload">
	</div>
</form>

<?php require_once("includes/footer.php" ?>
