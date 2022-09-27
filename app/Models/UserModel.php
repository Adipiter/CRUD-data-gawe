<?php

namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model
{
    protected $table = 'users';
 
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