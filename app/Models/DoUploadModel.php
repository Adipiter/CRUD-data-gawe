<?php

namespace App\Models;

use CodeIgniter\Model;

class DoUploadModel extends Model
{
    protected $table = 'uploaded_files';
    protected $primaryKey = 'id';
    protected $allowedFields = ['file_name', 'file_path', 'file_type', 'file_size', 'created_at'];
}
