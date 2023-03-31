<!DOCTYPE html>
<html>
<head>
	<title><?php echo $datanya['title']; ?></title>
</head>
<body>
	<h1><?php echo $datanya['title']; ?></h1>
	<img src="<?php echo $datanya['cover']; ?>" alt="<?php echo $datanya['titleAlt']; ?>">
	<p><strong>Synopsis:</strong> <?php echo $datanya['synopsis']; ?></p>
	<p><strong>Total Episode:</strong> <?php echo $datanya['episodeTotal']; ?></p>
	<p><strong>Episode:</strong> <?php echo $datanya['episode']; ?></p>
	<p><strong>Season:</strong> <?php echo $datanya['season']; ?></p>
	<p><strong>Genre:</strong><?php echo implode(', ', $datanya['genre']); ?></p>
	<p><strong>Alternate Title:</strong> <?php echo $datanya['titleAlt']; ?></p>
	<a href="<?php echo $datanya['url']; ?>">More Information</a>
</body>
</html>
