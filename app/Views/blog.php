<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog Sederhana</title>
</head>
<body>
    <h1>Daftar Posting Blog</h1>
    <ul>
        <?php foreach ($blogs as $blog) : ?>
            <li>
                <h2><?= $blog['judul']; ?></h2>
                <a href="<?= site_url('blog/' . url_title($blog['judul'], '-', true)); ?>"><?= $blog['judul']; ?></a>
                <p><?= $blog['konten']; ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
