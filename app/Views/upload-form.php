<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload file</title>
</head>
<body>
    <p>
        <?php foreach ($errors as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach ?>
    </p>

    File di perlukan:
    <?php if(session()->has('success_message')): ?>
        <div class="alert alert-success">
            <?= session('success_message') ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo base_url('upload'); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
        <input type="file" name="userfile" size="20">
        <br><br>
        <input type="submit" value="upload">
    </form>
</body>
</html>