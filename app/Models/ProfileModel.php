<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile'; // Gantilah 'logo' dengan nama tabel sesuai kebutuhan Anda.
    protected $primaryKey = 'id'; // Gantilah 'id' dengan nama kolom yang menjadi primary key di tabel.

    protected $allowedFields = ['filename']; // Gantilah 'filename' sesuai dengan kolom yang akan diisi dengan nama file logo.

    // Jika Anda ingin menggunakan timestamps (created_at dan updated_at), Anda bisa mengaktifkannya dengan kode berikut:
    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
}