<?php
namespace App\Controllers;

use App\Models\UserModel;

class Find extends BaseController
{
    /*
        Cara 1 dengan inisialisasi class Model.

        Method ini akan menjadikan data jadi array, jadi memanggil datanya juga harus pemanggilan array.
        Di cara nomor 2, data di ubah ke object.
    */
    public function index()
    {
       $member= new UserModel; //inisial class
       $data = $member->getUsers(); // ambil semua data di dalam model

       return view('find', compact('data')); // lempar data ke view
    }
	
    /*
        Cara 2 dengan query builder

        Jika menggunakan query bilder, memanggil data nya di view menggunakan gaya object. Itu menggunakan arrow function.

    public function index()
    {
        $builder = $this->db->table('users');   // abstraksi table yang dipilih
        $query = $builder->get()->getResult();  // dapatkan semua data yang ada
        $data['users'] = $query;    // Jadikan object

        return view('find', $data); // Lempar data ke view
    }
    */

    public function paging()
    {
        $member = new UserModel();
    
        // Konfigurasi paginasi
        $pager = \Config\Services::pager(); // Mendapatkan instance Pager
        $perPage = 10; // Jumlah item per halaman
    
        // Mendapatkan data dengan menggunakan paginasi
        $data = [
            'members' => $member->paginate($perPage),
            'pager' => $member->pager,
        ];

        // Menampilkan data ke view
        return view('paginate', $data);
    }
    
}
