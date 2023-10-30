<?php

namespace App\Controllers;
use App\Libraries\Mylibrary;

class Kategori extends BaseController
{
    public function index()
    {
        if (userLogin()->level_user == 'Administrator') {
            $builder = $this->db->table('kategori');
            $query   = $builder->get();
            
            $data['kategori'] = $query->getResult();
        }else{
            $data['kategori'] = $this->db->table('kategori')->getWhere(['email' => userLogin()->email_user])->getResult();
        }
        return view('kategori/get', $data);
    }

    public function create() {
        return view('kategori/add');
    }

    public function save() {
        $data = [
            'name_kategori' => $this->request->getVar('name_kategori'),
            'slug_kategori' => Mylibrary::seo_title($this->request->getVar('name_kategori')),
            'email' => userLogin()->email_user,
            'aktif' => $this->request->getVar('aktif'),
        ];

        $this->db->table('kategori')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('kategori'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
        if ($id != null) {
            $query = $this->db->table('kategori')->getWhere(['id_kategori' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['kategori'] = $query->getRow();
                return view('kategori/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
    }

    public function update($id) {
        $data = [
            'name_kategori' => $this->request->getVar('name_kategori'),
            'slug_kategori' => Mylibrary::seo_title($this->request->getVar('name_kategori')),
            'email' => userLogin()->email_user,
            'aktif' => $this->request->getVar('aktif'),
        ];

        $this->db->table('kategori')->where(['id_kategori' => $id])->update($data);
        return redirect()->to(site_url('kategori'))->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($id) {
        $this->db->table('kategori')->where(['id_kategori' => $id])->delete();
        return redirect()->to(site_url('kategori'))->with('success', 'Data Berhasil Dihapus');
    }
}
