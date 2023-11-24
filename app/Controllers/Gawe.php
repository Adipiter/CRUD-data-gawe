<?php

namespace App\Controllers;
use App\Models\OpsiModel;

class Gawe extends BaseController
{
    public function index()
    {
        // cara 1 query builder
        $builder = $this->db->table('gawe');
        $query = $builder->get()->getResult();
        $data['gawe'] = $query;
        
        // cara 2 query manual
        // $query = $this->db->query("SELECT * FROM gawe");
        // $data['gawe'] = $query->getResult();

        return view('gawe/index', $data);
    }

    public function create(){
        $opsimodel = new OpsiModel();
        $data['buah'] = $opsimodel->findAll();

        return view('gawe/add', $data);
    }

    public function store(){
        //cara 1 name sama
        // $data = $this->request->getPost();

        //cara 2 name spesific
        $data = [
            'name_gawe' => $this->request->getVar('name_gawe'),
            'date_gawe' => $this->request->getVar('date_gawe'),
            'info_gawe' => $this->request->getVar('info_gawe'),
            'buah' => $this->request->getVar('buah'),
        ];

        $this->db->table('gawe')->insert($data);

        if($this->db->affectedRows() > 0) {
            return redirect()->to(base_url('gawe'))->with('success', 'Data disimpan cuy!!...');
        }
    }

    public function edit($id = null){
        if($id != null){
            $query = $this->db->table('gawe')->getWhere(['id_gawe' => $id]);
            if($query->resultID->num_rows > 0){
                $data ['gawe'] = $query->getRow();
                return view('gawe/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundExceptions::ForPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundExceptions::ForPageNotFound();
        }
    }

    public function update($id){
        
        // Cara 1 : name sama
        // $data = $this->request->getPost();
        // unset($data['_method']);

        //cara 2 name spesific
        $data = [
            'name_gawe' => $this->request->getVar('name_gawe'),
            'date_gawe' => $this->request->getVar('date_gawe'),
            'info_gawe' => $this->request->getVar('info_gawe'),
            'buah' => $this->request->getVar('buah'),
        ];

        $this->db->table('gawe')->where(['id_gawe' => $id])->update($data);
        return redirect()->to(base_url('gawe'))->with('success', 'Data berhasil di update cuy!!...');
    }

    public function destroy($id){
        $this->db->table('gawe')->where(['id_gawe' => $id])->delete();
        return redirect()->to(base_url('gawe'))->with('success', 'Data berhasil di hapus!!...');
    }
}
