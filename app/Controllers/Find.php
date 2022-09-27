<?php
namespace App\Controllers;

use App\Models\UserModel;

class Find extends BaseController
{
    /* Cara 1 dengan inisialisasi class Model */
    public function index()
    {
       $member= new UserModel; //inisial class
       $data = $member->getUsers(); // ambil semua data di dalam model

       return view('find', compact('data')); // lempar data ke view
    }
	
    /*
    Cara 2 dengan query builder
    public function index()
    {
        $builder = $this->db->table('users');   // abstraksi table yang dipilih
        $query = $builder->get()->getResult();  // dapatkan semua data yang ada
        $data['users'] = $query;    // Jadikan object

        return view('find', $data); // Lempar data ke view
    }
    */
}
