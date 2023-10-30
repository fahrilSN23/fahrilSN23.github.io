<?php

namespace App\Controllers;
use App\Libraries\Mylibrary;

class Halaman extends BaseController
{
    public function index()
    {
    	$data['halaman'] = $this->db->table('halaman')->orderBy('id_halaman', 'DESC')->get()->getResult();
        return view('halaman/index', $data);
    }

    public function create() {
        return view('halaman/add');
    }

    public function save() {
    	$file = $this->request->getFile('gambar');

    	if ($file->isValid() && !$file->hasMoved()) {
	    	$imageName = $file->getRandomName();
	        $file->move("public/template/assets/img/halaman/", $imageName);
		}else{
			$imageName = "No-image.jpg";
		}

    	$data = [
            'judul' => $this->request->getVar('judul'),
            'judul_seo' => Mylibrary::seo_title($this->request->getVar('judul')),
            'isi_halaman' => $this->request->getVar('isi_halaman'),
            'tgl_posting' => date('Y-m-d'),
            'gambar' => $imageName,
            'username' => userLogin()->email_user,
            'dibaca'=>'0',
            'jam'=>date('H:i:s'),
            'hari'=>hari_ini(date('w'))
        ];

        $this->db->table('halaman')->insert($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->to(site_url('halaman'))->with('success', 'Data Berhasil Disimpan');
        }
    }

    public function edit($id = null) {
    	if ($id != null) {
            $query = $this->db->table('halaman')->getWhere(['id_halaman' => $id]);
            if ($query->resultID->num_rows > 0) {
                $data['halaman'] = $query->getRow();
		    	return view('halaman/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id) {
        $file = $this->request->getFile('gambar');
        $halaman = $this->db->table('halaman')->getWhere(['id_halaman' => $id])->getRow();
        if ($file->isValid() && !$file->hasMoved()) {
            $old_img_name = $halaman->gambar;
            if (file_exists("public/template/assets/img/halaman/".$old_img_name)) {
            	if ($halaman->gambar != "No-image.jpg") {
	                unlink("public/template/assets/img/halaman/".$old_img_name);
            	}
            }
            $imageName = $file->getRandomName();
            $file->move("public/template/assets/img/halaman/", $imageName);
        }else {
            $imageName = $halaman->gambar;
        }

        $data = [
            'judul' => $this->request->getVar('judul'),
            'judul_seo' => Mylibrary::seo_title($this->request->getVar('judul')),
            'isi_halaman' => $this->request->getVar('isi_halaman'),
            'gambar' => $imageName,
            'username' => userLogin()->email_user,
        ];
        $this->db->table('halaman')->where(['id_halaman' => $id])->update($data);
        return redirect()->to(site_url('halaman_baru'))->with('success', 'halaman Berhasil Diubah');
    }

    public function delete($id) {
    	$halaman = $this->db->table('halaman')->getWhere(['id_halaman' => $id])->getRow();
    	$old_img_name = $halaman->gambar;
        if (file_exists("public/template/assets/img/halaman/".$old_img_name)) {
            unlink("public/template/assets/img/halaman/".$old_img_name);
        }
        $this->db->table('halaman')->where(['id_halaman' => $id])->delete();
        return redirect()->to(site_url('halaman'));
    }
}