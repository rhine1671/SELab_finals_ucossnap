<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<?php  
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles/styles.css">
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
	<?php include 'navbar.php'; ?>

    <?php $getAlbumByID = getAlbumByID($pdo, $_GET['album_id']);?>

	<div class="insertPhotoForm" style="display: flex; justify-content: center;">
		<form action="core/handleForms.php?album_id=<?php echo $_GET['album_id'];?>" method="POST" enctype="multipart/form-data">
			<p>
				<label for="#">Album Name</label>
				<input type="text" name="album_name" value="<?php echo $getAlbumByID['album_name']; ?>">
			</p>
			<p>
				<input type="submit" name="editAlbumBtn" style="margin-top: 10px;">
			</p>
	
		</form>
	</div>
</body>
</html>