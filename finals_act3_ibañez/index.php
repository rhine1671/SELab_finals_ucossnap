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

	<div class="insertPhotoForm" style="display: flex; justify-content: center;">
		<form action="core/handleForms.php" method="POST" enctype="multipart/form-data">
			<p>
				<label for="#">Album Name</label>
				<input type="text" name="album_name" placeholder="Enter album name" required>
			<p>

			<p>
				<input type="submit" name="createAlbumBtn" value="Create Album">
			</p>
		</form>
	</div>

	<?php $userAlbums = getUserAlbums($pdo, $_SESSION['username']); ?>
	<?php foreach ($userAlbums as $album) { ?>
		<div>
			<h3><?php echo $album['album_name']; ?></h3>
			<a href="viewAlbum.php?album_id=<?php echo $album['album_id']; ?>">View</a>
			<a href="editalbum.php?album_id=<?php echo $album['album_id']; ?>">Edit</a>
			<a href="deletealbum.php?album_id=<?php echo $album['album_id']; ?>">Delete</a>
		</div>
	<?php } ?> 
</body>
</html>