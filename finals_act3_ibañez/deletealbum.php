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
</head>
<body>
	<?php include 'navbar.php'; ?>
	<?php $getAlbumByID = getAlbumByID($pdo, $_GET['album_id']); ?>
	<div class="deletePhotoForm" style="display: flex; justify-content: center;">
		<div class="deleteForm" style="border-style: solid; border-color: red; background-color: #ffcbd1; padding: 10px; width: 50%;">
			<form action="core/handleForms.php" method="POST">
				<p>
					<label for=""><h2>Are you sure you want to delete this album?</h2></label>
					<input type="text" name="album_name" value="<?php echo $getAlbumByID['album_name']; ?>">
					<input type="hidden" name="album_id" value="<?php echo $_GET['album_id']; ?>">
					<input type="submit" name="deleteAlbumBtn" style="margin-top: 10px;" value="Delete">
				</p>
			</form>
		</div>
	</div>
</body>
</html>