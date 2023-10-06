<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Uploaded Images</title>
</head>
<body>
    <h1>List of Uploaded Images</h1>
    <ul>
        <?php foreach ($imageFiles as $imageFile): ?>
            <li>
                <a href="<?php echo base_url('uploads/' . $imageFile); ?>" target="_blank">
                    <img src="<?php echo base_url('uploads/' . $imageFile); ?>" alt="Uploaded Image">
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
