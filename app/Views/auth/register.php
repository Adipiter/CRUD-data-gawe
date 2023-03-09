<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="<?php echo base_url('/register'); ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>password confirm</label>
                <input type="password" name="confirm_password" class="form-control">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>