<?php

namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user', 'name_user', "email_user", "password_user", "info_user"];

    public function getUsers()
    {
        return $this->findAll();
    }
	
    public function getData(){
        $builder = $this->db->table('users');
        $data = $builder->get()->getResult();
        return $data;
    }

}