<?php

namespace App\Controllers;

class Sekilasinfo extends BaseController
{
    public function index()
    {
    	$data['sekilasinfo'] = $this->db->table('sekilasinfo')->orderBy('id_sekilasinfo', 'DESC')->get()->getResult();
        return view('sekilasinfo/index', $data);
    }

    public function add() {
        return view('sekilasinfo/add');
    }

    public function save() {
    	$file = $this->request->getFile('gambar');

    	if ($file->isValid() && !$file->hasMoved()) {
	    	$imageName = $file->getRandomName();
	        $file->move("public/template/assets/img/sekilasinfo/", $imageName);
		}else{
			$imageName = "No-image.jpg";
		}

    	$data = [
            'info' => $this->request->getVar('info'),
            'tgl_posting' => date('Y-m-d'),
            'gambar' => $imageName,
            'aktif' => 'Y',
        ];

        $this->db->table('sekilasinfo')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('sekilasinfo'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
    	if ($id != null) {
            $query = $this->db->table('sekilasinfo')->getWhere(['id_sekilasinfo' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['sekilasinfo'] = $query->getRow();
		    	return view('sekilasinfo/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $file = $this->request->getFile('gambar');
        $sekilasinfo = $this->db->table('sekilasinfo')->getWhere(['id_sekilasinfo' => $id])->getRow();
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $sekilasinfo->gambar;
            if (file_exists("public/template/assets/img/sekilasinfo/".$old_img_name)) {
            	if ($sekilasinfo->gambar != "No-image.jpg") {
	                unlink("public/template/assets/img/sekilasinfo/".$old_img_name);
            	}
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/sekilasinfo/", $imageName);
        }else {
            $imageName = $sekilasinfo->gambar;
        }

        $data = [
            'info' => $this->request->getVar('info'),
            'tgl_posting' => date('Y-m-d'),
            'gambar' => $imageName,
            'aktif' => $this->request->getVar('aktif'),
        ];
        $this->db->table('sekilasinfo')->where(['id_sekilasinfo' => $id])->update($data);
        return redirect()->to(site_url('sekilasinfo'))->with('success', 'Sekilas Info Berhasil Diubah');
    }

    public function delete($id) {
    	$sekilasinfo = $this->db->table('sekilasinfo')->getWhere(['id_sekilasinfo' => $id])->getRow();
    	$old_img_name = $sekilasinfo->gambar;
        if (file_exists("public/template/assets/img/sekilasinfo/".$old_img_name)) {
            if ($sekilasinfo->gambar != "No-image.jpg") {
                unlink("public/template/assets/img/sekilasinfo/".$old_img_name);
            }
        }
        $this->db->table('sekilasinfo')->where(['id_sekilasinfo' => $id])->delete();
        return redirect()->to(site_url('sekilasinfo'));
    }
}