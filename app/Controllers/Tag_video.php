<?php

namespace App\Controllers;
use App\Libraries\Mylibrary;

class Tag_video extends BaseController
{
    public function index()
    {
    	$data['tag_video'] = $this->db->table('tag_video')->orderBy('nama_tag', 'ASC')->get()->getResult();
        return view('tag_video/index', $data);
    }

    public function add() {
        return view('tag_video/add');
    }

    public function save() {
        $data = [
            'nama_tag' => $this->request->getVar('nama_tag'),
            'tag_seo' => Mylibrary::seo_title($this->request->getVar('nama_tag')),
            'count' => 0
        ];

        $this->db->table('tag_video')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('tag_video'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
        if ($id != null) {
            $query = $this->db->table('tag_video')->getWhere(['id_tag_video' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['tag_video'] = $query->getRow();
                return view('tag_video/edit', $data);
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

        $this->db->table('tag_video')->where(['id_tag_video' => $id])->update($data);
        return redirect()->to(site_url('tag_video'))->with('success', 'Data Berhasil Diubah');
    }

    public function hapus($id) {
        $this->db->table('tag_video')->where(['id_tag_video' => $id])->delete();
        return redirect()->to(site_url('tag_video'));
    }
}