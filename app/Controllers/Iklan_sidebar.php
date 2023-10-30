<?php

namespace App\Controllers;

class Iklan_sidebar extends BaseController
{
    public function index()
    {
    	$data['iklan_sidebar'] = $this->db->table('iklan_sidebar')->orderBy('id_iklan', 'DESC')->get()->getResult();
        return view('iklan_sidebar/index', $data);
    }

    public function add() {
        return view('iklan_sidebar/add');
    }

    public function save() {
    	$file = $this->request->getFile('gambar');

    	if ($file->isValid() && !$file->hasMoved()) {
	    	$imageName = $file->getRandomName();
	        $file->move("public/template/assets/img/iklan_sidebar/", $imageName);
		}else{
			$imageName = "No-image.jpg";
		}

    	$data = [
            'judul' => $this->request->getVar('judul'),
            'url' => $this->request->getVar('url'),
            'gambar' => $imageName,
            'tgl_posting' => date('Y-m-d'),
        ];

        $this->db->table('iklan_sidebar')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('iklan_sidebar'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
    	if ($id != null) {
            $query = $this->db->table('iklan_sidebar')->getWhere(['id_iklan' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['iklan_sidebar'] = $query->getRow();
		    	return view('iklan_sidebar/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $file = $this->request->getFile('gambar');
        $iklan_sidebar = $this->db->table('iklan_sidebar')->getWhere(['id_iklan' => $id])->getRow();
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $iklan_sidebar->gambar;
            if (file_exists("public/template/assets/img/iklan_sidebar/".$old_img_name)) {
            	if ($iklan_sidebar->gambar != "No-image.jpg") {
	                unlink("public/template/assets/img/iklan_sidebar/".$old_img_name);
            	}
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/iklan_sidebar/", $imageName);
        }else {
            $imageName = $iklan_sidebar->gambar;
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'url' => $this->request->getVar('url'),
            'gambar' => $imageName,
        ];
        $this->db->table('iklan_sidebar')->where(['id_iklan' => $id])->update($data);
        return redirect()->to(site_url('iklan_sidebar'))->with('success', 'Iklan Slide Berhasil Diubah');
    }

    public function delete($id) {
    	$iklan_sidebar = $this->db->table('iklan_sidebar')->getWhere(['id_iklan' => $id])->getRow();
    	$old_img_name = $iklan_sidebar->gambar;
        if (file_exists("public/template/assets/img/iklan_sidebar/".$old_img_name)) {
            if ($iklan_sidebar->gambar != "No-image.jpg") {
                unlink("public/template/assets/img/iklan_sidebar/".$old_img_name);
            }
        }
        $this->db->table('iklan_sidebar')->where(['id_iklan' => $id])->delete();
        return redirect()->to(site_url('iklan_sidebar'));
    }
}