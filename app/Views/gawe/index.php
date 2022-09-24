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
    <div class="section-header-button">
        <a href="<?= base_url('gawe/add'); ?>">Tambah</a>
    </div>

    <?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('success');?>
    </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger" role="alert">
        Error!
    </div>
    <?php endif; ?>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama gawe</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Info</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($gawe as $key => $value) : ?>
            <tr>
                <th><?= $key= +1; ?></th>
                <td><?= $value->name_gawe; ?></td>
                <td><?= date('d/m/Y', strtotime($value->date_gawe)); ?></td>
                <td><?= $value->info_gawe; ?></td>

                <td>
                    <div class="d-grid gap-2 d-md-block text-center">
                        <a href="<?= base_url('gawe/edit/'.$value->id_gawe); ?>" class="btn btn-primary btn-sm">Edit</a>

                        <form action="<?= site_url('gawe/delete'.$value->id_gawe); ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </div>
                </td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>