<form action="<?php echo base_url('profile-upload'); ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
    <input type="file" name="foto">
    <button type="submit">Upload</button>
</form>
</br>
<h1>Profile Form</h1>
</br></br>
<img src="<?= base_url('public/logo/'.$filename['filename']) ?>" alt="gambar" height="80" width="auto">
