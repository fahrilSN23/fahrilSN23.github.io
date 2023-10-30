<?php

namespace App\Controllers;
use App\Libraries\Mylibrary;

class Tag_artikel extends BaseController
{
    public function index()
    {
    	$data['tag_artikel'] = $this->db->table('tag_artikel')->orderBy('nama_tag', 'ASC')->get()->getResult();
        return view('tag_artikel/index', $data);
    }

    public function add() {
        return view('tag_artikel/add');
    }

    public function save() {
        $data = [
            'nama_tag' => $this->request->getVar('nama_tag'),
            'tag_seo' => Mylibrary::seo_title($this->request->getVar('nama_tag')),
            'count' => 0
        ];

        $this->db->table('tag_artikel')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('tag_artikel'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
        if ($id != null) {
            $query = $this->db->table('tag_artikel')->getWhere(['id_tag_artikel' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['tag_artikel'] = $query->getRow();
                return view('tag_artikel/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $data = [
            'nama_tag' => $this->request->getVar('nama_tag'),
            'tag_seo' => Mylibrary::seo_title($this->request->getVar('nama_tag')),
        ];

        $this->db->table('tag_artikel')->where(['id_tag_artikel' => $id])->update($data);
        return redirect()->to(site_url('tag_artikel'))->with('success', 'Data Berhasil Diubah');
    }

    public function hapus($id) {
        $this->db->table('tag_artikel')->where(['id_tag_artikel' => $id])->delete();
        return redirect()->to(site_url('tag_artikel'));
    }
}