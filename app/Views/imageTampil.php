<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar gambar</title>
</head>
<body>
    <h1>Ini daftar gambar yang telah di unggah</h1>
    <ul>
        <?php foreach ($imageFiles as $imageFile): ?>
            <li>
                <img src="<?php echo base_url('public/' . $imageFile); ?>" alt="gambar">
            </li>
        </br>
        <?php endforeach; ?>
    </ul>
    <a href="upload">Kembali</a>
</body>
</html>
